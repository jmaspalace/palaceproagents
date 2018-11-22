<?php
global $base_url;
global $base_path;
//$node_conf = node_load(345);
?>
<?php if(!empty($content['header'])):?>
    <header class ="header">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <a href="/"><img src="<?php #print file_create_url($node_conf->field_imagen_logo_conf["und"][0]["uri"])?>" class="img-responsive logo-palace" alt="<?php #print $node_conf->field_imagen_logo_conf["und"][0]["alt"]?>" title="<?php #print $node_conf->field_imagen_logo_conf["und"][0]["title"]?>"></a>
                </div>
                <?php print $content['header']; ?>
            </div>
        </div>
    </header>
<?php endif;?>
<?php if(!empty($content['content'])):?>
  <script src="https://cdn.getlocalmeasure.com/embed/widgets.js" data-cfasync="false"></script>
    <?php print $content['content']; ?>
<?php endif;?>
<?php if(!empty($content['footer'])):?>
  <footer class ="container-fluid">
    <?php print $content['footer']; ?>
  </footer>
<?php endif;?>

