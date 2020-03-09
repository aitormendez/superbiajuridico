<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class PSubdespacho extends Controller
{

    public function datos() {

        // todo esto es para pasar argumentos a la query de las subpáginas (en superbia y quercus)
        // basándose en el trid para que funcione en las páginas traducidas.

        $this_ID = get_the_ID();
        $this_trid = apply_filters( 'wpml_element_trid', NULL, $this_ID, 'post_page' );

        $noticias_sj_id = get_page_by_path('noticias-sj')->ID;
        $noticias_sj_trid = apply_filters( 'wpml_element_trid', NULL, $noticias_sj_id, 'post_page' );

        $textos_sj_id = get_page_by_path('textos-sj')->ID;
        $textos_sj_trid = $trid = apply_filters( 'wpml_element_trid', NULL, $textos_sj_id, 'post_page' );

        $sentencias_sj_id = get_page_by_path('sentencias-sj')->ID;
        $sentencias_sj_trid = apply_filters( 'wpml_element_trid', NULL, $sentencias_sj_id, 'post_page' );

        $noticias_qj_id = get_page_by_path('noticias-qj')->ID;
        $noticias_qj_trid = apply_filters( 'wpml_element_trid', NULL, $noticias_qj_id, 'post_page' );

        $textos_qj_id = get_page_by_path('textos-qj')->ID;
        $textos_qj_trid =  apply_filters( 'wpml_element_trid', NULL, $textos_qj_id, 'post_page' );

        $sentencias_qj_id = get_page_by_path('sentencias-qj')->ID;
        $sentencias_qj_trid = apply_filters( 'wpml_element_trid', NULL, $sentencias_qj_id, 'post_page' );

        $trids = [
            'noticias_sj_trid'   => $noticias_sj_trid,
            'sentencias_sj_trid' => $sentencias_sj_trid,
            'textos_sj_trid'     => $textos_sj_trid,
            'noticias_qj_trid'   => $noticias_qj_trid,
            'sentencias_qj_trid' => $sentencias_qj_trid,
            'textos_qj_trid'     => $textos_qj_trid,
        ];

        $ppp = 4;

        switch ($this_trid) {
            case $trids['noticias_sj_trid'] :
                $args = [
                    'post_type'      => 'story',
                    'posts_per_page' => $ppp,
                    'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
                    'tax_query' => [
                        [
                            'taxonomy'  => 'despacho',
                            'field'     => 'slug',
                            'terms'     => 'superbia',
                        ]
                    ]
                ];
                break;
                case $trids['noticias_qj_trid'] :
                    $args = [
                        'post_type' => 'story',
                        'tax_query' => [
                            [
                                'taxonomy'  => 'despacho',
                                'field'     => 'slug',
                                'terms'     => 'quercus',
                            ]
                        ]
                    ];
                break;
                case $trids['sentencias_sj_trid'] :
                    $args = [
                        'post_type' => 'sentence',
                        'tax_query' => [
                            [
                                'taxonomy'  => 'despacho',
                                'field'     => 'slug',
                                'terms'     => 'superbia',
                            ]
                        ]
                    ];
                break;
                case $trids['sentencias_qj_trid'] :
                    $args = [
                        'post_type' => 'sentence',
                        'tax_query' => [
                            [
                                'taxonomy'  => 'despacho',
                                'field'     => 'slug',
                                'terms'     => 'quercus',
                            ]
                        ]
                    ];
                break;
                case $trids['textos_sj_trid'] :
                    $args = [
                        'post_type' => 'text',
                        'tax_query' => [
                            [
                                'taxonomy'  => 'despacho',
                                'field'     => 'slug',
                                'terms'     => 'superbia',
                            ]
                        ]
                    ];
                break;
                case $trids['textos_qj_trid'] :
                    $args = [
                        'post_type' => 'text',
                        'tax_query' => [
                            [
                                'taxonomy'  => 'despacho',
                                'field'     => 'slug',
                                'terms'     => 'quercus',
                            ]
                        ]
                    ];
                break;

            default:
                $args = 'lkjlkjljk';
                break;
        }

        return [
            'args' => $args,
            'trids' => $trids,
            'this_trid' => $this_trid,
        ];


    }

}
