<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$links = new FieldsBuilder('usuarios');

$links
    ->setLocation('user_role', '==', 'all');

$links
    ->addWysiwyg('info_adicional', [
        'label' => 'WYSIWYG Field',
        'instructions' => 'Añade aquí la información adicional que quieras mostrar de este usuario.',
        'default_value' => '',
        'tabs' => 'all',
        'toolbar' => 'full',
        'media_upload' => 1,
        'delay' => 0,
    ])
    ->addImage('avatar', [
        'label' => 'Avatar',
        'instructions' => 'Foto del autor. Debe tener un tamaño de 300px x 300px',
        'return_format' => 'array',
        'preview_size' => 'thumbnail',
        'library' => 'all',
        'min_width' => '300',
        'min_height' => '300',
        'max_width' => '300',
        'max_height' => '300',
    ]);

return $links;
