<?php
?>
<section class='bloque-tabs container-fluid'>
    <?php
    $vocabulary = taxonomy_vocabulary_machine_name_load('category_contacts_us');
    $terms = taxonomy_get_tree($vocabulary->vid);
    $terms_market = array();
    ?>
    <header>
        <ul>
            <?php $isActive = FALSE; ?>
            <?php foreach ($terms AS $key => $term): ?>
                <?php
                $term = taxonomy_term_load($term->tid);
                $markets = _cdi_custom_get_market_taxonomy($term->field_regions_markets['und']);
                ?>
                <?php if (!cdi_custom_validate_market($markets)): ?>
                    <?php $terms_market[] = $term->tid; ?>
                    <?php $class = !$isActive ? 'active' : ''; ?>
                    <?php $anchor = (isset($term->field_anchors['und'][0]['value']) && $term->field_anchors['und'][0]['value'] !== '') ? $term->field_anchors['und'][0]['value'] : '' ?>
                    <li class='<?= $class ?> <?= $anchor ?>' data-media='tab<?= ($key+1) ?>'><?= $term->name ?></li>
                    <?php $isActive = TRUE; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
        <div class="sombra">
            <span class="triangulo-sombra"></span>
        </div>
    </header>
    <div class="container-tabs">
      <?php $isActive = FALSE; ?>
      <?php foreach ($terms AS $key => $term): ?>
        <?php if (in_array($term->tid, $terms_market)): ?>
          <?php $class = !$isActive ? 'active' : ''; ?>
          <div class="tab<?= ($key+1); ?> <?= $class; ?>">
            <?php $isActive = TRUE; ?>
            <?php
            $termId = $term->tid;
            $view = views_get_view('inside_sales_contact');
            switch ($termId)
            {
              //Categorias de your direct booking team
              case 22:
              case 105:
                  $view->set_display("block");
                  $view->pre_execute();
                  $view->execute();
                  print $view->render();
                  break;
              //CAtegorias de Inside Sales Team
              case 23:
              case 106:
              case 107:
                  $view->set_display("block_1");
                  $view->pre_execute();
                  $view->execute();
                  print $view->render();

                  $view = views_get_view('inside_sales_contact');
                  $view->set_display("block_2");
                  $view->pre_execute();
                  $view->execute();
                  print $view->render();
                  break;
              // Categorias de BDMS
              case 24:
              case 108:
              case 109:
                  $block = module_invoke('maps_agents', 'block_view', 'maps_agents_custom_maps');
                  print render($block['content']);
                  break;
              //Categorias de Website Suppor y de International Agents
              case 25:
              case 110:
              case 111:
              case 155:
              case 156:
              case 157:
                  $view = views_get_view('inside_sales_contact');
                  $view->set_display("block_3");
                  $view->set_arguments(array($termId));
                  $view->pre_execute();
                  $view->execute();
                  print $view->render();
                  break;
            }
            ?>
          </div>
        <?php endif; ?>
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
      $(\'.anchor-contact\').on(\'click\', function (e) {
        var href = $(this).attr(\'href\');
        if (href.search(\'#\') !== -1)
        {
          var hash = href.split(\'#\')[1];
          if (hash.indexOf("?") !== -1)
          {
            hash = hash.split("?")[0];
          }
          $(\'html,body\').animate({scrollTop: ($(".bloque-tabs").offset().top)-300 }, \'slow\', function(){
            $(\'.\'+hash).trigger(\'click\');            
          });
        }
      })
    });', array('group' => JS_THEME, 'type' => 'inline', 'weight' => 26));
?>