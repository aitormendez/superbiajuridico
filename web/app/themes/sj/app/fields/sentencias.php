<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('sentencias');

$builder
    ->setLocation('post_type', '==', 'sentence');

$builder
    ->addText('nombre', [
        'label' => 'Nombre',
        'instructions' => 'Si la sentencia tiene un nombre descriptivo, hay que ponerlo aquí.',
    ])
    // ->addFile('pdf', [
    //     'label' => 'PDF',
    //     'instructions' => 'Subir aquí el archivo PDF de esta sentencia.',
    //     'required' => 1,
    //     'return_format' => 'array',
    //     'library' => 'all',
    // ])
    ->addUrl('url_externa', [
        'label' => 'URL externa',
        'instructions' => 'Si la sentencia puede ser encontrada en Cendoj, poner aquí su dirección.',
        'wpml_cf_preferences' => '0',
    ])
    ->addNumber('sentencia_no', [
        'label' => 'nº resolución',
        'instructions' => '',
        'wpml_cf_preferences' => '0',
    ])
    ->addRadio('tipo_resolucion', [
        'label' => 'Tipo de resolución',
        'required' => 1,
        'choices' => [
            'A' => 'Auto',
            'S' => 'Sentencia',
        ],
        'default_value' => 'S : Sentencia',
        'return_format' => 'value',
        'wpml_cf_preferences' => '0',
    ])
    ->addDatePicker('fecha', [
        'label' => 'Fecha',
        'instructions' => 'La fecha de la sentencia',
        'required' => 1,
        'display_format' => 'd/m/Y',
        'return_format' => 'd/m/Y',
        'first_day' => 1,
        'wpml_cf_preferences' => '0',
    ])
    ->addRadio('tribunal', [
        'label' => 'Tribunal',
        'instructions' => 'Especificar aquí el tribunal que emite la sentencia.',
        'required' => 1,
        'choices' => [
            'TS' => 'Tribunal Supremo',
            'AP' => 'Audiencia Provincial',
            'JPI' => 'Juzgado de Primera Instancia',
        ],
        'default_value' => 'TS : Tribunal Supremo',
        'return_format' => 'value',
        'wpml_cf_preferences' => '0',
    ])
    ->addSelect('provincia', [
        'label' => 'Provincia',
        'instructions' => 'Usar sólo para AP (Audiencia Provincial).',
        'choices' => [
            'A Coruña',
            'Álava',
            'Albacete',
            'Alicante',
            'Almería',
            'Asturias',
            'Ávila',
            'Badajoz',
            'Baleares',
            'Barcelona',
            'Burgos',
            'Cáceres',
            'Cádiz',
            'Cantabria',
            'Castellón',
            'Ciudad Real',
            'Córdoba',
            'Cuenca',
            'Girona',
            'Granada',
            'Guadalajara',
            'Gipuzkoa',
            'Huelva',
            'Huesca',
            'Jaén',
            'La Rioja',
            'Las Palmas',
            'León',
            'Lérida',
            'Lugo',
            'Madrid',
            'Málaga',
            'Murcia',
            'Navarra',
            'Ourense',
            'Palencia',
            'Pontevedra',
            'Salamanca',
            'Segovia',
            'Sevilla',
            'Soria',
            'Tarragona',
            'Santa Cruz de Tenerife',
            'Teruel',
            'Toledo',
            'Valencia',
            'Valladolid',
            'Vizcaya',
            'Zamora',
            'Zaragoza',
            'Ceuta',
            'Melilla',
        ],
        'allow_null' => 1,
        'ui' => 0,
        'ajax' => 0,
        'return_format' => 'value',
        'placeholder' => '',
    ]);
    // print_r($builder->build());

return $builder;



