<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
$datos = array();
if (!empty($view->result[0]->_field_data["nid"]["entity"]))
{
  $datos = $view->result;
}
?>
<section class='block-cards container-fluid'>
  <?php foreach ($datos as $key => $dato): ?>
    <?php $inside = $dato->_field_data["nid"]["entity"]; ?>
    <article class="block-card">
      <section class="image">
        <?php if (isset($inside->field_image_inside_sales['und'][0]['uri']) && $inside->field_image_inside_sales['und'][0]['uri'] != ''): ?>
          <img src="<?= file_create_url($inside->field_image_inside_sales['und'][0]['uri']); ?>" alt="<?= $inside->field_image_inside_sales['und'][0]['alt'] ?>" title="<?= $inside->field_image_inside_sales['und'][0]['title'] ?>" />
        <?php else: ?>
          <img src="<?= base_path(). path_to_theme() ?>/images/img_foto_avatar_mujer.jpg">
        <?php endif; ?>
      </section>
      <section class="info">
        <h3><?= $inside->field_name_inside_sales['und'][0]['value']; ?></h3>
        <p>
          <?php print t('Phone') ?>:<br>
          <a href="tel:<?= $inside->field_phone_inside_sales['und'][0]['value'] ?>"><?= $inside->field_phone_inside_sales['und'][0]['value'] ?></a><br>
          <?php print t('Email') ?>:<br>
          <a href="mailto:<?= $inside->field_email_inside_sales['und'][0]['value'] ?>"><?= $inside->field_email_inside_sales['und'][0]['value'] ?></a>
        </p>
      </section>
    </article>
  <?php endforeach; ?>
</section>
