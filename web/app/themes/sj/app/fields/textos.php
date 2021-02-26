<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$textos = new FieldsBuilder('textos');

$textos
    ->setLocation('post_type', '==', 'text');

$textos
    ->addRelationship('sentencias_asociadas', [
        'label' => 'Sentencias relacionadas',
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
    ])
    ->addFields(get_field_partial('partials.fechapub'))
    ->addUser('autores', [
        'label' => 'Autores',
        'instructions' => 'Introduce uno o más autores. Si se deja en blanco se usará el autor del post',
        'multiple' => 1,
    ]);

return $textos;
