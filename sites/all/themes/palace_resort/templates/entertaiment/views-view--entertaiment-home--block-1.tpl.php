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
<?php foreach ($datos as $key => $dato): ?>
    <?php $entertainment = $dato->_field_data["nid"]["entity"]; ?>
    <?php
    $classImg = '';
    $classContent = '';
    if ($key%2 == 0)
    {
        $classImg = 'right';
        $classContent = 'left';
    }
    else
    {
        $classContent= 'right';
        $classImg = 'left';
    }
    ?>
    <section class='block-resortspage container-fluid color-section'>
        <article class="block-black">
            <section
                    class="col-md-6 col-sm-12 col-xs-12 <?= $classContent ?>">
                <article class="content">
                    <h2 class="line"><?= $entertainment->field_title_entertainment['und'][0]['value']; ?></h2>
                    <?php
                    if (cdi_custom_is_mobile())
                    {
                        ?>
                    <article class="image">
                        <img src="<?= file_create_url($entertainment->field_image_mobile_entertainment['und'][0]['uri']); ?>" alt="<?= $entertainment->field_image_mobile_entertainment['und'][0]['alt'] ?>" title="<?= $entertainment->field_image_mobile_entertainment['und'][0]['title'] ?>" class="img-responsive">
                    </article>
                        <?php
                    }
                    ?>
                    <p><?= $entertainment->field_description_entertainment['und'][0]['value']; ?></p>
                    <div class="actions">
                        <?php if (cdi_custom_get_market_by_language() == 'US'): ?>
                        <a href="" class="enlace enlace-orange btn-book-now"><?php print t('BOOK RESORT'); ?></a>
                        <?php endif; ?>
                        <a href="<?php print _cdi_custom_get_url('node/'.$entertainment->nid); ?>" class="enlace enlace-green"><?php print t('VIEW MORE'); ?></a>
                    </div>
                </article>
            </section>
            <?php
            if (!cdi_custom_is_mobile())
            {
                ?>
                <section class="col-md-6 col-sm-6 col-xs-12 image <?= $classImg ?>">
                    <img src="<?= file_create_url($entertainment->field_imagen_entertainment['und'][0]['uri']); ?>" alt="<?= $entertainment->field_imagen_entertainment['und'][0]['alt'] ?>" title="<?= $entertainment->field_imagen_entertainment['und'][0]['title'] ?>" class="img-responsive">
                </section>
                <?php
            }
            ?>
        </article>
    </section>
<?php endforeach; ?>
