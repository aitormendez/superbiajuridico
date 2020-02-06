<?php

namespace App\Controllers;

use WP_Query;
use Sober\Controller\Controller;

class FrontPage extends Controller
{
    public function imgPortada()
    {
        $img_portada = get_field('img_portada', 'option');
        $img_portada_srcset = wp_get_attachment_image_srcset($img_portada['ID']);

        return '<img
            class="img"
            src=" ' . $img_portada['url'] . ' "
            alt=" ' . $img_portada['title'] . ' "
            srcset=" ' . $img_portada_srcset . ' "
            sizes="(max-width: 768px) 80vw, 50vw"
        >';

    }

    public function argsArticle()
    {
        $args_article = [
        	'post_type'             => ['text'],
        	'post_status'           => ['publish'],
            'posts_per_page'        => 4,
            'tax_query'             => [
                [
                    'taxonomy' => 'article-type',
                        'field'    => 'slug',
                            'terms'    => ['articulo'],
                        'operator' => 'IN',
                    ]
                ]
        ];
        return $args_article;
    }

    public function argsComment()
    {
        $args_comment = array(
        	'post_type'             => ['text'],
        	'post_status'           => 'publish',
            'posts_per_page'         => 4,
            'tax_query'             => [
                [
                    'taxonomy' => 'article-type',
                        'field'    => 'slug',
                        'terms'    => ['comentario'],
                    'operator' => 'IN',
                    ]
                ]
        );
        return $args_comment;
    }

    public function argsAbstract()
    {
        $args_abstract = array(
        	'post_type'              => ['text'],
        	'post_status'            => 'publish',
	        'posts_per_page'         => 4,
            'tax_query'             => [
                [
                'taxonomy' => 'article-type',
                    'field'    => 'slug',
                    'terms'    => ['resumen'],
                    'operator' => 'IN',
                ]
            ]
        );
        return $args_abstract;
    }

    public function argsNews()
    {
        $args_news = array(
        	'post_type'              => 'story',
        	'post_status'            => 'publish',
	        'posts_per_page'         => 21,
            'meta_key'               => 'fecha_pub',
            'orderby'	=> 'meta_value_num',
            'order'		=> 'DESC',
        );
        return $args_news;
    }
    public function argsRincon()
    {
        $args_rincon = array(
        	'post_type'              => ['text'],
        	'post_status'            => 'publish',
            'posts_per_page'         => 1,
            'tax_query'             => [
                [
                'taxonomy' => 'article-type',
                    'field'    => 'slug',
                    'terms'    => ['rincon'],
                'operator' => 'IN',
                ]
            ]
        );
        return $args_rincon;
    }

    public function argsGlide()
    {
        $args_glide = array(
        	'post_type'              => ['story', 'text', 'sentence'],
        	'post_status'            => 'publish',
            'nopaging'               => true,
            'meta_key'		         => 'go_to_slider',
	        'meta_value'	         => true,
        );
        return $args_glide;
    }

    public function contactLink()
    {
      $contacto = get_page_by_title( 'contacto' );
      $permalink = get_permalink($contacto);
      if (ICL_LANGUAGE_CODE == 'ru') {
        $output = apply_filters( 'wpml_permalink', $permalink, 'ru', true );
      } else {
        $output = $permalink;
      }
      return $output;
    }

    public static function itemSlider()
    {
        $post_type = get_post_type();

        if ($post_type == 'text' ) {
            $term = get_the_terms( get_the_ID(), 'article-type' )[0];
            $clase = $term->slug;

            switch ($term->slug) {
                case 'resumen':
                    $icono = '<i class="fas fa-gavel"></i>';
                    $seccion = 'Resumen de sentencia';
                    break;

                case 'articulo':
                    $icono = '<i class="fas fa-pen-fancy"></i>';
                    $seccion = 'Artículo';
                    break;

                case 'comentario':
                    $icono = '<i class="fas fa-comment"></i>';
                    $seccion = 'Comentario de sentencia';
                    break;

                case 'rincon':
                    $icono = '<i class="fas fa-graduation-cap"></i>';
                    $seccion = 'Rincón del profesor';
                    break;
            }
        } else {
            $clase = $post_type;
        }

        if ($post_type == 'story') {
            $icono = '<i class="fas fa-newspaper"></i>';
            $seccion = 'Noticia';
        }

        if ($post_type == 'sentence') {
            $icono = '<i class="fas fa-gavel"></i>';
            $seccion = 'Sentencia';
        }

        $output = [
            'clase'   => $clase,
            'seccion' => $seccion,
            'icono'   => $icono,
        ];

        return $output;
    }

    use Partials\Enlaceexterno;

}

