<div class='container'>
  <div class='row'>
    <div class='col-md-3 col-sm-3 col-xs-6'>
      <a href='<?= _cdi_custom_get_url('<front>') ?>'>
        <img src='<?= file_create_url($header->field_imagen_logo_he['und'][0]['uri']) ?>' class='img-responsive logo-palace' title="<?= $header->field_imagen_logo_he['und'][0]['title'] ?>" alt="<?= $header->field_imagen_logo_he['und'][0]['alt'] ?>">
      </a>
    </div>
    <div class='col-md-9 col-sm-9 col-xs-6 content-menu'>


      <div class='menu-superior ok'>
        <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#main-menu' aria-expanded='false'>
          <span></span><span></span><span></span>
        </button>
        <?php if (user_is_logged_in()): ?>
          <ul class='acces'>

            <li>
              <a href="<?= _cdi_custom_get_url('user/logout') ?>"><?php print t('Log out') ?></a>
            </li>
          </ul>
          <?php else: ?>
            <ul class='acces'>
              <li tabindex="0" class="onclick-menu active">
                <a class="drop-register" href="<?= _cdi_custom_get_url($header->field_buttom_register_he['und'][0]['url']) ?>"><?= $header->field_buttom_register_he['und'][0]['title']; ?></a>
              </li>
              <li>
                <a href="#" id="logear"><?= $header->field_buttom_login_he['und'][0]['title'] ?></a>
              </li>
            </ul>
            <div id="login">
              <div id="box-login">
                <img src="<?= $url_base ?>/images/btn_close_menu.jpg" class="cerrar_menu" title="cerrar" alt="cerrar" />
                <form class="form-login" accept-charset="UTF-8" id="user-login" method="post" action="<?= _cdi_custom_get_url('user/login') ?>">
                  <div class="filas">
                    <input class="txt" id="edit-name" name="name" value="" type="text" placeholder="<?php print t('Username (email)') ?>" />
                  </div>
                  <div class="filas">
                    <input class="txt" id="edit-pass" name="pass" type="password" placeholder="<?php print t('Password') ?>" />
                  </div>
                  <div class="filas">
                    <input type="hidden" name="form_build_id" value="form-05cf0WwuBHSpi2ce-az4vE-rREpDGatr0XRrSbtRN1E" />
                    <input type="hidden" name="form_id" value="user_login" />
                    <input class="btones" id="edit-submit" name="op" type="submit" value="<?php print t('Sign In') ?>" />
                    <a class="btones" id="recovery" href="<?= _cdi_custom_get_url('recovery') ?>"><?php print t('Forgot your password?') ?></a>
                  </div>
                </form>
              </div>
            </div>
          <?php endif; ?>
          <div class='search' id='search-desktop'>
            <span class='icon-search' id='icon-search'></span>
            <?php print render($block_search); ?>
          </div>
          <a href='tel:<?= $header->field_telephone_he['und'][0]['value'] ?>' class='telephone'><?= $header->field_telephone_he['und'][0]['value'] ?></a>

        </div>
        <div class="row">
           <div class='col-md-12 col-sm-12 col-xs-12'>
              <?php if (user_is_logged_in()): 
                /*echo "<pre>";
                var_dump($_SESSION['full_data_agent']);
                  echo "</pre>";*/

             $full_name = $_SESSION['full_name'];
             print '<p style="font-size: 1rem; font-family: Miso-Light; margin-left: 25px;">Welcome '.$full_name.'!</p>';
            endif; ?>
           </div>
         </div>
        <nav>


         <ul class='menu navbar-collapse' id='main-menu'>
          <?= _cdi_menu_get_items_menu() ?>
        </ul>
      </nav>
    </div>
  </div>
</div>