<?php
global $language;
$lang_name = $language->language;
?>
<section class="section-page-404">
	<div class="content-text">
		<p><?php echo t('This site is unavailable');?>.</p>
		<?php echo t('<h2> It seems like you’ve wandered away from our active site. </h2> <h2> Let us take you back to the page you were looking for. </h2>');?>
		<a href="/<?php echo $lang_name; ?>"><?php echo t('return to the homepage');?></a>
	</div>
	<img src="<?php print base_path().drupal_get_path('theme', 'palace_resort')."/images/404.jpg"?>" alt="">
</section>
