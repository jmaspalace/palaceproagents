<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
$datos = array();
if (!empty($view->result[0]->_field_data["nid"]["entity"])) {
  $datos = $view->result;
}
?>
<?php foreach ($datos as $key => $dato) : ?>
  <?php $weddings = $dato->_field_data["nid"]["entity"]; ?>
  <?php
  $classImg = '';
  $classContent = '';
  if ($key % 2 == 0) {
    $classImg = 'right';
    $classContent = 'left';
  } else {
    $classContent = 'right';
    $classImg = 'left';
  }
  ?>
  <section class='block-resortspage container-fluid color-section'>
    <article class="block-black">
        <?php
        if (cdi_custom_is_mobile()) {
          ?>
        <section class="col-md-6 col-sm-6 col-xs-12 image <?= $classImg ?>">
            <img src="<?= file_create_url($weddings->field_image_mobile_weddings['und'][0]['uri']); ?>" alt="<?= $weddings->field_image_mobile_weddings['und'][0]['alt'] ?>" title="<?= $weddings->field_image_mobile_weddings['und'][0]['title'] ?>" class="img-responsive">
        </section>
        <?php

      }
      ?>
      <section class="col-md-6 col-sm-12 col-xs-12 <?= $classContent ?>">
        <article class="content">
        	<h2 class="line">
			  <span><?= $weddings->field_title_weddings['und'][0]['value']; ?></span>
			  <?php if (isset($weddings->field_subtitle_weddings['und'][0]['value']) && $weddings->field_subtitle_weddings['und'][0]['value'] !== '') : ?>
				<?= $weddings->field_subtitle_weddings['und'][0]['value']; ?>
			  <?php endif; ?>
        	</h2>
        	<?= $weddings->field_description_weddings['und'][0]['value'] ?>
            <?php if (isset($weddings->field_file_download_weddings['und'][0]['uri'])) : ?>
                <a target="_blank" href="<?= file_create_url($weddings->field_file_download_weddings['und'][0]['uri']) ?>" class="enlace enlace-orange"><?= $weddings->field_file_download_weddings['und'][0]['description'] ?></a>
            <?php endif; ?>
        </article>

      </section>
      <?php
      if (!cdi_custom_is_mobile()) {
        ?>
        <section class="col-md-6 col-sm-6 col-xs-12 image <?= $classImg ?>">
          <img src="<?= file_create_url($weddings->field_image_weddings['und'][0]['uri']); ?>" alt="<?= $weddings->field_image_weddings['und'][0]['alt'] ?>" title="<?= $weddings->field_image_weddings['und'][0]['title'] ?>" class="img-responsive">
        </section>
        <?php

      }
      ?>
    </article>
  </section>
<?php endforeach; ?>

<?php if ($footer) : ?>
  <div class="view-footer">
    <?php print $footer; ?>
  </div>
<?php endif; ?>
