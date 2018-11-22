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
  $datos = $view->result;
}
?>
<section class='block-directory container-fluid'>
    <?php if (!cdi_custom_is_mobile()): ?>
        <img src="<?= base_path(). path_to_theme() ?>/images/bg_directory.jpg" alt="directory" class="bg_img">
    <?php endif; ?>
    <h2 class="line center"><span><?php print t('Travel Agent'); ?> </span><?php print t('Sales Support'); ?></h2>
    <article class="cards-directory">
      <?php foreach ($datos as $key => $dato): ?>
        <?php $inside = $dato->_field_data["nid"]["entity"]; ?>
          <article class="card">
              <div class="info">
                  <h3><?= $inside->field_title_inside_sales_info['und'][0]['value']; ?></h3>
                  <p>
                    <?php if (isset($inside->field_txt_mail_inside_sales_info['und'][0]['value']) && $inside->field_txt_mail_inside_sales_info['und'][0]['value'] != ''): ?>
                      <?= $inside->field_txt_mail_inside_sales_info['und'][0]['value']; ?> <a href="mailto:<?= $inside->field_email_inside_sales_info['und'][0]['value']; ?>"><?= $inside->field_email_inside_sales_info['und'][0]['value']; ?></a>
                    <?php endif; ?>

                    <?php if (isset($inside->field_txtphone_inside_sales_info['und'][0]['value']) && $inside->field_txtphone_inside_sales_info['und'][0]['value'] != ''): ?>
                      <?= $inside->field_txtphone_inside_sales_info['und'][0]['value'] ?> <a href="tel:<?= $inside->field_phone_inisde_sales_info['und'][0]['value'] ?>"><?= $inside->field_phone_inisde_sales_info['und'][0]['value'] ?></a>
                    <?php endif; ?>
                  </p>
              </div>
          </article>
      <?php endforeach; ?>
    </article>
</section>
