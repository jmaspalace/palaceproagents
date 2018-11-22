<?php
?>
<section class='bloque-tabs container-fluid'>
    <?php
    $vocabulary = taxonomy_vocabulary_machine_name_load('category_tools');
    $terms = taxonomy_get_tree($vocabulary->vid);
    ?>
    <header>
        <ul>
            <?php foreach ($terms AS $key => $term): ?>
                <?php $class = $key == 0 ? 'active' : ''; ?>
                <li class='<?= $class ?>' data-media='tab<?= ($key+1) ?>'><?= $term->name ?></li>
            <?php endforeach; ?>
        </ul>
        <div class="sombra">
            <span class="triangulo-sombra"></span>
        </div>
    </header>
    <div class="container-tabs">
      <?php foreach ($terms AS $key => $term): ?>
        <?php $class = $key == 0 ? 'active' : ''; ?>
          <div class="tab<?= ($key+1); ?> <?= $class; ?>">
            <?php
            if ($term->tid != 86 && $term->tid != 168 && $term->tid != 169) //si la categoria es videos
            {
              $view = views_get_view('resources_tools');
              $view->set_display("block");
              $view->set_arguments(array($term->tid));
              // change the amount of items to show
              $view->pre_execute();
              $view->execute();
              print $view->render();
            }
            else
            {
              $view = views_get_view('resources_tools');
              $view->set_display("block_1");
              $view->pre_execute();
              $view->execute();
              print $view->render();
            }
            ?>
          </div>
      <?php endforeach; ?>
    </div>
</section>