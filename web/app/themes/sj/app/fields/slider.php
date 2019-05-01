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
        'label' => 'Mostrar en el carrusel de portada',
        'instructions' => 'Activar para que este contenido se muestre en el carrusel de portada',
        'default_value' => 0,
        'ui' => 1,
    ]);

return $slider;
