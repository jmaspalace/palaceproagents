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
<section class='block-faqs container-fluid'>
  <?php if (cdi_custom_is_mobile()): ?>
    <img src="<?= base_path(). path_to_theme() ?>/images/bg_faqsedge_mobille.jpg" alt="faqs" title="faqs" class="img-bg">
  <?php else: ?>
    <img src="<?= base_path(). path_to_theme() ?>/images/bg_faqsedge.jpg" alt="faqs" title="faqs" class="img-bg">
  <?php endif; ?>
  <h2 class="line center"><span><?php print t('PALACE EDGE') ?></span> <?php print t('FAQs') ?></h2>
  <?php foreach ($datos AS $key => $dato): ?>
    <?php $faq = $dato->_field_data["nid"]["entity"]; ?>
    <article class="faq">
      <h3><?= $faq->field_question_faq['und'][0]['value']; ?></h3>
      <?= $faq->field_answer_faq['und'][0]['value']; ?>
    </article>
  <?php endforeach; ?>
</section>
