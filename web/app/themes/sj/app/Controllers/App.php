<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public function siteUrl()
    {
        return get_bloginfo('url');
    }

    public function links()
    {
        $terms = get_terms(array(
            'taxonomy' => 'link-category',
            'hide_empty' =>true,
            ));
        return $terms;
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Últimas entradas', 'sage');
        }
        if (is_author()) {
            return __('Autor', 'sage') . ': ' . get_queried_object()->display_name;
        }
        if (is_tax('news-category', 'superbia-juridico')) {
            return __('Superbia Jurídico en los medios', 'sage');
        }
        if (is_tax('article-type', 'articulo') ) {
            return __('Artículos', 'sage');
        }
        if (is_tax('article-type', 'resumen') ) {
            return __('Resúmenes de sentencias', 'sage');
        }
        if (is_tax('article-type', 'comentario') ) {
            return __('Sentencias comentadas', 'sage');
        }
        if (is_post_type_archive('sentence') || is_tax('sentence-category')) {
            return __('Jurisprudencia', 'sage');
        }
        if (is_tax()) {
            return get_queried_object()->name;
        }
        if (is_post_type_archive('text')) {
            return __('Textos', 'sage');
        }
        if (is_post_type_archive('story')) {
            return __('Noticias', 'sage');
        }
        if (is_archive()) {
            return sprintf( __( '%s' ), post_type_archive_title( '', false ) );
        }
        if (is_search()) {
            return sprintf(__('Resultado de búsqueda para <b> %s </b>', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('No encontrado', 'sage');
        }
        return get_the_title();
    }

    function pagNewsletter() {
        $page = get_page_by_path( 'newsletter' );
        $trid = apply_filters( 'wpml_element_trid', NULL, $page->ID, 'post_page' );
        $esta = apply_filters( 'wpml_element_trid', NULL, get_the_id(), 'post_page' );

        if ($esta === $trid) {
            return true;
        } else {
            return false;
        }
    }

    public function despacho() {
        return get_field('despacho', 'option');
    }

    public function menus() {
        $despacho = get_field('despacho', 'option');
        $menus = [];

        if ($despacho == 'superbia') {
            $menus['primary_navigation'] = 'primary_navigation';
            $menus['insti_navigation'] = 'insti_navigation';
        } elseif ($despacho == 'quercus') {
            $menus['primary_navigation'] = 'primary_navigation_qj';
            $menus['insti_navigation'] = 'insti_navigation_qj';
        }

        return $menus;
    }

}
