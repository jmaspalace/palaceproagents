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
<section class='block-resortspage container-fluid'>
    <?php foreach ($datos as $key => $dato): ?>
        <?php $resort = $dato->_field_data["nid"]["entity"]; ?>
        <article class="block-black">
            <?php
                if (cdi_custom_is_mobile())
                {
                    ?>
            <section class="col-md-6 col-sm-12 col-xs-12 flexslider slider-resorts">
                <ul class="slides">
                    <?php foreach ($resort->field_images_mobile_resort['und'] AS $kImg => $image): ?>
                    <li>
                        <img src="<?= file_create_url($image['uri']); ?>" title="<?= $image['title']; ?>" alt="<?= $image['alt']; ?>" class="img-responsive">
                    </li>
                    <?php endforeach; ?>
                </ul>
            </section>
            <?php
                }
                ?>
            <section class="col-md-6 col-sm-12 col-xs-12">
                <article class="content">
                    <img class="logo" src="<?= file_create_url($resort->field_resort_logo_resort['und'][0]['uri']) ?>" alt="<?= $resort->field_resort_logo_resort['und'][0]['alt'] ?>" title="<?= $resort->field_resort_logo_resort['und'][0]['title'] ?>" />
                    <p><?= $resort->field_description_resort['und'][0]['value']; ?></p>
                    <div class="actions">
                        <?php if (cdi_custom_get_market_by_language() == 'US'): ?>
                        <a href="" class="enlace enlace-orange btn-book-now"><?php print t('BOOK RESORT'); ?></a>
                        <?php endif; ?>
                        <?php $link = $resort->field_visit_site_resort['und'][0]; ?>
                        <?php $target = ( (isset($link['attributes']['target']) && $link['attributes']['target'] !== 0) ? $link['attributes']['target'] : '_self'); ?>
                        <a href="<?= _cdi_custom_get_url($link['url']) ?>" target="<?= $target ?>" class="enlace enlace-green"><?= $link['title'] ?></a>
                    </div>
                </article>
            </section>
            <?php
            if (!cdi_custom_is_mobile())
            {
                ?>
                <section class="col-md-6 col-sm-6 col-xs-12 flexslider slider-resorts">
                    <ul class="slides">
                        <?php foreach ($resort->field_images_resort['und'] AS $kImg => $image): ?>
                            <li>
                                <img src="<?= file_create_url($image['uri']); ?>" title="<?= $image['title']; ?>" alt="<?= $image['alt']; ?>" class="img-responsive">
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </section>
                <?php
            }
            ?>
        </article>
    <?php endforeach; ?>
</section>

