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
<section class='block-tools container-fluid'>
    <?php foreach ($datos AS $key => $dato): ?>
      <?php $tool = $dato->_field_data['nid']['entity']; ?>
      <?php if ($tool->field_category_rt['und'][0]['tid'] == 82 && $key == 0): //se valida si la categoria es CO-BRANDED MARKETING para agregar un texto de descripcion ?>
            <p><?php print t('When you’re a PRO Specialist Agent, you’re on a winning team. Every step of the way we empower you to perform your best so you can please your clients and enjoy the posh perks of being a PRO Specialist Agent. We offer marketing materials that you can effortlessly customize and personalize for your business needs, including e-blast templates, PRO-branded collateral and pull-up visual displays. We also empower you with a dedicated sales support team to help brand your agency, help you connect with a variety of demographics and focus your sales strategies.') ?></p>
            <p><?php print t('Marketing materials you can effortlessly customize and personalize to your business needs, including e-blast templates, branded collateral, pull-up visual displays, and much more'); ?></p>
      <?php endif; ?>
        <article class="block-archive">
            <section class="content">
                <img class="logo" src="<?= file_create_url($tool->field_image_rt['und'][0]['uri']) ?>" alt="<?= $tool->field_image_rt['und'][0]['alt'] ?>" title="<?= $tool->field_image_rt['und'][0]['title']; ?>" />
                <h2>
                  <?php if (isset($tool->field_subtitle_rt['und'][0]['value']) && $tool->field_subtitle_rt['und'][0]['value'] != ''): ?>
                      <span class="description"><?= $tool->field_subtitle_rt['und'][0]['value']; ?></span>
                  <?php endif; ?>
                  <?= $tool->field_title_rt['und'][0]['value']; ?>
                </h2>
                <?php if (isset($tool->field_pdf_rt['und'][0]['uri']) && $tool->field_pdf_rt['und'][0]['uri'] !== ''): ?>
                    <div class="actions">
                        <a target="_blank" href="<?= file_create_url($tool->field_pdf_rt['und'][0]['uri']); ?>" class="enlace downlad"><?= $tool->field_pdf_rt['und'][0]['description']; ?></a>
                    </div>
                <?php endif; ?>
            </section>
        </article>
    <?php endforeach; ?>
</section>
