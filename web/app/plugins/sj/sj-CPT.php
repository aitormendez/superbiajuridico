<?php
/**
 * Plugin Name: sj-CPT
 * Description: CPT para sj
 * Author: Aitor Méndez
 * Author URI: https://e451.net
 * Texto Domain: sj-CPT
 * License: MIT License
 * https://github.com/johnbillion/extended-cpts
 */

namespace sj;

add_action( 'init', function() {

  // load_textodomain('sj-CPT', WPMU_PLUGIN_DIR . '/' .plugin_basename( dirname( __FILE__ ) ) . '/languages/sj-CPT-' . get_locale() . '.mo');

  //texto cpt

  $labels_texto = [
    'name'                  => _x( 'Texto', 'Post Type General Name', 'sj-CPT' ),
    'singular_name'         => _x( 'Texto', 'Post Type Singular Name', 'sj-CPT' ),
    'menu_name'             => __( 'Textos', 'sj-CPT' ),
    'name_admin_bar'        => __( 'Texto', 'sj-CPT' ),
    'archives'              => __( 'Archivo de textos', 'sj-CPT' ),
    'attributes'            => __( 'Atributos de texto', 'sj-CPT' ),
    'parent_item_colon'     => __( 'Texto padre:', 'sj-CPT' ),
    'all_items'             => __( 'Todos los textos', 'sj-CPT' ),
    'add_new_item'          => __( 'Añadir nuevo texto', 'sj-CPT' ),
    'add_new'               => __( 'Añadir nuevo', 'sj-CPT' ),
    'new_item'              => __( 'Nuevo texto', 'sj-CPT' ),
    'edit_item'             => __( 'Editar texto', 'sj-CPT' ),
    'update_item'           => __( 'Actualizar texto', 'sj-CPT' ),
    'view_item'             => __( 'Ver texto', 'sj-CPT' ),
    'view_items'            => __( 'Ver textos', 'sj-CPT' ),
    'Buscar_items'          => __( 'Buscar textos', 'sj-CPT' ),
  ];

  $cols_texto = [
    'post_author' => [
      'title'      => 'Post author',
      'post_field' => 'post_author',
    ],
    'fecha_pub' => [
			'title'       => 'Fecha pub',
			'meta_key'    => 'fecha_pub',
			'date_format' => 'd/m/Y'
		],
    'fecha' => [
			'title'       => 'Fecha',
			'post_field'    => 'post_date',
      'date_format' => 'd/m/Y'
		],
    'article-type' => [
      'taxonomy' => 'article-type'
    ],
    'go_to_slider' => array(
      'title'    => 'En portada',
      'meta_key' => 'go_to_slider',
    ),
    'despacho' => [
      'taxonomy' => 'despacho'
    ],
    'cat_texto' => [
      'taxonomy' => 'article-category'
    ],
  ];

  $supports_texto = [
    'author',
    'title',
    'editor',
    'excerpt',
    'thumbnail',
  ];

  $filters_texto = [
    'publicar' => [
			'title'    => 'Feed RSS',
			'taxonomy' => 'newsletter-category',
    ],
    'portada' => [
      'title'    => 'Slider portada',
      'meta_key' => 'go_to_slider',
    ],
    'despacho' => [
      'title'    => 'despacho',
      'taxonomy' => 'despacho'
    ],
    'cat-texto' => [
      'title'    => 'Cat texto',
      'taxonomy' => 'article-category',
    ],
  ];

  register_extended_post_type( 'text',
    [
      'show_in_rest' => true,
      'show_in_feed' => true,
      'labels'       => $labels_texto,
      'admin_cols'   => $cols_texto,
      'admin_filters'=> $filters_texto,
      'supports'     => $supports_texto,
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
      'plural'   => __( 'Categorias de texto', 'sj-CPT' ),
      'slug'     => 'text-category'
    ]
  );

  register_extended_taxonomy( 'article-type',
    [
      'text'
    ],
    [
      'meta_box' => 'radio',
      'hierarchical' => false,
     ],
     [
      'singular' => __( 'Tipo de texto', 'sj-CPT' ),
      'plural'   => __( 'Tipos de texto', 'sj-CPT' ),
      'slug'     => 'text-type'
     ]
  );

  // Sentencia cpt

  $labels_sentence = [
    'name'                  => _x( 'Sentencia', 'Post Type General Name', 'sj-CPT' ),
  	'singular_name'         => _x( 'Sentencia', 'Post Type Singular Name', 'sj-CPT' ),
  	'menu_name'             => __( 'Sentencias', 'sj-CPT' ),
  	'name_admin_bar'        => __( 'Sentencia', 'sj-CPT' ),
  	'archives'              => __( 'Archivo de sentencias', 'sj-CPT' ),
  	'attributes'            => __( 'Atributos de sentencia', 'sj-CPT' ),
  	'parent_item_colon'     => __( 'Parent Sentencia:', 'sj-CPT' ),
  	'all_items'             => __( 'Todas las sentencias', 'sj-CPT' ),
  	'add_new_item'          => __( 'Añadir nuevas sentencias', 'sj-CPT' ),
  	'add_new'               => __( 'Añadir nueva', 'sj-CPT' ),
  	'new_item'              => __( 'Nueva sentencia', 'sj-CPT' ),
  	'edit_item'             => __( 'Editar sentencia', 'sj-CPT' ),
  	'update_item'           => __( 'Actualizar sentencia', 'sj-CPT' ),
  	'view_item'             => __( 'Ver sentencia', 'sj-CPT' ),
  	'view_items'            => __( 'Ver sentencias', 'sj-CPT' ),
  	'Buscar_items'          => __( 'Buscar sentencias', 'sj-CPT' ),
  ];

  $cols_sentence = [
    'post_author' => [
      'title'      => 'Post author',
      'post_field' => 'post_author',
    ],
    'go_to_slider' => array(
      'title'    => 'En portada',
      'meta_key' => 'go_to_slider',
    ),
    'despacho' => [
      'taxonomy' => 'despacho'
    ],
    'cat-sentence' => [
      'title'    => 'Cat sentencia',
      'taxonomy' => 'sentence-category',
    ],
  ];

  $filters_sentence = [
    'portada' => [
      'title'    => 'Slider portada',
      'meta_key' => 'go_to_slider',
    ],
    'despacho' => [
      'title'    => 'despacho',
      'taxonomy' => 'despacho'
    ],
    'cat-sentence' => [
      'title'    => 'Cat sentencia',
      'taxonomy' => 'sentence-category',
    ],
  ];

  $supports_sentence = [
    'title',
  ];

  register_extended_post_type( 'sentence',
    [
      'show_in_rest' => true,
      'show_in_feed' => true,
      'labels'       => $labels_sentence,
      'admin_cols'   => $cols_sentence,
      'admin_filters'=> $filters_sentence,
      'supports'     => $supports_sentence,
    ]
  );

  register_extended_taxonomy( 'sentence-category',
  [
    'sentence',
  ],
  [
    'meta_box' => 'simple',
    'hierarchical' => false,
  ],
  [
    'singular' => __( 'Categoría de sentencia', 'sj-CPT' ),
    'plural'   => __( 'Categorías de sentencia', 'sj-CPT' ),
    'slug'     => 'sentence-category'
  ]
);

  // Noticia cpt (story)

  $labels_story = [
    'name'                  => _x( 'Noticias', 'Post Type General Name', 'sj-CPT' ),
  	'singular_name'         => _x( 'Noticia', 'Post Type Singular Name', 'sj-CPT' ),
  	'menu_name'             => __( 'Noticias', 'sj-CPT' ),
  	'name_admin_bar'        => __( 'Noticia', 'sj-CPT' ),
  	'archives'              => __( 'Archivo de noticias', 'sj-CPT' ),
  	'attributes'            => __( 'Atributo de noticia', 'sj-CPT' ),
  	'parent_item_colon'     => __( 'Noticia padre:', 'sj-CPT' ),
  	'all_items'             => __( 'Todas las noticias', 'sj-CPT' ),
  	'add_new_item'          => __( 'Añadir nueva noticia', 'sj-CPT' ),
  	'add_new'               => __( 'Añadir nueva', 'sj-CPT' ),
  	'new_item'              => __( 'Nueva noticia', 'sj-CPT' ),
  	'edit_item'             => __( 'Editar noticia', 'sj-CPT' ),
  	'update_item'           => __( 'Actualizar Noticia', 'sj-CPT' ),
  	'view_item'             => __( 'Ver noticia', 'sj-CPT' ),
  	'view_items'            => __( 'Ver noticias', 'sj-CPT' ),
  	'Buscar_items'          => __( 'Buscar noticia', 'sj-CPT' ),
  	'not_found'             => __( 'No encontrado', 'sj-CPT' ),
  	'not_found_in_trash'    => __( 'No encontrado en la papelera', 'sj-CPT' ),
  	'featured_image'        => __( 'Imagen destacada', 'sj-CPT' ),
  	'set_featured_image'    => __( 'Set featured image', 'sj-CPT' ),
  	'remove_featured_image' => __( 'Remove featured image', 'sj-CPT' ),
  	'use_featured_image'    => __( 'Use featured image', 'sj-CPT' ),
  	'insert_into_item'      => __( 'Insert into noticia', 'sj-CPT' ),
  	'uploaded_to_this_item' => __( 'Uploaded to this noticia', 'sj-CPT' ),
  	'items_list'            => __( 'Noticias list', 'sj-CPT' ),
  	'items_list_navigation' => __( 'Noticias list navigation', 'sj-CPT' ),
  	'filter_items_list'     => __( 'Filter stories list', 'sj-CPT' ),
  ];

  $cols_story = [
    'post_author' => [
      'title'      => 'Post author',
      'post_field' => 'post_author',
    ],
    'go_to_slider' => array(
      'title'    => 'En portada',
      'meta_key' => 'go_to_slider',
    ),
  ];

  $supports_story = [
    'author',
    'title',
    'editor',
    'excerpt',
    'thumbnail',
  ];

  register_extended_post_type( 'story',
    [
      'show_in_rest' => true,
      'show_in_feed' => true,
      'labels'       => $labels_story,
      'admin_cols'   => $cols_story,
      'admin_filters'=> $filters_texto,
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
      'singular' => __( 'Etiqueta de noticia', 'sj-CPT' ),
  		'plural'   => __( 'Etiquetas de noticia', 'sj-CPT' ),
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
      'singular' => __( 'Categoría de noticia', 'sj-CPT' ),
  		'plural'   => __( 'Categorías de noticia', 'sj-CPT' ),
      'slug'     => 'news-category'
    ]
  );

  // links cpt

  $labels_links = [
    'name'                  => _x( 'Enlaces', 'Post Type General Name', 'sj-CPT' ),
    'singular_name'         => _x( 'Enlace', 'Post Type Singular Name', 'sj-CPT' ),
    'menu_name'             => __( 'Enlaces', 'sj-CPT' ),
    'name_admin_bar'        => __( 'Enlace', 'sj-CPT' ),
    'archives'              => __( 'Archivo de enlaces', 'sj-CPT' ),
    'attributes'            => __( 'Atributo de enlace', 'sj-CPT' ),
    'parent_item_colon'     => __( 'Enlace padre:', 'sj-CPT' ),
    'all_items'             => __( 'Todos los enlaces', 'sj-CPT' ),
    'add_new_item'          => __( 'Añadir nuevo enlace', 'sj-CPT' ),
    'add_new'               => __( 'Añadir nuevo', 'sj-CPT' ),
    'new_item'              => __( 'Nuevo enlace', 'sj-CPT' ),
    'edit_item'             => __( 'Editar enlace', 'sj-CPT' ),
    'update_item'           => __( 'Actualizar enlace', 'sj-CPT' ),
    'view_item'             => __( 'Ver enlace', 'sj-CPT' ),
    'view_items'            => __( 'Ver enlaces', 'sj-CPT' ),
    'Buscar_items'          => __( 'Buscar enlace', 'sj-CPT' ),
  ];

  $cols_links = [
    'post_author',
  ];

  $supports_links = [
    'title',
    'thumbnail',
  ];

  register_extended_post_type( 'links',
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
      'singular' => __( 'Categoría de enlace', 'sj-CPT' ),
      'plural'   => __( 'Categorías de enlace', 'sj-CPT' ),
      'slug'     => 'link-category',
    ]
  );

  register_extended_taxonomy( 'newsletter-category',
    [
      'story',
      'text',
    ],
    [
      'meta_box' => 'radio',
      'hierarchical' => false,
    ],
    [
      'singular' => __( 'Categoría de newsletter', 'sj-CPT' ),
      'plural'   => __( 'Categorías de newsletter', 'sj-CPT' ),
      'slug'     => 'newsletter-category'
    ]
  );

  register_extended_taxonomy( 'despacho',
    [
      'story',
      'text',
      'sentence',
      'links',
    ],
    [
      'meta_box' => 'simple',
      'hierarchical' => false,
    ],
    [
      'singular' => __( 'Despacho', 'sj-CPT' ),
      'plural'   => __( 'Despachos', 'sj-CPT' ),
      'slug'     => 'despacho',
    ]
  );

}, 0 );
