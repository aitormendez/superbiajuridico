<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$fechapub = new FieldsBuilder('fecha-pub');

$fechapub
    ->addDatePicker('fecha_pub', [
        'label' => 'Fecha de publicación',
        'instructions' => 'Aquí debe ponerse la fecha en la que se escribió el artículo (aparece como "Fecha de publicación" en la página y en el PDF). Nótese que es una fecha diferente a la fecha en la que se ha publicado en la web.',
        'display_format' => 'F j, Y',
        'return_format' => 'F j, Y',
        'first_day' => 1,
    ]);
return $fechapub;


