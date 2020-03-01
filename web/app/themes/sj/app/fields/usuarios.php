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
]);

return $links;
