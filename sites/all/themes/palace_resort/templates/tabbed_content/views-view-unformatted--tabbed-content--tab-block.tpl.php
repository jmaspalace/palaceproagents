
<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php foreach ($view->style_plugin->rendered_fields as $id => $row) : ?>
  <section class="block-resortspage container-fluid color-section <?php print !empty($classes_array[$id]) ? $classes_array[$id] : ''; ?>">
  <?php
  $classImg = '';
  $classContent = '';
  if ($id % 2 == 0) {
    $classImg = 'right';
    $classContent = 'left';
  } else {
    $classContent = 'right';
    $classImg = 'left';
  }
  ?>
    <article class="block-black">
      <?php if (cdi_custom_is_mobile()) : ?>
        <section class="col-md-6 col-sm-6 col-xs-12 image <?= $classImg ?>">
            <?php print $row['field_image_mobile_weddings']; ?>
        </section>
      <?php endif; ?>
      <section class="col-md-6 col-sm-12 col-xs-12 <?= $classContent ?>">
        <article class="content">
        	<h2 class="line">
			      <span><?php print $row['field_title_weddings']; ?></span>
			      <?php print $row['field_subtitle_weddings']; ?>
          </h2>
        	<?php print $row['field_description_weddings']; ?>
          <?php print $row['field_file_download_weddings']; ?>
        </article>
      </section>
      <?php if (!cdi_custom_is_mobile()) : ?>
        <section class="col-md-6 col-sm-6 col-xs-12 image <?= $classImg ?>">
          <?php print $row['field_image_weddings']; ?>
        </section>
      <?php endif; ?>
    </article>
  </section>
<?php endforeach; ?>
