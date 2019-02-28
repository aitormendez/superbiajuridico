<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class PQuienesSomos extends Controller
{

    public function imgUnoId()
    {
        $args = [
          'name'           => 'danielle-macinnes-88493-unsplash',
          'post_type'      => 'attachment',
        ];
        $img = get_posts( $args );
        return $img[0]->ID;
    }

    public function imgDosId()
    {
        $args = [
          'name'           => 'brian-gordillo-546025-unsplash',
          'post_type'      => 'attachment',
        ];
        $img = get_posts( $args );
        return $img[0]->ID;
    }

}
