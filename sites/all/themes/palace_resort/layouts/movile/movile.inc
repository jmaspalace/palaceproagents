<?php

/**
 * implementation of hook_panels_layouts()
 */
// Plugin definition
$plugin = array(
  'title' => t('Movile Area'),
  'category' => t('CDI'),
  'icon' => 'movile.png',
  'theme' => 'panels_movile',
  'css' => 'movile.css',
  'regions' => array(
    'header' => t('Header'),
    'content' => t('Content'),
    'footer' => t('Footer')
  ),
);
