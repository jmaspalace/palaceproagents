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
  <h2 class="line center"><span><?php print t('GENERAL') ?></span> <?php print t('FAQs') ?></h2>
  <?php foreach ($datos AS $key => $dato): ?>
    <?php $faq = $dato->_field_data["nid"]["entity"]; ?>
    <article class="faq">
      <h3><?= $faq->field_question_faq['und'][0]['value']; ?></h3>
      <?= $faq->field_answer_faq['und'][0]['value']; ?>
    </article>
  <?php endforeach; ?>
</section>
