<?php
?>
<section class='bloque-tabs container-fluid'>
    <?php
    $vocabulary = taxonomy_vocabulary_machine_name_load('resorts');
    $terms = taxonomy_get_tree($vocabulary->vid);
    ?>
    <header>
        <ul>
            <?php foreach ($terms AS $key => $term): ?>
                <?php $class = $key == 0 ? 'active' : ''; ?>
                <li class='<?= $class ?> <?= strtolower(str_replace(' ', '', $term->name)) ?>' data-media='tab<?= ($key+1) ?>'><?= $term->name ?></li>
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
                $view = views_get_view('resorts');
                $view->set_display("block");
                $view->set_arguments(array($term->tid));
                // change the amount of items to show
                $view->pre_execute();
                $view->execute();
                print $view->render();
                ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<?php
drupal_add_js('$(document).ready(function (e) {
      var hash = window.location.hash;
      if (hash.search(\'#\') !== -1)
      {
        hash = hash.split(\'#\')[1];
        if (hash.indexOf("?") !== -1)
        {
            hash = hash.split("?")[0];
        }
        $(\'.\'+hash).trigger(\'click\');
      }
      $(\'.anchor-resort\').on(\'click\', function (e) {
        var href = $(this).attr(\'href\');
        if (href.search(\'#\') !== -1)
        {
          var hash = href.split(\'#\')[1];
          if (hash.indexOf("?") !== -1)
          {
            hash = hash.split("?")[0];
          }
          $(\'.\'+hash).trigger(\'click\');
          $(\'html,body\').animate({scrollTop: ($(".bloque-tabs").offset().top)-300 }, \'slow\');
        }
      })
    });', array('group' => JS_THEME, 'type' => 'inline', 'weight' => 26));
?>