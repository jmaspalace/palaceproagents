<?php

/**
 * implementation of hook_panels_layouts()
 */
// Plugin definition
$plugin = array(
  'title' => t('Page Area'),
  'category' => t('CDI'),
  'icon' => 'page.png',
  'theme' => 'panels_page',
  'css' => 'page.css',
  'regions' => array(
    'header' => t('Header'),
    'content' => t('Content'),
    'footer' => t('Footer')
  ),
);
