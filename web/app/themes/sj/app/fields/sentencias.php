<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$links = new FieldsBuilder('sentencias');

$links
    ->setLocation('post_type', '==', 'sentence');

$links
    ->addText('nombre', [
        'label' => 'Nombre',
        'instructions' => 'Si la sentencia tiene un nombre descriptivo, hay que ponerlo aquí.',
    ])
    ->addFile('pdf', [
        'label' => 'PDF',
        'instructions' => 'Subir aquí el archivo PDF de esta sentencia.',
        'required' => 1,
        'return_format' => 'url',
        'library' => 'all',
        'wpml_cf_preferences' => '0',
    ])
    ->addUrl('url_externa', [
        'label' => 'URL externa',
        'instructions' => 'Si la sentencia puede ser encontrada en Cendoj, poner aquí su dirección.',
        'wpml_cf_preferences' => '0',
    ])
    ->addNumber('sentencia_no', [
        'label' => 'Sentencia nº',
        'instructions' => '',
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
            'STS' => 'Tribunal Supremo',
            'SAP' => 'Audiencia Provincial',
            'JPI' => 'Juzgado de Primera Instancia',
        ],
        'default_value' => 'STS : Tribunal Supremo',
        'return_format' => 'value',
        'wpml_cf_preferences' => '0',
    ]);

return $links;
