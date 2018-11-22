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
<section class='block-procrowns container-fluid' id="pro-crowns">
    <?php if (cdi_custom_is_mobile()): ?>
        <img class="background" src="<?= file_create_url($datos->field_image_background_mobile_pr['und'][0]['uri']); ?>" alt="<?= $datos->field_image_background_mobile_pr['und'][0]['alt']; ?>" title="<?= $datos->field_image_background_mobile_pr['und'][0]['title']; ?>">
    <?php endif; ?>
    <article class="container">
        <h2 class="line crown"><?= $datos->field_title_pc['und'][0]['value']; ?></h2>
        <p><?= $datos->field_intro_description_pc['und'][0]['value']; ?></p>
        <section class="crowns">
            <?php foreach ($datos->field_level_images_pc['und'] AS $key => $image): ?>
                <img src="<?= file_create_url($image['uri']); ?>" alt="<?= $image['alt'] ?>" title="<?= $image['title']; ?>">
            <?php endforeach; ?>
        </section>
        <div class="description">
            <?= $datos->field_description_pc['und'][0]['value']; ?>
        </div>
    </article>
</section>
<section class='block-gray container-fluid'>
    <article class="container">
        <section class="section-left">
            <?= $datos->field_final_description_pr['und'][0]['value']; ?>
        </section>
        <section class="section-rigth">
            <h3><?= $datos->field_title_example_pr['und'][0]['value']; ?></h3>
            <?= $datos->field_description_example_pr['und'][0]['value']; ?>
        </section>
    </article>
</section>
