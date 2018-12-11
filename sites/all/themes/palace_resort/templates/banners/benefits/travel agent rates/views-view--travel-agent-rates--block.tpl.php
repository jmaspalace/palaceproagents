<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
$datos = array();
if (!empty($view->result[0]->_field_data["nid"]["entity"]))
{
  $datos = $view->result[0]->_field_data["nid"]["entity"];
}
?>
<section class='block-ta-rates container-fluid'>
    <img src="<?= base_path(). path_to_theme() ?>/images/bg-tabs-rates.jpg" alt="" class="img-bg">
    <article class="container">
        <h2 class="line center">
            <span><?= $datos->field_title_ta_rates['und'][0]['value']; ?></span>
          <?php if (isset($datos->field_subtitle_ta_rates['und'][0]['value']) && $datos->field_subtitle_ta_rates['und'][0]['value'] !== ''): ?>
            <?= $datos->field_subtitle_ta_rates['und'][0]['value']; ?>
          <?php endif; ?>
        </h2>
        <div class="text-center"><?= $datos->field_introduction_text_ta_rates['und'][0]['value']; ?></div>
    </article>
    <article class="container">
      <?php $node = node_load($datos->nid); ?>
      <?php $rates = field_get_items('node', $node, 'field_ta_rates'); ?>
        <div class="rates-table">
            <table>
                <thead>
                <tr>
                    <td></td>
                    <td></td>
                    <td><?php print t('DATES') ?></td>
                    <td><?php print t('SGL') ?></td>
                    <td><?php print t('DBL,TPL,QUAD') ?></td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($rates AS $key => $rate): ?>
                  <?php $rate = field_collection_item_load($rate['value']); ?>
                    <tr>
                        <td><img src="<?= file_create_url($rate->field_hotel_image_ta['und'][0]['uri']) ?>" /></td>
                        <td><?= $rate->field_hotel_name_ta_rates['und'][0]['value']; ?></td>
                        <td><?= $rate->field_dates_ta_rates['und'][0]['value']; ?></td>
                        <td><?= $rate->field_sgl_ta_rates['und'][0]['value']; ?></td>
                        <td><?= $rate->field_dbl_tpl_quad_ta_rates['und'][0]['value']; ?></td>
                        <td><?= $rate->field_children_ta_rates['und'][0]['value']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </article>
    <article class="container text-center">
      <h2 class="line center"><a href=/sites/default/files/DayPassRate_FINAL_2019">View Travel Agent Day Pass Rates for 2019</a></h2>
    </article>
    <article class="container list-rates">
        <div class="inludes-left">
            <h2>
                <span><?php print t('PALACE RESORTS') ?></span><br />
              <?php print t('STAY INCLUDES') ?>:
            </h2>
            <ul>
              <?php foreach ($datos->field_includes_palace_resorts_ta['und'] AS $key => $includes_resort): ?>
                  <li><?= $includes_resort['value']; ?></li>
              <?php endforeach; ?>
            </ul>
        </div>
        <div class="inludes-right">
            <h2>
                <span><?php print t('LE BLANC SPA RESORT') ?></span><br />
              <?php print t('STAY INCLUDES') ?>:
            </h2>
            <ul>
              <?php foreach ($datos->field_includes_spa_resort_ta['und'] AS $key => $includes_spa): ?>
                  <li><?= $includes_spa['value']; ?></li>
              <?php endforeach; ?>
            </ul>
        </div>
    </article>
</section>
<section class="block-ta-rates-final container-fluid">
    <article class="container">
      <?= $datos->field_final_text_ta_rates['und'][0]['value']; ?>
    </article>
</section>