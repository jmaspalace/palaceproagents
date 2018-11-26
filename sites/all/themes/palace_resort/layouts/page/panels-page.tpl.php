<?php if(!empty($content['header'])):?>
  <?php $path = url('', array('absolute' => TRUE)); ?>
  <?php if (strpos($path, '//dev-') === FALSE && strpos($path, '//pre-') === FALSE &&
    strpos($path, '//linux-') === FALSE && strpos($path, '//localhost') === FALSE): ?>
        <!-- Google Tag Manager -->
        <!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
              new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
              j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
              'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
          })(window,document,'script','dataLayer','GTM-ML6VRM');</script> -->
        <!-- End Google Tag Manager -->
        <!-- <script type="text/javascript" src="//nexus.ensighten.com/palaceresorts/ProAgents/Bootstrap.js"></script> -->
    <?php else: ?>
        <?php //Se implementa un GTM falso para evitar errores de JS ?>
        <!-- Google Tag Manager -->
        <!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-ML6VRMXXXX');</script> -->
        <!-- End Google Tag Manager -->
  <?php endif; ?>
    <header class='header'>

      <div class="row">
        <div class="col-md-12 text-center">
    <?php
      /*$full_name = $_SESSION['full_name'];
          if ($user->uid) {
             //print '<p><strong>Welcome '.$user->name.'.</strong></p>';
             }*/
      ?>
    </div>
    </div>

      <?php print $content['header']; ?>
    </header>
<?php endif;?>
<?php if(!empty($content['content'])):?>
  <?php print $content['content']; ?>
<?php endif;?>
<?php if(!empty($content['footer'])):?>
    <footer class ="container-fluid">
      <?php print $content['footer']; ?>
    </footer>
<?php endif;?>


