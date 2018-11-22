<?php
/**
 * @file
 * Bluez theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print
 *   them all, or print a subset such as
 *   render($content['field_example']).
 *   Use hide($content['field_example']) to temporarily suppress the
 *   printing of a given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat
 *   it by calling format_date() with the desired parameters on the
 *   $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $terms: the themed list of taxonomy term links output from
 *   theme_links().
 * - $display_submitted: whether submission information should be
 *   displayed.
 * - $classes: String of classes that can be used to style contextually
 *   through CSS.
 *   It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *    "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to
 *     administrators.
 * - $title_prefix (array): An array containing additional output
 *   populated by modules, intended to be displayed in front of the main
 *   title tag that appears in the template.
 * - $title_suffix (array): An array containing additional output
 *   populated by modules, intended to be displayed after the main title
 *   tag that appears in the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is
 *   flattened into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping
 *   in teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state
 *   (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot
 *   hold the main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a
 * corresponding variable is defined, e.g. $node->body becomes $body.
 * When needing to access a field's raw values, developers/themers are
 * strongly encouraged to use these variables. Otherwise they will have
 * to explicitly specify the desired field language,
 * e.g. $node->body['en'], thus overriding any language negotiation
 * rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 */
/*echo "<pre>";
print_r($node->webform);
echo "</pre>";
die();*/
drupal_add_js(drupal_get_path('module', 'cdi_submit_form') . '/js/send_form.js', array('group' => JS_THEME, 'weight' => 28));
?>
<section class="container-fluid bloque-banner">
  <?php
  $img = $node->field_banner_webform;
  if (cdi_custom_is_mobile())
  {
    $img = $node->field_banner_mobile_webform;
  }
  ?>
    <img src="<?= file_create_url($img['und'][0]['uri']); ?>" title="<?= $img['und'][0]['title'] ?>" alt="<?= $img['und'][0]['alt'] ?>" class="img-responsive"/>
    <section class="content">
        <h1><?= $node->field_title_1_webform['und'][0]['value']; ?></h1>
    </section>
    <div class="gradient"></div>
    <!-- <div class="booking-form"></div> -->
</section>
<?php
$block = module_invoke('cdi_breadcrumb', 'block_view', 'cdi_breadcrumb');
print render($block['content']);
?>
<section class='container-fluid'>
    <div id="ready-selly" class="panel-1 container">
        <div class="box-panel1">
            <div id="tabs-readys" class="tabs-box">
                <form id="form2" action="" method="post" enctype="multipart/form-data">
                    <div class="tabs-title activo">
                        <span class="icon-down"><?php print $node->field_title_1_webform['und'][0]['value'] ?></span>
                    </div><!--cierro tabs-title-->
                    <div class="txt-tabs active">
                        <p><?php print $node->field_introduction_webform['und'][0]['value'] ?></p>
                        <div id="form-user">
                            <div class="parte-1">
                                <div class="cl-left">
                                  <?php for ($i = 1; $i <= 5; $i++): ?>
                                  <div class="filas">
                                      <label class="label-txt"><?php print $node->webform['components'][$i]['name']?></label>
                                      <input name="<?php print $node->webform['components'][$i]['form_key']?>" id="<?php print $node->webform['components'][$i]['form_key']?>" class="input-txt" type="<?php print $node->webform['components'][$i]['type']?>" />
                                  </div>
                                  <?php endfor; ?>
                                  <div class="filas">
                                      <label class="label-txt"><?php print $node->webform['components'][$i]['name']?></label>
                                      <span id="selectd_country" class="select">Select</span>
                                      <select name="d" class="styled" id="<?php print $node->webform['components'][$i]['form_key']?>" >
                                        <?php $partes = explode(";",$node->webform['components'][6]['extra']['items']);?>
                                        <?php foreach ($partes AS $paises){$pais = explode('|', $paises); ?>
                                            <option value="<?php print $pais[1];?>"><?php print $pais[1];?></option>
                                        <?php  }?>
                                      </select>
                                  </div>
                                </div>
                                <div class="cl-right">
                                  <?php for ($i = 7; $i <= 11; $i++): ?>
                                  <div class="filas">
                                      <label class="label-txt"><?php print $node->webform['components'][$i]['name']?></label>
                                      <input name="<?php print $node->webform['components'][$i]['form_key']?>" id="<?php print $node->webform['components'][$i]['form_key']?>" class="input-txt" type="<?php print $node->webform['components'][$i]['type']?>" />
                                  </div>
                                  <?php endfor; ?>
                                  <div class="filas">
                                      <label class="label-txt"><?php print $node->webform['components'][$i]['name']?></label>
                                      <span class="select" id="selectd_preferred" name="<?php print $node->webform['components'][$i]['form_key']?>">Select</span>
                                      <select name="d" class="styled" id="<?php print $node->webform['components'][$i]['form_key']?>">
                                        <?php $partes = explode(";",$node->webform['components'][12]['extra']['items']);?>
                                        <?php foreach ($partes AS $resorts){$resort = explode('|', $resorts); ?>
                                            <option value="<?php print $resort[1];?>"><?php print $resort[1];?></option>
                                        <?php  }?>
                                      </select>
                                  </div>
                                </div>
                            </div>
                            <div class="parte-2">
                                <div class="cl-left">
                                  <?php for ($i = 13; $i <= 18; $i++): ?>
                                    <?php if($i%2!=0): ?>
                                      <div class="filas">
                                          <label class="label-txt"><?php print $node->webform['components'][$i]['name']?></label>
                                          <input name="<?php print $node->webform['components'][$i]['form_key']?>" id="<?php print $node->webform['components'][$i]['form_key']?>" class="<?php echo ($i === 13) ? 'candelar datepicker': 'input-txt'?>" type="text" />
                                      </div>
                                    <?php endif; ?>
                                  <?php endfor; ?>
                                </div>
                                <div class="cl-right">
                                    <?php for ($i = 13; $i <= 18; $i++): ?>
                                        <?php if($i%2==0): ?>
                                        <div class="filas">
                                            <label class="label-txt"><?php print $node->webform['components'][$i]['name']?></label>
                                            <input name="<?php print $node->webform['components'][$i]['form_key']?>" id="<?php print $node->webform['components'][$i]['form_key']?>" class="<?php echo ($i === 14 ) ? 'candelar datepicker': 'input-txt'?>" type="text" />
                                        </div>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </div>
                                <!-- Bedding -->
                                <div class="cl-left">
                                	 <div class="filas">
										<label class="label-txt"><?php print $node->webform['components'][$i]['name']?></label>
										<span class="select" id="select_beddings" name="<?php print $node->webform['components'][$i]['form_key']?>">Select</span>
										<select name="d" class="styled" id="<?php print $node->webform['components'][$i]['form_key']?>">
										  <?php $partesBeddings = explode(";",$node->webform['components'][$i]['extra']['items']);?>
										  <?php foreach ($partesBeddings AS $beddings) {
											$bedding = explode('|', $beddings); ?>
											  <option value="<?php print $bedding[1];?>"><?php print $bedding[1];?></option>
										  <?php  }?>
										</select>
									</div>
                                </div>
                                <!-- Bedding -->
                            </div>
                        </div><!--cierro form-user-->
                    </div><!--cierro txt-tabs-->

                    <div class="tabs-title">
                        <span class="icon-up"><?php print $node->field_title_2_webform["und"][0]['value']?> </span>
                    </div><!--cierro tabs-title-->
                    <div class="txt-tabs" id="webform">
                        <div class="box-cliente" id="box-cliente">
                            <div class="cliente-header">
                                <span class="number-client">1</span> <span><?php print t('Client') ?></span>
                            </div>
                            <div class="cliente-content">
                                <div class="datos-1">
                                  <?php for ($i = 20; $i <= 24; $i++): ?>
                                    <?php if($i === 21 || $i ===22 ): ?>
                                          <div class="filas">
                                              <label class="label-txt"><?php print $node->webform['components'][$i]['name']?></label>
                                              <input name="<?php print $node->webform['components'][$i]['form_key']?>" id="<?php print $node->webform['components'][$i]['form_key']?>" class="candelar datepicker" type="text" />
                                          </div>
                                    <?php elseif($i === 23): ?>
                                          <div class="filas">
                                              <label class="label-txt"><?php print $node->webform['components'][$i]['name']?></label>
                                              <span class="select" id="selectd_resort" name="<?php print $node->webform['components'][$i]['form_key']?>">Select</span>
                                              <select name="d" class="styled" id="<?php print $node->webform['components'][$i]['form_key']?>">
                                                <?php $partes = explode(";",$node->webform['components'][$i]['extra']['items']);?>
                                                <?php foreach ($partes AS $paises): ?>
                                                    <?php $pais = explode('|', $paises); ?>
                                                    <option value="<?php print $pais[1];?>"><?php print $pais[1];?></option>
                                                <?php endforeach; ?>
                                              </select>
                                          </div>
                                    <?php else: ?>
                                          <div class="filas">
                                              <label class="label-txt"><?php print $node->webform['components'][$i]['name']?></label>
                                              <input name="<?php print $node->webform['components'][$i]['form_key']?>" id="<?php print $node->webform['components'][$i]['form_key']?>" class="input-txt" type="text" />
                                          </div>
                                    <?php endif; ?>
                                  <?php endfor; ?>
                                </div>
                                <div class="filas">
                                    <input class="reset enlace enlace-green" name="" type="button" value="<?php print t('Reset') ?>"/>
                                </div>
                            </div>
                        </div>
                        <div id="envio-datos">
                            <input type="hidden" id="numCliente" value="1" />
                            <input type="hidden" id="idForm" value="<?php print $node->webform['nid'] ?>" />
                            <?php
                                $emails="";
                                foreach ( $node->webform['emails'] as $email) {
                                    $emails.=$email['email']."#";
                                }
                            ?>
                            <input type="hidden" id="sendEmail" value="<?php print base64_encode($emails); ?>" />
                            
                            <div class="filas type-checkbox">
                                        <label class="label-txt"><?php print $node->webform['components'][25]['extra']['description']?></label>
                                        <input name="<?php print $node->webform['components'][25]['form_key']?>" id="<?php print $node->webform['components'][25]['form_key']?>" class="input-txt" type="checkbox" required="required"/>
                                    </div>
                            
                            <div class="filas">
                                <input
                                        class="more-cl enlace enlace-green" name="" type="button" value="<?php print t('ADD MORE BOOKINGS') ?>" />
                                <input id="send"
                                       class="send enlace enlace-orange"
                                       name="" type="submit" value="<?php print t('send')?>" />
                            </div><!--cierro filas-->
                        </div><!--cierro envio-datos-->
                    </div>
                </form>
            </div><!--cierro txt-tabs-->
        </div><!--cierro tabs-box-->
    </div><!--cierro box-panel1-->
</section>