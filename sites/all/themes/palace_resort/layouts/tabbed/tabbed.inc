<?php

/**
 * implementation of hook_panels_layouts()
 */
// Plugin definition
$plugin = array(
  'title' => t('Tabbed Ppge'),
  'category' => t('CDI'),
  'icon' => 'tabbed.png',
  'theme' => 'panels_tabbed',
  'css' => 'tabbed.css',
  'regions' => array(
    'header' => t('Header'),
    'top' => t('Top'),
    'content' => t('Content'),
    'bottom' => t('Bottom'),
    'footer' => t('Footer')
  ),
);
