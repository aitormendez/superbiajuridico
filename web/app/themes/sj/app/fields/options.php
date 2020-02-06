<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

acf_add_options_page([
    'page_title' => get_bloginfo('name') . ' theme options',
    'menu_title' => 'SJ Options',
    'menu_slug'  => 'theme-options',
    'capability' => 'edit_theme_options',
    'position'   => '999',
    'autoload'   => true
]);

$options = new FieldsBuilder('theme_options');

$options
    ->setLocation('options_page', '==', 'theme-options');

$options
  ->addImage('img_portada', [
      'label' => 'Image',
      'instructions' => 'Imagen primer plano front page (se ubica sobre el cielo)',
      'return_format' => 'array',
      'preview_size' => 'thumbnail',
      'library' => 'all',
  ]);

return $options;
