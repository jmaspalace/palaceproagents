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
<section class='block-resortspage container-fluid'>
  <article class="block-black">
    <div class="text-center content-text">
      <?= $datos->field_contact_information_ws['und'][0]['value']; ?>
      <br><br><br>
      <?php $img = $datos->field_image_ws['und'][0]; ?>
      <?php if (cdi_custom_is_mobile()): ?>
        <?php $img = $datos->field_image_mobile_ws['und'][0]; ?>
      <?php endif; ?>
      <img src="<?= file_create_url($img['uri']); ?>" alt="<?= $img['alt'] ?>" title="<?= $img['title'] ?>" />
    </div>
  </article>
</section>
