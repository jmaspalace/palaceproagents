<?php if (cdi_custom_get_market_by_language() !== 'LATAM'): ?>
<section class='container-fluid header-footer'>
  <div class='container'>
    <div class='newsletter'>
      <p><?php print t('Subscribe to our Newsletter') ?></p>
      <?php print $formulario ?>
    </div>
  </div>
</section>
<?php endif; ?>
<section class='container-fluid body-footer'>
  <div class='container'>
    <div class='row'>
      <div class='col-md-3 col-sm-12 col-xs-12'>
        <img src='<?= file_create_url($footer->field_imagen_logo_fo['und'][0]['uri']) ?>'  title='<?= $footer->field_imagen_logo_fo['und'][0]['title'] ?>' alt='<?= $footer->field_imagen_logo_fo['und'][0]['alt'] ?>' class='logo-footer'>
        <ul class='social'>
          <?php foreach ($footer->field_icons_social_networks_fo['und'] as $item_social): ?>
            <li>
                <a href='<?= $item_social['image_field_caption']['value'] ?>'>
                    <img src='<?= file_create_url($item_social['uri']) ?>' title="<?= $item_social['title'] ?>" alt="<?= $item_social['alt'] ?>" />
                </a>
            </li>
          <?php endforeach; ?>
        </ul>
        <p><?= $footer->field_telephone_fo['und'][0]['value'] ?></p>
      </div>
      <div class="col-md-9 col-sm-12 col-xs-12 footer-col-9" style="padding:0;">
      	<div class="col-md-3 col-sm-3 col-xs-12">
			<h5><?= $footer->field_title_list_1_fo['und'][0]['value'] ?></h5>
			<ul>
			  <?php foreach ($footer->field_list_1_fo['und'] as $item_list1): ?>
				<?php $target = '_blank'; ?>
				<?php if (isset($item_list1['attributes']['target']) && $item_list1['attributes']['target'] === 0):  ?>
				  <?php $target = '_self'; ?>
				<?php endif; ?>
				<li><a target='<?= $target ?>' href='<?= _cdi_custom_get_url($item_list1['url']) ?>'><?= $item_list1['title'] ?></a></li>
			  <?php endforeach; ?>
			</ul>
		  </div>

    	  <div class='col-md-3 col-sm-3 col-xs-12'>
        <h5><?= $footer->field_title_list_2_fo['und'][0]['value'] ?></h5>
        <ul>
          <?php foreach ($footer->field_list_2_fo['und'] as $item_list2): ?>
            <?php $target = '_blank'; ?>
            <?php if (isset($item_list2['attributes']['target']) && $item_list2['attributes']['target'] === 0): ?>
              <?php $target = '_self'; ?>
            <?php endif; ?>
            <li><a target='<?= $target ?>' href='<?= _cdi_custom_get_url($item_list2['url']) ?>'><?= $item_list2['title'] ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class='col-md-6 col-sm-2 col-xs-12 resorts'>
        <h5><?= $footer->field_title_list_3_fo['und'][0]['value'] ?></h5>
        <ul>
          <?php foreach ($footer->field_list_3_fo['und'] as $item_list3): ?>
            <?php $target = '_blank';  ?>
            <?php if (isset($item_list3['attributes']['target']) && $item_list3['attributes']['target'] === 0): ?>
              <?php $target = '_self'; ?>
            <?php endif; ?>
            <li><a target='<?= $target ?>' href='<?= _cdi_custom_get_url($item_list3['url']) ?>'><?= $item_list3['title'] ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class='col-md-3 col-sm-2 col-xs-12'>
            <h5><?php print t('Privacy Policy') ?></h5>
            <ul>
                <li><a target='_blank' href='<?php print t('https://www.palaceresorts.com/en/privacy-users') ?>'><?php print t('Privacy Users') ?></a></li>
                <li><a target='_blank' href='<?php print t('https://www.palaceresorts.com/en/privacy-vigilancy') ?>'><?php print t('Video Surveillance') ?></a></li>
                <li><a target='_blank' href='<?php print t('https://www.palaceresorts.com/en/vehicle-lessees') ?>'><?php print t('Vehicle Lessees') ?></a></li>
                <li><a target='_blank' href='<?php print t('https://www.palaceresorts.com/en/other-privacy-notice') ?>'><?php print t('Other privacy notice') ?></a></li>
            </ul>
        </div>
      <div class='col-md-3 col-sm-2 col-xs-12'>
            <h5><?= $footer->field_title_list_4_fo['und'][0]['value'] ?></h5>
            <ul>
                <?php foreach ($footer->field_list_4_fo['und'] as $item_list4): ?>
                    <?php $target = '_blank';  ?>
                    <?php if (isset($item_list4['attributes']['target']) && $item_list4['attributes']['target'] === 0): ?>
                        <?php $target = '_self'; ?>
                    <?php endif; ?>
                    <li><a target='<?= $target ?>' href='<?= _cdi_custom_get_url($item_list4['url']) ?>'><?= $item_list4['title'] ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

      </div>


    </div>
    <div class='list-awards'>
      <h4><?php print t('OUR AWARDS') ?></h4>
      <ul>
        <?php foreach ($footer->field_imagens_footer_fo['und'] as $item_image_footer): ?>
          <li><img src='<?= file_create_url($item_image_footer['uri']) ?>' title="<?= $item_image_footer['title'] ?>" alt="<?= $item_image_footer['alt'] ?>" /></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</section>
