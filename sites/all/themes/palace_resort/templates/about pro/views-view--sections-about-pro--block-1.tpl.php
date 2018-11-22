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
<section class='block-become container-fluid' id="become-pro">
    <?php $img = $datos->field_image_background_bp['und'][0];  ?>
    <?php if (cdi_custom_is_mobile()): ?>
        <?php $img = $datos->field_image_background_mobile_bp['und'][0]; ?>
    <?php endif; ?>
    <img src="<?= file_create_url($img['uri']) ?>" alt="<?= $img['alt'] ?>" title="<?= $img['title'] ?>" class="img-responsive">
    <article class="content-become align-center">
        <h2 class="line center"><?= $datos->field_title_bp['und'][0]['value']; ?></h2>
        <p><?= $datos->field_description_bp['und'][0]['value']; ?></p>
        <?php $node = node_load($datos->nid); ?>
        <?php $steps = field_get_items('node', $node, 'field_steps_bp'); ?>
        <?php foreach ($steps AS $key => $step): ?>
            <?php $step = field_collection_item_load($step['value']); ?>
            <section class="step">
                <span class="number"><?= ($key+1); ?></span>
                <h3><?= $step->field_title_steps['und'][0]['value']; ?></h3>
                <p><?= $step->field_description_steps['und'][0]['value']; ?></p>
            </section>
        <?php endforeach; ?>
    </article>
</section>
