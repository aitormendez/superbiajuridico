<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$story = new FieldsBuilder('story');

$story
    ->setLocation('post_type', '==', 'story');

$story
    ->addLink('enlace_externo', [
        'label' => 'Enlace externo',
        'instructions' => 'Si es una noticia externa, especificar aquí la dirección web (URL) de la noticia hacia donde debe apuntar el enlace.',
        'required' => 0,
        'return_format' => 'array',
    ])
    ->addFields(get_field_partial('partials.fechapub'));

return $story;
