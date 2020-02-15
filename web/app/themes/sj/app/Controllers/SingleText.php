<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SingleText extends Controller
{
    public function autor()
    {
        return get_field('autor');
    }

    public function fechaPub()
    {
        return get_field('fecha_pub');
    }

    public function artCatTermList()
    {
        global $post;
        return get_the_term_list( $post->ID, 'article-category', '<ul class="terms art-cats"><li>', '</li><li>', '</li></ul>' );
    }

    public function artTagTermList()
    {
        global $post;
        return get_the_term_list( $post->ID, 'article-tag', '<ul class="terms art-tags"><li>', '</li><li>', '</li></ul>' );
    }

}
