<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$links = new FieldsBuilder('links');

$links
    ->setLocation('post_type', '==', 'links');

$links
    ->addLink('url', [
        'label' => 'Enlace para el footer',
        'instructions' => 'Utiliza las categorías de enlace para ordenarlos por grupos en el footer y la fecha para el orden de aparición',
        'return_format' => 'array',
    ]);

return $links;
