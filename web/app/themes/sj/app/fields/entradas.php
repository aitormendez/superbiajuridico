<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$entradas = new FieldsBuilder('entradas');

$entradas
    ->setLocation('post_type', '==', 'story')
        ->or('post_type', '==', 'text');

$entradas
    ->addDatePicker('fecha_pub', [
        'label' => 'Fecha de publicación',
        'instructions' => 'Aquí debe ponerse la fecha en la que se escribió el artículo (aparece como "Fecha de publicación" en la página y en el PDF). Nótese que es una fecha diferente a la fecha en la que se ha publicado en la web.',
        'display_format' => 'F j, Y',
        'return_format' => 'F j, Y',
        'first_day' => 1,
    ])
    ->addRelationship('sentencias_asociadas', [
        'label' => 'Relationship Field',
        'post_type' => ['sentence'],
        'taxonomy' => [],
        'filters' => [
            0 => 'search',
        ],
        'elements' => '',
        'min' => '',
        'max' => '',
        'return_format' => 'object',
        'wpml_cf_preferences' => '0',
    ]);


return $entradas;
