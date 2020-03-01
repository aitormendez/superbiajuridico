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
->addTab('despacho', ['placement' => 'left'])
    ->addRadio('despacho', [
        'label' => 'Despacho principal',
        'instructions' => 'Elige el despacho principal de esta web',
        'choices' => [
            'superbia' => 'Superbia',
            'quercus' => 'Quercus'
        ],
        'default_value' => '',
        'layout' => 'vertical',
        'return_format' => 'value',
    ])
    ->addTab('home', ['placement' => 'left'])
        ->addImage('img_portada', [
                'label' => 'Image',
                'instructions' => 'Imagen primer plano front page (se ubica sobre el cielo)',
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ])
        ->addTextarea('hero_txt', [
            'label' => 'Texto para hero',
        ]);


return $options;
