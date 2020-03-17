<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class PPlataforma extends Controller
{

    public function hipoTerm()
    {
        return get_term_by('slug', 'hipotecas', 'tema');
    }

    public function tarjTerm()
    {
        return get_term_by('slug', 'tarjetas', 'tema');
    }

    public function argsHipo()
    {
        return [
            'post_type' => [
              'text',
              'story',
            ],
            'tax_query' => [
              [
                'taxonomy' => 'tema',
                'field'    => 'slug',
                'terms'    => 'hipotecas',
              ]
            ],
            'posts_per_page' => 4,
        ];
    }

    public function argsTarj()
    {
        return [
            'post_type' => [
              'text',
              'story',
            ],
            'tax_query' => [
              [
                'taxonomy' => 'tema',
                'field'    => 'slug',
                'terms'    => 'tarjetas',
              ]
            ],
            'posts_per_page' => 4,
        ];
    }
}
