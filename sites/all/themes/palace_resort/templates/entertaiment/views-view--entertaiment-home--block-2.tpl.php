<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
$datos = null;
if (!empty($view->result[0]))
{
  $datos = $view->result[0]->_field_data["nid"]["entity"];
}
if (isset($datos)):
  ?>
  <section class="container-fluid bloque-banner">
    <?php
    $img = $datos->field_banner_image_entertainment;
    $imagesSlider = $datos->field_images_entertainment['und'];
    if (cdi_custom_is_mobile())
    {
      $img = $datos->field_banner_image_mobile_enter;
      $imagesSlider = $datos->field_images_mobile_entertainmen['und'];
    }
    ?>
    <img src="<?= file_create_url($img['und'][0]['uri']); ?>" title="<?= $img['und'][0]['title'] ?>" alt="<?= $img['und'][0]['alt'] ?>" class="img-responsive"/>
    <div class="gradient"></div>
    <!-- <div class="booking-form"></div> -->
  </section>
  <?php
    if (cdi_custom_get_market_by_language() === 'US'):
        $block = module_invoke('booking', 'block_view', 'proagents_booking');
        print render($block['content']);
    endif;
    ?>
  <?php
  $block = module_invoke('cdi_breadcrumb', 'block_view', 'cdi_breadcrumb');
  print render($block['content']);
  ?>
  <section class='bloque-tabs container-fluid'>
    <div class="container-tabs">
      <div class="tab1 active">
        <section class='block-resortspage container-fluid'>
          <article class="block-black">
            <section class="col-md-6 col-sm-6 col-xs-12">
              <article class="content">
                <h2 class="line"><?= $datos->field_internal_title_entertainme['und'][0]['value']; ?></h2>
                <?= $datos->field_description_internal_enter['und'][0]['value']; ?>
                <div class="actions">
                </div>
              </article>
            </section>
            <section class="col-md-6 col-sm-6 col-xs-12 flexslider slider-resorts">
              <ul class="slides">
                <?php foreach ($imagesSlider AS $key => $imageDescripcion): ?>
                  <li>
                    <img src="<?= file_create_url($imageDescripcion['uri']); ?>" alt="<?= $imageDescripcion['alt'] ?>" title="<?= $imageDescripcion['title'] ?>" class="img-responsive">
                  </li>
                <?php endforeach; ?>
              </ul>
            </section>
          </article>
        </section>
        <section class="block-terms container-fluid">
          <h2><?php print t('Terms & Conditions'); ?></h2>
          <article class="content">
            <p><?= $datos->field_terms_conditions_entertain['und'][0]['value']; ?></p>
          </article>
        </section>
      </div>
    </div>
  </section>
  <?php
endif;
?>