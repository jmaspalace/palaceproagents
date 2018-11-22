<?php
?>
<section class='bloque-tabs block-weddings container-fluid'>
    <?php if (!cdi_custom_is_mobile()): ?>
      <?php
      $view = views_get_view('weddings');
      $view->set_display("block");
      $view->pre_execute();
      $view->execute();
      print $view->render();
      ?>
    <?php endif; ?>
    <?php
    $vocabulary = taxonomy_vocabulary_machine_name_load('weddings_categories');
    $terms = taxonomy_get_tree($vocabulary->vid);
    $terms_market = array();
    ?>
    <header>
        <ul>
            <?php foreach ($terms AS $key => $term): ?>
                <?php
                $term = taxonomy_term_load($term->tid);
                $markets = _cdi_custom_get_market_taxonomy($term->field_regions_markets['und']);
                ?>
                <?php if (!cdi_custom_validate_market($markets)): ?>
                    <?php $terms_market[] = $term->tid; ?>
                    <?php $class = $key == 0 ? 'active' : ''; ?>
                    <li class='<?= $class ?>' data-media='tab<?= ($key+1) ?>'><?= $term->name ?></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
        <div class="sombra">
            <span class="triangulo-sombra"></span>
        </div>
    </header>
    <div class="container-tabs">
        <?php foreach ($terms AS $key => $term): ?>
            <?php if (in_array($term->tid, $terms_market)): ?>
                <?php $class = $key == 0 ? 'active' : ''; ?>
                <div class="tab<?= ($key+1); ?> <?= $class; ?>">
                    <?php
                    $view = views_get_view('weddings');
                    $view->set_display("block_1");
                    $view->set_arguments(array($term->tid));
                    // change the amount of items to show
                    $view->pre_execute();
                    $view->execute();
                    print $view->render();
                    ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>