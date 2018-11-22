<?php if (!empty($content['header'])) : ?>
  <header class='header'>
    <?php print $content['header']; ?>
  </header>
<?php endif; ?>
<?php if (!empty($content['top'])) : ?>
  <?php print $content['top']; ?>
<?php endif; ?>
<?php if (!empty($content['content'])) : ?>
  <section class='bloque-tabs block-weddings container-fluid'>
    <?php print $content['content']; ?>
  </section>
<?php endif; ?>
<?php if (!empty($content['bottom'])) : ?>
  <?php print $content['bottom']; ?>
<?php endif; ?>
<?php if (!empty($content['footer'])) : ?>
  <footer class ="container-fluid">
    <?php print $content['footer']; ?>
  </footer>
<?php endif; ?>


