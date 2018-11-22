<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */

global $language;
$datos = array();
if (!empty($view->result[0]->_field_data["nid"]["entity"])) {
    $datos = $view->result[0]->_field_data["nid"]["entity"];
}
?>
<section class="block-advantages container-fluid crown-text" id="advantages">
    <?php if (!cdi_custom_is_mobile()) : ?>
        <img src="<?= file_create_url($datos->field_image_background['und'][0]['uri']) ?>" alt="<?= $datos->field_image_background['und'][0]['alt'] ?>" title="<?= $datos->field_image_background['und'][0]['title'] ?>" />
    <?php endif; ?>
    <article class="container">
        <h2 class="line center"><?= $datos->field_title_avg['und'][0]['value']; ?></h2>
        <?php if (cdi_custom_is_mobile()) : ?>
            <img src="<?= file_create_url($datos->field_image_mobile['und'][0]['uri']); ?>" alt="<?= $datos->field_image_mobile['und'][0]['alt']; ?>" title="<?= $datos->field_image_mobile['und'][0]['title']; ?>">
        <?php endif; ?>
        <p><?= $datos->field_description_avg['und'][0]['value']; ?></p>
        <?php if (!empty($view->style_plugin->rendered_fields[0]['field_imagen_logo_fo'])) : ?>
            <div class="crown-level-images">
                <?php print $view->style_plugin->rendered_fields[0]['field_imagen_logo_fo']; ?>
            </div>
        <?php endif; ?>
    </article>
    <?php if (!cdi_custom_is_mobile()) : ?>
        <div class="table-crowns-<?php print $language->language; ?>">
        <?php
        if ($language->language == 'en') {
            $view = views_embed_view('table_advantages', 'block_en');
        } else {
            $view = views_embed_view('table_advantages');
        }
        print $view;
        ?>
        </div>
    <?php endif; ?>
    <?php if (!user_is_logged_in()) : ?>
        <a href="<?= _cdi_custom_get_url('registration'); ?>" class="enlace enlace-green"><?php print t('Become a PRO Specialist Agent'); ?></a>
    <?php endif; ?>
</section>
