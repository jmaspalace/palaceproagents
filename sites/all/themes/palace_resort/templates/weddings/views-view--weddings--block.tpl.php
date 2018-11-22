<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
$datos = array();
if (!empty($view->result[0]->_field_data["nid"]["entity"])) {
  $datos = $view->result[0]->_field_data["nid"]["entity"];
}
?>
<article class="container">
  <h2 class="line center">
    <span><?= $datos->field_title_intro['und'][0]['value']; ?></span>
    <?php if (isset($datos->field_subtitle_intro['und'][0]['value']) && $datos->field_subtitle_intro['und'][0]['value'] !== '') : ?>
      <?= $datos->field_subtitle_intro['und'][0]['value']; ?>
    <?php endif; ?>
  </h2>
  <p class="text-center"><?= $datos->field_description_intro['und'][0]['value']; ?></p>
</article>
