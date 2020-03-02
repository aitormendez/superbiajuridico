<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$slider = new FieldsBuilder('slider');

$slider
    ->setLocation('post_type', '==', 'story')
        ->or('post_type', '==', 'text')
        ->or('post_type', '==', 'sentence');

$slider
    ->addTrueFalse('go_to_slider', [
        'label' => 'Mostrar en el carrusel de portada SJ',
        'instructions' => 'Activar para que este contenido se muestre en el carrusel de portada en la web de Superbia',
        'default_value' => 0,
        'ui' => 1,
    ])
    ->addTrueFalse('go_to_slider_qj', [
        'label' => 'Mostrar en el carrusel de portada QJ',
        'instructions' => 'Activar para que este contenido se muestre en el carrusel de portada en la web de Quercus',
        'default_value' => 0,
        'ui' => 1,
    ]);

return $slider;
