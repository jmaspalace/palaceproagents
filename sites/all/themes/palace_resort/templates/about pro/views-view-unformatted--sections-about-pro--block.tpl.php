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
<section class='block-content right container-fluid' id="what-pro">
    <article class="container what-pro">
        <section class="col-md-6 col-sm-12 col-xs-12 image">
            <?php $img = $datos->field_imagen_home_section['und'][0];  ?>
            <?php if (cdi_custom_is_mobile()): ?>
            <?php $img = $datos->field_imagen_mobile_home_section['und'][0]; ?>
            <?php endif; ?>
            <img src="<?= file_create_url($img['uri']); ?>" alt="<?= $img['alt'] ?>" title="<?= $img['title'] ?>" class="img-responsive">
        </section>
        <section class="col-md-6 col-sm-12 col-xs-12">
            <article class="content">
                <h2 class="line"><?= $datos->title ?></h2>
                <p><?= $datos->field_description_home_section['und'][0]['value']; ?></p>
            </article>
        </section>

    </article>
</section>