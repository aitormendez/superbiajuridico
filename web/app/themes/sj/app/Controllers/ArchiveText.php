<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class ArchiveText extends Controller
{
    public static function losAutoresLoop()
    {
        $autores = get_field('autores');

        if ($autores) {

            $output = array_map(function ($autor) {

                $ava = get_field('avatar', 'user_' . $autor['ID']);

                $out = [
                    'nombre' => $autor['display_name'],
                    'info' => get_field('info_adicional', 'user_' . $autor['ID']),
                    'pagina_autor' => get_author_posts_url($autor['ID'])
                ];

                if ($ava) {
                    $out['avatar_url'] = $ava['url'];
                }

                return $out;

            }, $autores);

            return $output;

        } else {
            $ava = get_field('avatar', 'user_' . get_the_author_meta('ID'));
            $out = [
                'nombre' => get_the_author(),
                'info' => get_field('info_adicional', 'user_' . get_the_author_meta('ID')),
                'pagina_autor' => get_author_posts_url(get_the_author_meta('ID'))
            ];

            if ($ava) {
                $ava_url = $ava['url'];
                $out['avatar_url'] = $ava;
            }

            return [$out];
        }
    }

    public static function textType()
    {
        global $post;
        $terms = get_the_terms($post->ID, 'article-type');
        $output = '';
        $text_type_url = get_bloginfo('url') . '/article-types/';
        foreach ($terms as $term) {
            $output .= '<a href="' . $text_type_url . $term->slug . '">' . $term->name . '</a>';
        }
        return $output;
    }

    public function allArtTagTermList()
    {
        $text_tags = get_terms( 'article-tag' );

        $list = '';

        if ( ! empty( $text_tags ) && ! is_wp_error( $text_tags ) ){
            $list = '<ul class="terms art-tags">';
            foreach ( $text_tags as $text_tag ) {
                $list .= '<li>' . '<a href="' . esc_url( get_term_link( $text_tag ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'sj' ), $text_tag->name ) ) . '">' . $text_tag->name . '</a>' . '</li>';
            }
            $list .= '</ul>';
        }
        return $list;
    }
    public function allArtCatTermList()
    {
        $text_cats = get_terms( 'article-category' );

        $list = '';

        if ( ! empty( $text_cats ) && ! is_wp_error( $text_cats ) ){
            $list = '<ul class="terms art-cats">';
            foreach ( $text_cats as $text_cat ) {
                $list .= '<li>' . '<a href="' . esc_url( get_term_link( $text_cat ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'sj' ), $text_cat->name ) ) . '">' . $text_cat->name . '</a>' . '</li>';
            }
            $list .= '</ul>';
        }
        return $list;
    }
}
