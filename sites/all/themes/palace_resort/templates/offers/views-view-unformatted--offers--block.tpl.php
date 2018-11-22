<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */

global $language;
$lang_name = $language->language;

//Nuevo layout solo para US
if($lang_name=='en')
{
	$group_term = taxonomy_vocabulary_machine_name_load("offers_groups");
	$groups = taxonomy_get_tree($group_term->vid);
	?>
    <section class="offers-items">
        <h2 class="line center"><span><?php print t('PRO ACCESS') ?></span></h2>
		<?php
		//Se recorre cada item de la taxonomía
		foreach ($groups as $group)
		{
			//Se ejecuta la vista solo con las ofertas de esta taxonomía
			$view = views_get_view('offers');
			$view->set_arguments(array($group->tid));
			$view->set_display("filter");
			$view->execute();
			$datos = $view->result;
			?>
            <section class="block-resortspage container-fluid" id="oferta-agrupador">
                <div class="container">
                    <article class="content-become align-center">
                        <h2 class="line center"><?php print $group->name; ?> </h2>
                        <p><?php print $group->description; ?></p>
                    </article>
                </div>

            </section>

			<?php
			if (count($datos) > 0)
			{
				//si el término tiene ofertas
				?>
                <section class='block-resortspage container-fluid color-section '>
                    <div class="container">
                        <section class="owl-carousel owl-carousel-offers">
							<?php foreach ($datos as $key => $dato): ?>
                                <div class="item">
									<?php $offer = $dato->_field_data["nid"]["entity"]; ?>
									<?php
									?>
                                    <a href="<?php print _cdi_custom_get_url('node/' . $offer->nid); ?>"
                                       class="link-image"><img
                                                src="<?= file_create_url($offer->field_image_slider['und'][0]['uri']); ?>"
                                                alt="<?= $offer->field_image_slider['und'][0]['alt'] ?>"
                                                title="<?= $offer->field_image_slider['und'][0]['title'] ?>"
                                                class="img-responsive"></a>
                                    <h2 class="line"><?= $offer->field_title_of['und'][0]['value']; ?></h2>
                                    <div class="actions">
										<?php if (cdi_custom_get_market_by_language() == 'US'): ?>
                                            <a href=""
                                               class="enlace enlace-orange btn-book-now"><?php print t('BOOK RESORT'); ?></a>
										<?php endif; ?>
										<?php
										$classLightBox = '';
										if (isset($offer->field_show_light_box['und']) && $offer->field_show_light_box['und'][0]['value'] == 1)
										{
											$classLightBox = 'btn-action-light-box';
										}
										?>
                                        <a href="<?php print _cdi_custom_get_url('node/' . $offer->nid); ?>"
                                           class="enlace enlace-green <?= $classLightBox ?>"><?php print t('VIEW MORE'); ?></a>
                                    </div>
                                </div>
							<?php endforeach; ?>
                        </section>
                    </div>
                </section>
				<?php
			}
		} ?>
    </section>
	<?php
}
else
{

    $datos = array();
    if (!empty($view->result[0]->_field_data["nid"]["entity"]))
    {
        $datos = $view->result;
    }

	if (count($datos) > 0)
	{
		?>
		<?php foreach ($datos as $key => $dato): ?>
		<?php $offer = $dato->_field_data["nid"]["entity"]; ?>
		<?php
		$classImg = '';
		$classContent = '';
		if ($key % 2 == 0)
		{
			$classImg = 'right';
			$classContent = 'left';
		}
		else
		{
			$classContent = 'right';
			$classImg = 'left';
		}
		?>
        <section class='block-resortspage container-fluid color-section <?= $classContent ?>'>
            <article class="block-black">
				<?php
				if (cdi_custom_is_mobile())
				{
					?>
                    <section
                            class="col-md-6 col-sm-12 col-xs-12 image <?= $classImg ?>">
                        <img src="<?= file_create_url($offer->field_image_mobile_of['und'][0]['uri']); ?>"
                             alt="<?= $offer->field_image_mobile_of['und'][0]['alt'] ?>"
                             title="<?= $offer->field_image_mobile_of['und'][0]['title'] ?>" class="img-responsive">
                    </section>
				<?php } ?>

                <section
                        class="col-md-6 col-sm-12 col-xs-12 <?= $classContent ?> ">
                    <article class="content">
                        <h2 class="line"><?= $offer->field_title_of['und'][0]['value']; ?></h2>
                        <p><?= $offer->field_abstract_text_of['und'][0]['value'] ?></p>
                        <div class="actions">
							<?php if (cdi_custom_get_market_by_language() == 'US'): ?>
                                <a href=""
                                   class="enlace enlace-orange btn-book-now"><?php print t('BOOK RESORT'); ?></a>
							<?php endif; ?>
							<?php
							$classLightBox = '';
							if (isset($offer->field_show_light_box['und']) && $offer->field_show_light_box['und'][0]['value'] == 1)
							{
								$classLightBox = 'btn-action-light-box';
							}
							?>
                            <a href="<?php print _cdi_custom_get_url('node/' . $offer->nid); ?>"
                               class="enlace enlace-green <?= $classLightBox ?>"><?php print t('VIEW MORE'); ?></a>
                        </div>
                    </article>
                </section>
				<?php
				if (!cdi_custom_is_mobile())
				{
					?>
                    <section class="col-md-6 col-sm-6 col-xs-12 image <?= $classImg ?>">
                        <img src="<?= file_create_url($offer->field_image_desktop_of['und'][0]['uri']); ?>"
                             alt="<?= $offer->field_image_desktop_of['und'][0]['alt'] ?>"
                             title="<?= $offer->field_image_desktop_of['und'][0]['title'] ?>" class="img-responsive">
                    </section>
					<?php
				}
				?>
            </article>
        </section>
	<?php endforeach; ?>
        <div id="modal-term-offer" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <p><?php print t('<span>Plan on promoting</span>  this great offer?'); ?> </p>
                        <h3><?php print t('Please agree to our terms and conditions.'); ?></h3>
                        <div class="buttons">
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal"><?php print t('I decline'); ?></button>
                            <a href="" class="btn btn-default"
                               id="btn-aceptar-term-offers"><?php print t('I accept'); ?></a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
		<?php drupal_add_js('jQuery(document).ready(function () { 
            jQuery(\'.btn-action-light-box\').click(function(e){
              e.preventDefault();
              var href = $(this).attr(\'href\');
              jQuery(\'#btn-aceptar-term-offers\').attr(\'href\', href);
              jQuery(\'#modal-term-offer\').modal();
            });
         });', array('type' => 'inline', 'group' => JS_THEME, 'weight' => 30)); ?>
		<?php
	}
}
?>