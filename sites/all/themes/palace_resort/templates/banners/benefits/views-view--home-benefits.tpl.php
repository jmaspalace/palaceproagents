<?php
$datos = array();
if (!empty($view->result)) {
    $datos = $view->result;
}
foreach ($datos as $key => $dato) {
    $item = $dato->_field_data["nid"]["entity"];
    $style = $item->field_section_style['und'][0]['tid'];
    $target = '_self';
    if (!empty($item->field_link_home_section) && $item->field_link_home_section['und'][0]['attributes']['target'] === '_blank') {
        $target = '_blank';
    }
    $img = $item->field_imagen_home_section;
    if (cdi_custom_is_mobile()) {
        $img = $item->field_imagen_mobile_home_section;
    }
    $class = $item->field_is_public_section['und'][0]['value'] == 0 ? 'no-public' : '';

    if ($style == 3) {
        ?>
        <section class='block-float-green container-fluid left'>
            <img src="<?= file_create_url($img['und'][0]['uri']); ?>" alt="<?= $img['und'][0]['alt'] ?>" title="<?= $img['und'][0]['title'] ?>" class="img-responsive">
            <div class="col-md-6">
            	 <article class="content">
					<h2 class="line"><span><?= $item->title ?></span></h2>
                    <p><?= $item->field_description_home_section['und'][0]['value']; ?></p>
                    <?php if (!empty($item->field_link_home_section['und'][0]['url'])) : ?>
                    <a target="<?php print $target ?>" href="<?= _cdi_custom_get_url($item->field_link_home_section['und'][0]['url']); ?>" class="enlace enlace-white <?= $class ?>"><?= $item->field_link_home_section['und'][0]['title'] ?></a>
                    <?php endif; ?>
				</article>
            </div>
        </section>
        <?php

    }

    if ($style == 4) {
        ?>
        <section
                class='right block-black-content2 container-fluid'>
                <?php if (cdi_custom_is_mobile()) : ?>
            <article class="image">
                    <img src="<?= file_create_url($img['und'][0]['uri']); ?>" alt="<?= $img['und'][0]['alt'] ?>" title="<?= $img['und'][0]['title'] ?>" class="img-responsive">
            </article>
                <?php endif; ?>
                <article class="description">
                   <section class="content">
                   	 	<h2 class="line"><?= $item->title ?></h2>
                    	<p><?= $item->field_description_home_section['und'][0]['value']; ?></p>
                   		<?php if (!empty($item->field_link_home_section['und'][0]['url'])) : ?>
                        <a target="<?php print $target ?>" href="<?= _cdi_custom_get_url($item->field_link_home_section['und'][0]['url']) ?>" class="enlace enlace-green <?= $class ?>"><?= $item->field_link_home_section['und'][0]['title'] ?></a>
                        <?php endif; ?>
                   </section>
                </article>
                <?php if (!cdi_custom_is_mobile()) : ?>
                <article class="image">
                    <img src="<?= file_create_url($img['und'][0]['uri']); ?>" alt="<?= $img['und'][0]['alt'] ?>" title="<?= $img['und'][0]['title'] ?>" class="img-responsive">
                </article>
                <?php endif; ?>
        </section>
        <?php

    }

    if ($style == 5) {
        ?>
        <section
                class='block-black-content2 ready-sell container-fluid left'>
            	<article class="description">
            		<section class="content">
						<h2 class="line"><?= $item->title ?></h2>
                        <?php if (cdi_custom_is_mobile()) : ?>
                        <article class="image">
                            <img src="<?= file_create_url($img['und'][0]['uri']); ?>" alt="<?= $img['und'][0]['alt'] ?>" title="<?= $img['und'][0]['title'] ?>" class="img-responsive">
                        </article>
                        <?php endif; ?>
						<p><?= $item->field_description_home_section['und'][0]['value']; ?></p>
						<?php if (!empty($item->field_link_home_section['und'][0]['url'])) : ?>
                        <a target="<?php print $target ?>" href="<?= _cdi_custom_get_url($item->field_link_home_section['und'][0]['url']) ?>" class="enlace enlace-green <?= $class ?>"><?= $item->field_link_home_section['und'][0]['title'] ?></a>
                        <?php endif; ?>
                	</section>
            	</article>
                <?php if (!cdi_custom_is_mobile()) : ?>
                <article class="image">
                    <img src="<?= file_create_url($img['und'][0]['uri']); ?>" alt="<?= $img['und'][0]['alt'] ?>" title="<?= $img['und'][0]['title'] ?>" class="img-responsive">
                </article>
                <?php endif; ?>
        </section>
        <?php

    }

    if ($style == 6) {
        ?>
        <section class='block-background container-fluid'>
            <img src="<?= file_create_url($img['und'][0]['uri']); ?>" alt="<?= $img['und'][0]['alt'] ?>" title="<?= $img['und'][0]['title'] ?>" class="img-responsive">
            <article class="content-background align-center">
                <h2 class="line center"><?= $item->title ?></h2>
                <p><?= $item->field_description_home_section['und'][0]['value']; ?></p>
                <?php if (!empty($item->field_link_home_section['und'][0]['url'])) : ?>
                    <a target="<?php print $target ?>" href="<?= _cdi_custom_get_url($item->field_link_home_section['und'][0]['url']) ?>" class="enlace enlace-white <?= $class ?>"><?= $item->field_link_home_section['und'][0]['title'] ?></a>
                <?php endif; ?>
            </article>
        </section>
        <?php

    }
    ?>
<?php

} ?>

<?php
if (!user_is_logged_in()) {
    ?>
<div id="message-logged" class="tabbed_box modal">
    <div class="modal-dialog" role="document">
        <div class="widget-container modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="widget-button demo">
                <p><?php print t('PLEASE REGISTER OR LOG IN TO ACCESS THIS INFORMATION. ') ?></p>
                <a class="enlace " href="<?= _cdi_custom_get_url('registration'); ?>"><?php print t('Register'); ?></a>
                <a class="enlace enlace-green" href="#" id="btn-login"><?php print t('Login'); ?></a>
            </div>
        </div>
    </div>
</div>
<?php
drupal_add_js(
    '$(document).ready(function (e) {
      $(\'.no-public\').on(\'click\', function (event) {
        event.preventDefault();
        event.stopPropagation();
        $(\'#message-logged\').modal(\'show\');
      });
      $(\'#btn-login\').on(\'click\', function (event) {
        event.preventDefault();
        event.stopPropagation();
        $(\'#message-logged\').modal(\'hide\');
        $(\'#logear\').trigger(\'click\');
      });
    });',
    array('type' => 'inline', 'group' => JS_THEME, 'weight' => 26)
);
}
?>
