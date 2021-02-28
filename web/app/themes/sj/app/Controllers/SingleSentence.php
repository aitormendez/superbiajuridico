<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SingleSentence extends Controller
{
    public function acfFields()
    {
        $fecha= get_field('fecha', false, false);
        $nombre= get_field('nombre', false, false);
        $fecha_datetime = new \DateTime($fecha);
        $url_externa = get_field('url_externa');
        $pdf = get_field('pdf');
        $fecha_completa =  date_i18n('j \d\e F \d\e Y', $fecha);
        $acf_fields = [
            'url_externa' => $url_externa,
            'pdf' => $pdf,
            'fecha_completa' => $fecha_completa
        ];
        return $acf_fields;
    }

    public function articles()
    {
        $artic = get_posts([
            'post_type'  => 'article',
            'meta_query' => [
                [
                    'key' => 'sentencias_asociadas',
                    'value' => '"'. get_the_ID() . '"',
                    'compare' => 'LIKE'
                ]
            ]
        ]);
        return $artic;
    }

}
