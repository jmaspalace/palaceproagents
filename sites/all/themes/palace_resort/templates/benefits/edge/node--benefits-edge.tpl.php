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
    <h2 class="line center"><?= $node->field_title_edge['und'][0]['value']; ?> <span class="tiny"><?= $node->field_subtitle_edge['und'][0]['value']; ?></span></h2>
    <p><?= $node->field_intro_description_edge['und'][0]['value']; ?></p>
</section>
<section class="block-black-content2 container-fluid">
    <article class="description">
        <section class="content">
            <?php if (cdi_custom_is_mobile()): ?>
                <img src="<?= file_create_url($node->field_images_content_mobile_edge['und'][0]['uri']) ?>" alt="<?= $node->field_images_content_mobile_edge['und'][0]['alt'] ?>" title="<?= $node->field_images_content_mobile_edge['und'][0]['title'] ?>" />
            <?php endif; ?>
            <h2 class="line"><?= $node->field_title_diference_edge['und'][0]['value']; ?></h2>
            <p>
                <?php $diferences = field_get_items('node', $node, 'field_diferences_edge'); ?>
                <?php foreach ($diferences AS $key => $diference): ?>
                    <?php $diference = field_collection_item_load($diference['value']); ?>
                    <strong><?= $diference->field_difference_edge['und'][0]['value']; ?></strong><br>
                    <?= $diference->field_diff_description_edge['und'][0]['value']; ?>
                    <?php if ($key < (count($diferences)-1)): ?>
                        <br><br>
                    <?php endif; ?>
                <?php endforeach; ?>
            </p>
        </section>
    </article>
    <?php if (!cdi_custom_is_mobile()): ?>
    <article class="image">
        <img src="<?= file_create_url($node->field_images_content_edge['und'][0]['uri']) ?>" title="<?= $node->field_images_content_edge['und'][0]['title']; ?>" alt="<?= $node->field_images_content_edge['und'][0]['alt']; ?>" class="img-responsive">
    </article>
    <?php endif; ?>
</section>
<section class="block-black-content2 container-fluid">
    <article class="image">
        <?php if (cdi_custom_is_mobile()): ?>
            <img src="<?= file_create_url($node->field_images_content_mobile_edge['und'][1]['uri']) ?>" title="<?= $node->field_images_content_mobile_edge['und'][1]['title']; ?>" alt="<?= $node->field_images_content_mobile_edge['und'][1]['alt']; ?>" class="img-responsive">
        <?php else: ?>
            <img src="<?= file_create_url($node->field_images_content_edge['und'][1]['uri']) ?>" title="<?= $node->field_images_content_edge['und'][1]['title']; ?>" alt="<?= $node->field_images_content_edge['und'][1]['alt']; ?>" class="img-responsive">
        <?php endif; ?>
    </article>
    <article class="description">
        <section class="content">
            <p>
                <?php $diferences = field_get_items('node', $node, 'field_other_differences_edge'); ?>
                <?php foreach ($diferences AS $key => $diference): ?>
                    <?php $diference = field_collection_item_load($diference['value']); ?>
                    <strong><?= $diference->field_difference_edge['und'][0]['value']; ?></strong><br>
                    <?= $diference->field_diff_description_edge['und'][0]['value']; ?>
                    <?php if ($key < (count($diferences)-1)): ?>
                        <br><br>
                    <?php endif; ?>
                <?php endforeach; ?>
            </p>
        </section>
    </article>
</section>
<section class='block-advantages container-fluid block-background'>
    <?php if (cdi_custom_is_mobile()): ?>
        <img src="<?= file_create_url($node->field_image_background_mbl_edge['und'][0]['uri']) ?>" alt="<?= $node->field_image_background_mbl_edge['und'][0]['alt'] ?>" title="<?= $node->field_image_background_mbl_edge['und'][0]['alt'] ?>">
    <?php else: ?>
        <img src="<?= file_create_url($node->field_image_background_edge['und'][0]['uri']) ?>" alt="<?= $node->field_image_background_edge['und'][0]['alt'] ?>" title="<?= $node->field_image_background_edge['und'][0]['alt'] ?>">
    <?php endif; ?>
    <article class="container">
        <h2 class="center"><?= $node->field_title_complimentary_edge['und'][0]['value']; ?></h2>
        <?php if (!cdi_custom_is_mobile()): ?>
            <?php $rooms = field_get_items('node', $node, 'field_rooms_benefits_edge'); ?>
            <div class="edge-table">
            <table>
                <tbody>
                    <tr>
                        <?php foreach ($rooms AS $key => $room): ?>
                            <?php $room = field_collection_item_load($room['value']); ?>
                            <td><?php print $room->field_number_rooms_edge['und'][0]['value']; ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <?php foreach ($rooms AS $key => $room): ?>
                            <?php $room = field_collection_item_load($room['value']); ?>
                            <td><?php print $room->field_complimentary_edge['und'][0]['value']; ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <?= $node->field_title_complimentary_edge_2['und'][0]['value']; ?>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">
                            <?php print t('MORE EXTRAS'); ?>
                        </td>
                        <td colspan="3">
                            <ul>
                            <?php foreach ($node->field_extras_edge['und'] AS $key => $extra):  ?>
                                <li><?= $extra['value']; ?></li>
                            <?php endforeach; ?>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <span class="span-block"><?php print t('not yet a palace pro specialist agent?') ?></span>
                            <a href="<?= _cdi_custom_get_url('registration'); ?>"><?php print t('sign up today') ?> </a>&nbsp;<span><?php print t('OR CALL'); ?> <a href="tel:18777825018">(877) 782-5018</a></span>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <?php else: ?>
            <p><?= $node->field_description_in_mobile_edge['und'][0]['value']; ?></p>
        <?php endif; ?>
    </article>
</section>
<section class="block-terms container-fluid">
    <h2><?php print t('Terms & Conditions'); ?></h2>
    <article class="content">
        <?= $node->field_terms_conditions_edge['und'][0]['value']; ?>
    </article>
</section>
