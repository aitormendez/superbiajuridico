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
	        'posts_per_page'        => 4,
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

    public function imgUnoId()
    {
        $args = [
          'name'           => 'myles-tan-84040-unsplash',
          'post_type'      => 'attachment',
        ];
        $img = get_posts( $args );
        return $img[0]->ID;
    }

}
