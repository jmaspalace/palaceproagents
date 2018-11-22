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
<section class="block-title container-fluid">
    <h2 class="line center"><?= $node->field_title_rss['und'][0]['value']; ?> <span class="tiny"><?= $node->field_subtitle_rss['und'][0]['value']; ?></span></h2>
    <p><?= $node->field_intro_description_rss['und'][0]['value']; ?></p>
</section>
<section class="block-black-content2 padding-elemet padding-box container-fluid">
    <?php if (cdi_custom_is_mobile()): ?>
        <img src="<?= file_create_url($node->field_image_mobile_rss['und'][0]['uri']) ?>" title="<?= $node->field_image_mobile_rss['und'][0]['title']?>" alt="<?= $node->field_image_mobile_rss['und'][0]['alt'] ?>" class="img-responsive">
    <?php endif; ?>
    <article class="description">
        <section class="content">
            <h2 class="line"><?= $node->field_title_requerimients_rss['und']{0}['value']; ?></h2>
            <ul>
              <?php foreach ($node->field_requerimients_rss['und'] AS $key => $requerimient): ?>
                  <li><?= $requerimient['value']; ?></li>
              <?php endforeach; ?>
            </ul>
        </section>
    </article>
  <?php if (!cdi_custom_is_mobile()): ?>
    <article class="image">
        <img src="<?= file_create_url($node->field_image_rss['und'][0]['uri']) ?>" title="<?= $node->field_image_rss['und'][0]['title']?>" alt="<?= $node->field_image_rss['und'][0]['alt'] ?>" class="img-responsive">
    </article>
  <?php endif; ?>
</section>
<section class='block-background-2colums container-fluid'>
  <?php if (!cdi_custom_is_mobile()): ?>
    <img src="<?= file_create_url($node->field_background_rss['und'][0]['uri']) ?>" title="<?= $node->field_background_rss['und'][0]['title']?>" alt="<?= $node->field_background_rss['und'][0]['alt'] ?>" class="bg_img">
  <?php endif; ?>
    <article class="content-background">
        <h2 class="line center"><?= $node->field_title_terms_conditions_rss['und'][0]['value']; ?></h2>
        <section class="content">
            <ul class="colums-2">
              <?php foreach ($node->field_terms_conditions['und'] AS $key => $term): ?>
                  <li><?= $term['value']; ?></li>
              <?php endforeach; ?>
            </ul>
        </section>
        <form class="acept-terms">
            <p><?php print t('To arrange transfers, contact:') ?><br><br>
                <?php $contacts = field_get_items('node', $node, 'field_info_contact_rss'); ?>
                <?php foreach ($contacts AS $key => $contact): ?>
                    <?php $contact = field_collection_item_load($contact['value']); ?>
                    <?= $contact->field_name_rss['und'][0]['value']; ?> <a href="mailto:<?= $contact->field_email_rss['und'][0]['value']; ?>"><?= $contact->field_email_rss['und'][0]['value']; ?></a><br>
                <?php endforeach; ?>
            </p>
            <div class="group-form">
                <a href="<?= _cdi_custom_get_url('benefits/ready_sell_stay/form'); ?>" class="enlace enlace-orange"><?php print t('BOOK READY, SELL, STAY.') ?></a>
            </div>
        </form>
    </article>
</section>