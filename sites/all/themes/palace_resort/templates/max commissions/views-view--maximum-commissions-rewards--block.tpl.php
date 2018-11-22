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
  $datos = $view->result[0]->_field_data["nid"]["entity"];
}
?>
<section class="container-fluid" id="maximun-commissions">
  <?php if (!cdi_custom_is_mobile()): ?>
    <img class="bg_commissions" src="<?= base_path().path_to_theme() ?>/images/bg_comissions.jpg" alt="comissions" title="comissions">
  <?php endif; ?>
  <h2 class="line center">
    <?= $datos->field_title_mcr['und'][0]['value']; ?>
    <span class="subtitle"><?= $datos->field_subtitle_mcr['und'][0]['value']; ?></span>
  </h2>
  <article class="container commissions">
    <section class="col-md-6 col-sm-6 col-xs-12">
      <img src="<?= file_create_url($datos->field_image_mcr['und'][0]['uri']) ?>" alt="<?= $datos->field_image_mcr['und'][0]['alt'] ?>" title="<?= $datos->field_image_mcr['und'][0]['title'] ?>" class="img-responsive">
    </section>

    <section class="col-md-6 col-sm-6 col-xs-12">
      <article class="content">
        <ul>
        <?php foreach ($datos->field_benefits_list_mcr['und'] AS $key => $benefit): ?>
          <li><?= $benefit['value']; ?></li>
        <?php endforeach; ?>
        </ul>
        <?= $datos->field_note_mcr['und'][0]['value']; ?>
        <a href="<?= _cdi_custom_get_url('contact_us') ?>"><?php print t('CLICK HERE') ?>.</a>
      </article>
    </section>
  </article>
</section>