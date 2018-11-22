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
        $img = $datos->field_image_banner_of;
        if (cdi_custom_is_mobile())
        {
            $img = $datos->field_image_banner_mobile_of;
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
    <section class='block-resortspage detail-offer container-fluid'>
        <article class="block-black">
            <section class="col-md-6 col-sm-6 col-xs-12 ">
               <article class="content">
                    <h2 class="line"><?= $datos->field_internal_title_of['und'][0]['value']; ?></h2>
                    <?= $datos->field_internal_description_of['und'][0]['value']; ?>
                    <div class="actions">
                    </div>
               </article>

            </section>
            <section class="col-md-6 col-sm-6 col-xs-12 flexslider slider-resorts">
                <ul class="slides">
                    <?php foreach ($datos->field_description_images_of['und'] AS $key => $imageDescripcion): ?>
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
            <p><?= $datos->field_terms_and_conditions_of['und'][0]['value']; ?></p>
        </article>
    </section>
<?php
endif;
?>
