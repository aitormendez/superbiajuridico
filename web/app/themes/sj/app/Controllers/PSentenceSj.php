<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class PSentenceSj extends Controller
{

    public function querySentenceSj()
    {
        $args = array(
        	'post_type'              => array( 'sentence' ),
        	'post_status'            => array( 'publish' ),
	        'posts_per_page'         => '-1',
            'meta_query'             => [
                [
                    'key' => 'sj',
                    'value' => true,
                    'compare' => 'LIKE'
                    ]
                ]
        );
        $query_sentence_sj = new \WP_Query( $args );
        return $query_sentence_sj;
    }
}
