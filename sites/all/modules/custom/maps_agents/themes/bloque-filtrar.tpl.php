<?php
	drupal_add_js('http://j.maxmind.com/app/geoip.js', 'external');
	drupal_add_js('http://maps.google.com/maps/api/js?sensor=false', 'external');
	
	drupal_add_js(drupal_get_path('module', 'maps_agents') . '/js/searchGeolocation.js', array('scope' => 'footer'));
?>
<div id="travel_box">
	<div class="wrapper_travel_box">
		<form id="frm-search" method="POST" enctype="multipart/form-data" action="<?php print url('maps_agents'); ?>">
			<div class="text_travel_box">Find a travel agent near you. Please select you state: </div>
			<div class="campo_travel_box">
				<select name="maps_state" id="maps_state" >
					<option value="0">-- Select State --</option>
		           <?php foreach ($taxonomy AS $data) { 
		           	$state=explode('/', $data->name);
		           	?>
		           	<option value="<?php echo $state[0]; ?>" <?php (isset($_POST['maps_state']) && $_POST['maps_state']==$state[0]) ? print "selected" : print ""; ?>><?php echo $state[1]; ?></option>
		            <?php } ?>
		         </select>
	         </div>
		</form>
	</div>
</div>