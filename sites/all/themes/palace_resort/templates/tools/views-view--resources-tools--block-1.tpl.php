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
<section class='block-tools container-fluid'>
  <?php foreach ($datos AS $key => $dato): ?>
    <?php $tool = $dato->_field_data['nid']['entity']; ?>
    <article class="block-video">
      <section class="content">
        <iframe class="video" src="<?= $tool->field_video_rt['und'][0]['value']; ?>" width="100%" height="500" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" data-ready="true"></iframe>
        <h2><?= $tool->field_title_rt['und'][0]['value']; ?></h2>
      </section>
    </article>
  <?php endforeach; ?>
</section>
