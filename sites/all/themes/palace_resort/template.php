<?php
require_once('libraries/Mobile_Detect/Mobile_Detect.php');

/**
 * Add body classes if certain regions have content.
 */
function palace_resort_preprocess_html(&$variables) {
    $viewport = array(
        '#tag' => 'meta',
        '#attributes' => array(
            'name' => 'viewport',
            'content' => 'initial-scale=1, maximum-scale=1',
        ),
    );
    drupal_add_html_head($viewport, 'viewport');

    drupal_add_css('https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700', array('type' => 'external'));
    drupal_add_css('https://fonts.googleapis.com/css?family=EB+Garamond', array('type' => 'external'));
    drupal_add_css('https://fonts.googleapis.com/css?family=Open+Sans:300', array('type' => 'external'));

    $theme_path = drupal_get_path('theme', 'palace_resort');

    drupal_add_css($theme_path.'/css/bootstrap.min.css');
    drupal_add_css($theme_path.'/css/flexslider.css');
    drupal_add_css($theme_path.'/css/owl.carousel.min.css');
    drupal_add_css($theme_path.'/css/jquery.fancybox.css');
    drupal_add_css($theme_path.'/css/bootstrap-select.min.css');
    drupal_add_css($theme_path.'/css/styles.css');
    drupal_add_css($theme_path.'/css/styles_mobile.css');

    drupal_add_js('https://www.reservhotel.com/hotel_fastlink_js/555.js', array('type' => 'external', 'scope' => 'footer'));
}

/**
 * Override or insert variables into the page template for HTML output.
 */
function palace_resort_process_html(&$variables) {
    // Hook into color.module.
    if (module_exists('color')) {
        _color_html_alter($variables);
    }
}

/**
 * Override or insert variables into the page template.
 */
function palace_resort_process_page(&$variables) {
    // Hook into color.module.
    if (module_exists('color')) {
        _color_page_alter($variables);
    }
    // Always print the site name and slogan, but if they are toggled off, we'll
    // just hide them visually.
    $variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
    $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
    if ($variables['hide_site_name']) {
        // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
        $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
    }
    if ($variables['hide_site_slogan']) {
        // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
        $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
    }
    // Since the title and the shortcut link are both block level elements,
    // positioning them next to each other is much simpler with a wrapper div.
    if (!empty($variables['title_suffix']['add_or_remove_shortcut']) && $variables['title']) {
        // Add a wrapper div using the title_prefix and title_suffix render elements.
        $variables['title_prefix']['shortcut_wrapper'] = array(
            '#markup' => '<div class="shortcut-wrapper clearfix">',
            '#weight' => 100,
        );
        $variables['title_suffix']['shortcut_wrapper'] = array(
            '#markup' => '</div>',
            '#weight' => -99,
        );
        // Make sure the shortcut link is the first item in title_suffix.
        $variables['title_suffix']['add_or_remove_shortcut']['#weight'] = -100;
    }

    // Se cargan los css para el landing estatico de Experience
    if (isset($variables['node']) && is_object($variables['node']) && $variables['node']->vid == 501)
    {
      drupal_add_css(drupal_get_path('theme', 'palace_resort') . '/templates/landings/experience/css/style.css');
      drupal_add_css(drupal_get_path('theme', 'palace_resort') . '/templates/landings/experience/css/lp_styles.css');
      drupal_add_css(drupal_get_path('theme', 'palace_resort') . '/templates/landings/experience/css/animate.css');


      drupal_add_js(base_path().path_to_theme() . '/templates/landings/experience/js/jquery.jscrollpane.min.js', array('group' => JS_THEME, 'weight' => 27));
      drupal_add_js(base_path().path_to_theme() . '/templates/landings/experience/js/slick.js', array('group' => JS_THEME, 'weight' => 28));
      drupal_add_js(base_path().path_to_theme() . '/templates/landings/experience/js/animation.js', array('group' => JS_THEME, 'weight' => 29));
      drupal_add_js(base_path().path_to_theme() . '/templates/landings/experience/js/custom.js', array('group' => JS_THEME, 'weight' => 30));
    }
}

/**
 * Implements hook_preprocess_maintenance_page().
 */
function palace_resort_preprocess_maintenance_page(&$variables) {
    // By default, site_name is set to Drupal if no db connection is available
    // or during site installation. Setting site_name to an empty string makes
    // the site and update pages look cleaner.
    // @see template_preprocess_maintenance_page
    if (!$variables['db_is_active']) {
        $variables['site_name'] = '';
    }
    drupal_add_css(drupal_get_path('theme', 'palace_resort') . '/css/maintenance-page.css');
}

/**
 * Override or insert variables into the maintenance page template.
 */
function palace_resort_process_maintenance_page(&$variables) {
    // Always print the site name and slogan, but if they are toggled off, we'll
    // just hide them visually.
    $variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
    $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
    if ($variables['hide_site_name']) {
        // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
        $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
    }
    if ($variables['hide_site_slogan']) {
        // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
        $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
    }
}

/**
 * Override or insert variables into the node template.
 */
function palace_resort_preprocess_node(&$variables) {
    if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
        $variables['classes_array'][] = 'node-full';
    }
}

/**
 * Override or insert variables into the block template.
 */
function palace_resort_preprocess_block(&$variables) {
    // In the header region visually hide block titles.
    if ($variables['block']->region == 'header') {
        $variables['title_attributes_array']['class'][] = 'element-invisible';
    }
}

/**
 * Implements theme_menu_tree().
 */
function palace_resort_menu_tree($variables) {
    return '<ul class="menu clearfix">' . $variables['tree'] . '</ul>';
}

/**
 * Implements theme_field__field_type().
 */
function palace_resort_field__taxonomy_term_reference($variables) {
    $output = '';

    // Render the label, if it's not hidden.
    if (!$variables['label_hidden']) {
        $output .= '<h3 class="field-label">' . $variables['label'] . ': </h3>';
    }

    // Render the items.
    $output .= ($variables['element']['#label_display'] == 'inline') ? '<ul class="links inline">' : '<ul class="links">';
    foreach ($variables['items'] as $delta => $item) {
        $output .= '<li class="taxonomy-term-reference-' . $delta . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</li>';
    }
    $output .= '</ul>';

    // Render the top-level DIV.
    $output = '<div class="' . $variables['classes'] . (!in_array('clearfix', $variables['classes_array']) ? ' clearfix' : '') . '"' . $variables['attributes'] .'>' . $output . '</div>';

    return $output;
}
