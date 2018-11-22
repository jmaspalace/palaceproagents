<?php
global $base_url;
drupal_add_js(drupal_get_path('module', 'maps_agents') . '/js/jquery-jvectormap-1.2.2.min.js', array('group' => JS_THEME, 'weight' => 20));
$market = cdi_custom_get_market_by_language();
if ($market == 'LATAM')
{
  drupal_add_js(drupal_get_path('module', 'maps_agents') . '/js/jquery-jvectormap-america-mill.js', array('group' => JS_THEME, 'weight' => 21));
}
elseif ($market == 'CA')
{
  drupal_add_js(drupal_get_path('module', 'maps_agents') . '/js/jquery-jvectormap-ca-lcc.js', array('group' => JS_THEME, 'weight' => 21));
}
else
{
  drupal_add_js(drupal_get_path('module', 'maps_agents') . '/js/jquery-jvectormap-us-aea-en.js', array('group' => JS_THEME, 'weight' => 21));
}

drupal_add_js(drupal_get_path('module', 'maps_agents') . '/js/easySlider1.7.js', array('group' => JS_THEME, 'weight' => 22));
drupal_add_js(drupal_get_path('module', 'maps_agents') . '/js/slider.js', array('group' => JS_THEME, 'weight' => 23));

//drupal_add_js('http://j.maxmind.com/app/geoip.js', 'external');
/*
drupal_add_js('https://maps.googleapis.com/maps/api/js?key=AIzaSyAqab0hlxRjI-GdD4pEqy00cmQW2B-rTEo', array('group' => JS_THEME, 'type' => 'external', 'weight' => 24));

drupal_add_js(drupal_get_path('module', 'maps_agents') . '/js/searchGeolocation.js', array('group' => JS_THEME, 'weight' => 25));
*/
?>
<div id="box-content">
    <div class="page">
        <div id="cl-left">
            <div id="bdms" class="panel-1">
                <div id="mapa" class="<?= $market == 'LATAM' ? 'maps-latam':''; ?>"></div>
                <?php if(isset($data) && count($data) > 0): ?>
                  <?php foreach ($data AS $info): ?>
                    <?php foreach ($info as $key => $agent): ?>
                        <div id="target" class="agents <?php echo $key; ?>" >
                            <div class="slider">
                                <ul>
                                    <li>
                                        <div class="agent-content">
                                            <img class="img-agent" src="<?php print file_create_url($agent->maps_agents_image["und"][0]['uri']); ?>" width="82" height="114" />
                                            <div class="txt-agents">
                                                <h3><?php print $agent->maps_agents_name['und'][0]['value'] ?></h3>
                                                <span><?php if( isset($agent->maps_agents_profession['und'][0]['value'])) { print $agent->maps_agents_profession['und'][0]['value']; } ?></span>
                                                <p class="green email-mapa">
                                                	<label>Email:</label>
                                                	 <?php if( isset($agent->maps_agents_email['und'][0]['value'])){print $agent->maps_agents_email['und'][0]['value'];} ?>
                                                </p>
                                                <p class="green"><label>Phone:</label><?php if( isset($agent->maps_agents_phone['und'][0]['value'])) {print $agent->maps_agents_phone['und'][0]['value']; } ?></p>
                                                <?php if ($market == 'LATAM'): ?>
													<?php
                                                        $states_string = "";
                                                        foreach ($agent->field_states_of_agents_latam['und'] AS $states)
                                                        {
                                                            $partes = explode("/", taxonomy_term_load($states['tid'])->name);
															$states_string .= $partes[1].", ";
														}
														if(strlen($states_string)>1)
															$states_string = substr($states_string, 0, strlen($states_string)-2).".";
                                                    ?>
                                                    <p class="mt5"><?php echo $states_string; ?></p>
                                                <?php elseif ($market == 'CA'): ?>
													<?php
										    			$states_string = "";
                                                        foreach ($agent->field_states_of_agents['und'] AS $states)
                                                        {
                                                            $partes = explode("/", taxonomy_term_load($states['tid'])->name);
															$states_string .= $partes[1].", ";
                                                        }
                                                        if(strlen($states_string)>1)
															$states_string = substr($states_string, 0, strlen($states_string)-2).".";
													?>
                                                    <p class="mt5"><?php echo $states_string; ?></p>
                                                <?php else: ?>
													<?php
    													$states_string = "";
                                                        foreach ($agent->maps_agents_states['und'] AS $states)
                                                        {
                                                            $partes = explode("/", taxonomy_term_load($states['tid'])->name);
															$states_string .= $partes[1].", ";
                                                        }
                                                        if(strlen($states_string)>1)
															$states_string = substr($states_string, 0, strlen($states_string)-2).".";
                                                    ?>
                                                    <p class="mt5"><?php echo $states_string; ?></p>
                                                <?php endif; ?>
                                                <p class="mt5"><?php if( isset($agent->maps_agents_add_information['und'][0]['value'])) {print $agent->maps_agents_add_information['und'][0]['value'];} ?></p>
                                            </div><!--cierro txt-agents-->
                                        </div> <!--cierro agent-content-->
                                    </li>
								</ul>
                            </div>
                        </div> <!--cierro agents-->
                    <?php endforeach; ?>
                <?php endforeach; ?>
                	<p><?php print t('Click on the below map to find the Business Development Manager in your area'); ?></p>
				<?php else: ?>
					<p><?php print t('Assign agents information for the states'); ?></p>
				<?php endif; ?>
                <div class="controls">
                    <div class="slideprev"><img src="<?php echo $base_url . '/' . drupal_get_path('module', 'maps_agents'); ?>/css/images/arrowverdelef.png" alt=""></div>
                    <div class="slidenext"><img src="<?php echo $base_url . '/' . drupal_get_path('module', 'maps_agents'); ?>/css/images/arrowverderigt.png" alt=""></div>
                </div>
            </div><!--cierro panel-1-->
        </div>
    </div>
</div>
