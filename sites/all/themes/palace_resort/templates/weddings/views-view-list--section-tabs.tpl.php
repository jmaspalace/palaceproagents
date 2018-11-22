<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 *
 * @ingroup views_templates
 */
?>
<header>
  <?php print $list_type_prefix; ?>
    <?php $count = 0; ?>
    <?php foreach ($rows as $id => $row) : ?>
      <?php $active = $id == 0 ? 'active' : ''; ?>
      <li class="<?php print $classes_array[$id] . ' ' . $active; ?>" data-media="tab<?php print($count + 1); ?>">
        <?php print $row; ?>
      </li>
      <?php $count++; ?>
    <?php endforeach; ?>
  <?php print $list_type_suffix; ?>
  <div class="sombra">
    <span class="triangulo-sombra"></span>
  </div>
</header>
<div class="container-tabs">

  <?php foreach ($view->style_plugin->rendered_fields as $id => $row) : ?>
  <?php $class = ($id == 0) ? 'active' : ''; ?>
    <div class="tab<?php print($id + 1) . ' ' . $class; ?>">
  <?php
  $view_tab = views_embed_view('weddings', 'block_1', $row['tid']);
  print $view_tab;

  $view_tab = views_embed_view('ready_sell_stay', 'default', $row['tid']);
  print $view_tab;
  ?>
  </div>
  <?php endforeach; ?>
</div>
