<?php

namespace App\Controllers;

use WP_Query;
use Sober\Controller\Controller;

class FrontPage extends Controller
{

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

    public function imgPortada()
    {
      $img = get_field('img_portada', 'options');
      $srcset = wp_get_attachment_image_srcset($img['id'], 'very-large');

      return [$img, $srcset ];
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

}
