<?php
/**
 * @file
 * Bluez theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print
 *   them all, or print a subset such as
 *   render($content['field_example']).
 *   Use hide($content['field_example']) to temporarily suppress the
 *   printing of a given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat
 *   it by calling format_date() with the desired parameters on the
 *   $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $terms: the themed list of taxonomy term links output from
 *   theme_links().
 * - $display_submitted: whether submission information should be
 *   displayed.
 * - $classes: String of classes that can be used to style contextually
 *   through CSS.
 *   It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *    "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to
 *     administrators.
 * - $title_prefix (array): An array containing additional output
 *   populated by modules, intended to be displayed in front of the main
 *   title tag that appears in the template.
 * - $title_suffix (array): An array containing additional output
 *   populated by modules, intended to be displayed after the main title
 *   tag that appears in the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is
 *   flattened into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping
 *   in teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state
 *   (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot
 *   hold the main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a
 * corresponding variable is defined, e.g. $node->body becomes $body.
 * When needing to access a field's raw values, developers/themers are
 * strongly encouraged to use these variables. Otherwise they will have
 * to explicitly specify the desired field language,
 * e.g. $node->body['en'], thus overriding any language negotiation
 * rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 */
?>
<section class='block-books container-fluid'>
    <article class="container">
        <h2 class="line center"><?= $node->field_title_cik['und'][0]['value'] ?></h2>
        <p><?= $node->field_intro_description_cik['und'][0]['value']; ?></p>
        <section class="crowns">
            <?php foreach ($node->field_images_for_rewards_cik['und'] AS $key => $imgRewards): ?>
                <img src="<?= file_create_url($imgRewards['uri']) ?>" alt="<?= $imgRewards['alt'] ?>" title="<?= $imgRewards['title'] ?>" />
            <?php endforeach; ?>
            <span class="note"><?= $node->field_note_cik['und'][0]['value']; ?></span>
        </section>
    </article>
</section>
<?php if (isset($node->field_info_title_cik['und'][0]['value']) && $node->field_info_title_cik['und'][0]['value'] !== ''): ?>
<section class='block-gray block-alls container-fluid'>
    <article class="container">
        <h2><?= $node->field_info_title_cik['und'][0]['value']; ?></h2>
        <p><?= $node->field_info_description_cik['und'][0]['value']; ?></p>
    </article>
</section>
<?php endif; ?>
<?php if (isset($node->field_title_section_cik['und'][0]['value']) && $node->field_title_section_cik['und'][0]['value'] !== ''): ?>
<section class='block-content3 container-fluid'>
    <article class="container">
        <section class="col-md-6 col-sm-6">
            <?php
            $img = $node->field_image_section_cik['und'][0];
            if (cdi_custom_is_mobile())
            {
                $img = $node->field_image_section_mobile_cik['und'][0];
            }
            ?>
            <img src="<?= file_create_url($img['uri']); ?>" alt="<?= $img['uri']['alt'] ?>" title="<?= $img['title'] ?>" class="img-responsive">
        </section>
        <section class="col-md-6 col-sm-6">
            <article class="content">
                <h2 class="line"><?= $node->field_title_section_cik['und'][0]['value']; ?><br><?= $node->field_subtitle_section_cik['und'][0]['value']; ?></h2>
                <?= $node->field_description_section_cik['und'][0]['value']; ?>
            </article>
        </section>
    </article>
</section>
<?php endif; ?>
<section class='block-background-paid container-fluid'>
    <?php
    $imgBackground = $node->field_background_cik['und'][0];
    if (cdi_custom_is_mobile())
    {
        $imgBackground = $node->field_mobile_background_cik['und'][0];
    }
    ?>
    <img src="<?= file_create_url($imgBackground['uri']); ?>" alt="<?= $imgBackground['uri']['alt'] ?>" title="<?= $imgBackground['title'] ?>" class="bg_img">
    <article class="content-background">
        <h2 class="line center"><?= $node->field_title_visa_cik['und'][0]['value'] ?></h2>
        <img src="<?= file_create_url($node->field_card_image_cik['und'][0]['uri']); ?>" alt="<?= $node->field_card_image_cik['und'][0]['uri']['alt'] ?>" title="<?= $node->field_card_image_cik['und'][0]['title'] ?>" class="image-left">
        <div class="content">
            <?= $node->field_description_visa_cik['und'][0]['value']; ?>
        </div>
    </article>
</section>
<section class="block-terms container-fluid">
    <h2><?php print t('Terms & Conditions'); ?></h2>
    <article class="content">
        <?= $node->field_terms_conditions_cik['und'][0]['value'] ?>
    </article>
</section>
