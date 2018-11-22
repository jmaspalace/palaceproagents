<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<?php if($fields['field_image_banner']->content != "" || $fields['field_image_mobile_banner']->content != ""):?>
    <?php
    $img = $fields['field_image_banner']->content;
    $imgMobile = $fields['field_image_mobile_banner']->content;
    ?>
    <li>
        <?php print $fields['field_link_banner']->content ?>
        <?php if (cdi_custom_is_tablet()): ?>
            <?= $img ?>
            <?= $imgMobile ?>
        <?php elseif (cdi_custom_is_mobile()): ?>
            <?= $imgMobile ?>
        <?php else: ?>
            <?= $img ?>
        <?php endif; ?>
        <section class="content">
            <h1><?php print strip_tags($fields['field_title_banner']->content) ?></h1>
            <p><?php print strip_tags($fields['field_subtitle_banner']->content) ?> </p>
        </section>
        <div class="gradient"></div>
    </li>
<?php endif; ?>
<?php if(strip_tags($fields['field_url_video_banner']->content)!="" && !cdi_custom_is_mobile()):?>
    <li>
        <div class="container-video">
            <iframe src="<?php echo trim(strip_tags($fields['field_url_video_banner']->content)) ?>" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
        </div>
    </li>
<?php endif; ?>