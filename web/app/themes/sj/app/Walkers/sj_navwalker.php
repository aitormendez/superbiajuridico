<?php

namespace App\Walkers;

class sj_navwalker extends \Walker_Nav_Menu {

    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
        $object = $item->object;
        $type = $item->type;
        $title = $item->title;
        $description = $item->description;
        $permalink = $item->url;
        $slug = $item->slug;
        $id = $item->ID;

        $output .= "<li class='" .  implode(" ", $item->classes) . "'>";

        //Add SPAN if no Permalink
        if( $permalink && $permalink != '#' ) {
            $output .= '<a href="' . $permalink . '">';
        } else {
            $output .= '<div>';
        }

        if (is_front_page() && $depth == 0) {
            $icon = get_field( "menu_icon", $id );
            if( $icon ) {
            $output .= '<i class="' . $icon . '"></i>';
            }
        }

        $output .= '<span class="epi">' . $title . '</span>';

        if (is_front_page()) {
            if( $description != '' && $depth == 0 ) {
                if ($slug == 'quercus-juridico') {
                    $output .= '<div class="description">' . $description . '</div>';
                } else {
                    $output .= '<div class="description">' . $description . '</div>';
                }

            }
        }

        if( $permalink && $permalink != '#' ) {
            $output .= '</a>';
        } else {
            $output .= '</div>';
        }

        return $output;
    }

}
