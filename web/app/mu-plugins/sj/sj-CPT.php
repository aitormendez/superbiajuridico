<?php
/**
 * Plugin Name: sj-CPT
 * Description: CPT para sj
 * Author: Aitor Méndez
 * Author URI: https://e451.net
 * Text Domain: sj-CPT
 * License: MIT License
 * https://github.com/johnbillion/extended-cpts
 */

namespace sj;

add_action( 'init', function() {

  load_textdomain('sj-CPT', WPMU_PLUGIN_DIR . '/' .plugin_basename( dirname( __FILE__ ) ) . '/languages/sj-CPT-' . get_locale() . '.mo');

  //text cpt

  $labels_text = [
    'name'                  => _x( 'Text', 'Post Type General Name', 'sj-CPT' ),
    'singular_name'         => _x( 'Text', 'Post Type Singular Name', 'sj-CPT' ),
    'menu_name'             => __( 'Texts', 'sj-CPT' ),
    'name_admin_bar'        => __( 'Text', 'sj-CPT' ),
    'archives'              => __( 'Text archive', 'sj-CPT' ),
    'attributes'            => __( 'Text attributes', 'sj-CPT' ),
    'parent_item_colon'     => __( 'Parent text:', 'sj-CPT' ),
    'all_items'             => __( 'All texts', 'sj-CPT' ),
    'add_new_item'          => __( 'Add new text', 'sj-CPT' ),
    'add_new'               => __( 'Add new', 'sj-CPT' ),
    'new_item'              => __( 'New text', 'sj-CPT' ),
    'edit_item'             => __( 'Edit text', 'sj-CPT' ),
    'update_item'           => __( 'Update text', 'sj-CPT' ),
    'view_item'             => __( 'view text', 'sj-CPT' ),
    'view_items'            => __( 'View texts', 'sj-CPT' ),
    'search_items'          => __( 'Search texts', 'sj-CPT' ),
    'not_found'             => __( 'Not found', 'sj-CPT' ),
    'not_found_in_trash'    => __( 'Not found in trash', 'sj-CPT' ),
    'featured_image'        => __( 'Featured image', 'sj-CPT' ),
    'set_featured_image'    => __( 'Set featured image', 'sj-CPT' ),
    'remove_featured_image' => __( 'Remove featured image', 'sj-CPT' ),
    'use_featured_image'    => __( 'Use featured image', 'sj-CPT' ),
    'insert_into_item'      => __( 'Insert into text', 'sj-CPT' ),
    'uploaded_to_this_item' => __( 'Uploaded to this text', 'sj-CPT' ),
    'items_list'            => __( 'Texts list', 'sj-CPT' ),
    'items_list_navigation' => __( 'Texts list navigation', 'sj-CPT' ),
    'filter_items_list'     => __( 'Filter texts list', 'sj-CPT' ),
  ];

  $cols_text = [
    'post_author' => [
      'title'      => 'Post author',
      'post_field' => 'post_author',
    ]
  ];

  $supports_text = [
    'author',
    'title',
    'editor',
    'excerpt',
  ];

  register_extended_post_type(
    'text',
    [
      'show_in_rest' => true,
      'show_in_feed' => true,
      'labels'       => $labels_text,
      'admin_cols'   => $cols_text,
      'supports'     => $supports_text,
    ]
  );

  register_extended_taxonomy( 'article-category',
    [
      'text',
    ],
    [
      'meta_box' => 'radio',
      'hierarchical' => false,
    ],
    [
      'singular' => __( 'Categoría de texto', 'sj-CPT' ),
      'plural'   => __( 'Categorías de texto', 'sj-CPT' ),
      'slug'     => 'article-category'
    ]
  );

  register_extended_taxonomy( 'article-tag',
    [
      'text'
    ],
    [
      'meta_box' => 'simple',
      'hierarchical' => false,
     ],
     [
      'singular' => __( 'Etiqueta de texto', 'sj-CPT' ),
      'plural'   => __( 'Etiquetas de texto', 'sj-CPT' ),
      'slug'     => 'article-tag'
     ]
  );

  register_extended_taxonomy( 'article-type',
    [
      'text'
    ],
    [
      'meta_box' => 'simple',
      'hierarchical' => false,
     ],
     [
      'singular' => __( 'Tipo de texto', 'sj-CPT' ),
      'plural'   => __( 'Tipos de texto', 'sj-CPT' ),
      'slug'     => 'article-type'
     ]
  );

  // Judgment cpt

  $labels_sentence = [
    'name'                  => _x( 'Judgment', 'Post Type General Name', 'sj-CPT' ),
  	'singular_name'         => _x( 'Judgment', 'Post Type Singular Name', 'sj-CPT' ),
  	'menu_name'             => __( 'Judgments', 'sj-CPT' ),
  	'name_admin_bar'        => __( 'Judgment', 'sj-CPT' ),
  	'archives'              => __( 'Judgments archive', 'sj-CPT' ),
  	'attributes'            => __( 'Judgment attributes', 'sj-CPT' ),
  	'parent_item_colon'     => __( 'Parent Judgment:', 'sj-CPT' ),
  	'all_items'             => __( 'All Judgments', 'sj-CPT' ),
  	'add_new_item'          => __( 'Add new Judgment', 'sj-CPT' ),
  	'add_new'               => __( 'Add new', 'sj-CPT' ),
  	'new_item'              => __( 'New Judgment', 'sj-CPT' ),
  	'edit_item'             => __( 'Edit Judgment', 'sj-CPT' ),
  	'update_item'           => __( 'Update Judgment', 'sj-CPT' ),
  	'view_item'             => __( 'View Judgment', 'sj-CPT' ),
  	'view_items'            => __( 'View Judgments', 'sj-CPT' ),
  	'search_items'          => __( 'search Judgments', 'sj-CPT' ),
  	'not_found'             => __( 'Not found', 'sj-CPT' ),
  	'not_found_in_trash'    => __( 'Not found en la papelera', 'sj-CPT' ),
  	'insert_into_item'      => __( 'Insert into Judgment', 'sj-CPT' ),
  	'uploaded_to_this_item' => __( 'Uploaded to this Judgment', 'sj-CPT' ),
  	'items_list'            => __( 'Judgments list', 'sj-CPT' ),
  	'items_list_navigation' => __( 'Judgment list navigation', 'sj-CPT' ),
  	'filter_items_list'     => __( 'Filter Judgments list', 'sj-CPT' ),
  ];

  $cols_sentence = [
    'post_author',
  ];

  $supports_sentence = [
    'title',
  ];

  register_extended_post_type(
    'sentence',
    [
      'show_in_rest' => true,
      'show_in_feed' => true,
      'labels'       => $labels_sentence,
      'admin_cols'   => $cols_sentence,
      'supports'     => $supports_sentence,
    ]
  );

  // Story cpt (story)

  $labels_story = [
    'name'                  => _x( 'Stories', 'Post Type General Name', 'sj-CPT' ),
  	'singular_name'         => _x( 'Story', 'Post Type Singular Name', 'sj-CPT' ),
  	'menu_name'             => __( 'Stories', 'sj-CPT' ),
  	'name_admin_bar'        => __( 'Story', 'sj-CPT' ),
  	'archives'              => __( 'Stories archive', 'sj-CPT' ),
  	'attributes'            => __( 'Story attribute', 'sj-CPT' ),
  	'parent_item_colon'     => __( 'Parent Story:', 'sj-CPT' ),
  	'all_items'             => __( 'All Stories', 'sj-CPT' ),
  	'add_new_item'          => __( 'Add new Story', 'sj-CPT' ),
  	'add_new'               => __( 'Add new', 'sj-CPT' ),
  	'new_item'              => __( 'New Story', 'sj-CPT' ),
  	'edit_item'             => __( 'Edit Story', 'sj-CPT' ),
  	'update_item'           => __( 'Update Story', 'sj-CPT' ),
  	'view_item'             => __( 'View Story', 'sj-CPT' ),
  	'view_items'            => __( 'View Stories', 'sj-CPT' ),
  	'search_items'          => __( 'search Story', 'sj-CPT' ),
  	'not_found'             => __( 'Not found', 'sj-CPT' ),
  	'not_found_in_trash'    => __( 'Not found en la papelera', 'sj-CPT' ),
  	'featured_image'        => __( 'Featured image', 'sj-CPT' ),
  	'set_featured_image'    => __( 'Set featured image', 'sj-CPT' ),
  	'remove_featured_image' => __( 'Remove featured image', 'sj-CPT' ),
  	'use_featured_image'    => __( 'Use featured image', 'sj-CPT' ),
  	'insert_into_item'      => __( 'Insert into Story', 'sj-CPT' ),
  	'uploaded_to_this_item' => __( 'Uploaded to this Story', 'sj-CPT' ),
  	'items_list'            => __( 'Stories list', 'sj-CPT' ),
  	'items_list_navigation' => __( 'Stories list navigation', 'sj-CPT' ),
  	'filter_items_list'     => __( 'Filter stories list', 'sj-CPT' ),
  ];

  $cols_story = [
    'post_author' => [
      'title'      => 'Post author',
      'post_field' => 'post_author',
    ]
  ];

  $supports_story = [
    'author',
    'title',
    'editor',
    'excerpt',
  ];

  register_extended_post_type(
    'story',
    [
      'show_in_rest' => true,
      'show_in_feed' => true,
      'labels'       => $labels_story,
      'admin_cols'   => $cols_story,
      'supports'     => $supports_story,
    ],
    [
      		'slug'     => 'stories'
    ]
  );

  register_extended_taxonomy( 'news-tag',
    [
      'story',
    ],
    [
      'meta_box' => 'simple',
      'hierarchical' => false,
    ],
    [
      'singular' => __( 'Categoría de Story', 'sj-CPT' ),
  		'plural'   => __( 'Categorías de Story', 'sj-CPT' ),
      'slug'     => 'news-tag'
    ]
  );

  register_extended_taxonomy( 'news-category',
    [
      'story',
    ],
    [
      'meta_box' => 'simple',
      'hierarchical' => false,
    ],
    [
      'singular' => __( 'Categoría de Story', 'sj-CPT' ),
  		'plural'   => __( 'Categorías de Story', 'sj-CPT' ),
      'slug'     => 'news-category'
    ]
  );

  // links cpt

  $labels_links = [
  'name'                  => _x( 'Links', 'Post Type General Name', 'sj-CPT' ),
	'singular_name'         => _x( 'Link', 'Post Type Singular Name', 'sj-CPT' ),
	'menu_name'             => __( 'Links', 'sj-CPT' ),
	'name_admin_bar'        => __( 'Link', 'sj-CPT' ),
	'archives'              => __( 'Links archive', 'sj-CPT' ),
	'attributes'            => __( 'Link attribute', 'sj-CPT' ),
	'parent_item_colon'     => __( 'Parent Link:', 'sj-CPT' ),
	'all_items'             => __( 'All Links', 'sj-CPT' ),
	'add_new_item'          => __( 'Add new Link', 'sj-CPT' ),
	'add_new'               => __( 'Add new', 'sj-CPT' ),
	'new_item'              => __( 'New Link', 'sj-CPT' ),
	'edit_item'             => __( 'Edit Link', 'sj-CPT' ),
	'update_item'           => __( 'Update Link', 'sj-CPT' ),
	'view_item'             => __( 'View Link', 'sj-CPT' ),
	'view_items'            => __( 'View Links', 'sj-CPT' ),
	'search_items'          => __( 'Search Link', 'sj-CPT' ),
	'not_found'             => __( 'Not found', 'sj-CPT' ),
	'not_found_in_trash'    => __( 'Not found in trash', 'sj-CPT' ),
];

$cols_links = [
  'post_author',
];

$supports_links = [
  'title',
];

register_extended_post_type(
  'links',
  [
    'show_in_rest' => true,
    'show_in_feed' => true,
    'labels'       => $labels_links,
    'admin_cols'   => $cols_links,
    'supports'     => $supports_links,
  ]
);

register_extended_taxonomy( 'link-category',
  [
    'links',
  ],
  [
    'meta_box' => 'simple',
    'hierarchical' => false,
  ],
  [
    'singular' => __( 'Categoría de Link', 'sj-CPT' ),
    'plural'   => __( 'Categorías de Link', 'sj-CPT' ),
    'slug'     => 'link-category'
  ]
);

}, 0 );
