<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class PNewsletter extends Controller
{
    function pagNewsletter() {
        $page = get_page_by_path( 'newsletter' );
        $trid = apply_filters( 'wpml_element_trid', NULL, $page->ID, 'post_page' );
        $esta = apply_filters( 'wpml_element_trid', NULL, get_the_id(), 'post_page' );

        if ($esta === $trid) {
            return true;
        }
    }
}
