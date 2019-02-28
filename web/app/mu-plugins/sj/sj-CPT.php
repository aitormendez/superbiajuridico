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
    'name'                  => _x( 'Texto', 'Post Type General Name', 'sj-CPT' ),
    'singular_name'         => _x( 'Texto', 'Post Type Singular Name', 'sj-CPT' ),
    'menu_name'             => __( 'Textos', 'sj-CPT' ),
    'name_admin_bar'        => __( 'Texto', 'sj-CPT' ),
    'archives'              => __( 'Archivo de textos', 'sj-CPT' ),
    'attributes'            => __( 'Atributos de texto', 'sj-CPT' ),
    'parent_item_colon'     => __( 'Texto padre:', 'sj-CPT' ),
    'all_items'             => __( 'Todos los textos', 'sj-CPT' ),
    'add_new_item'          => __( 'añadir nuevo texto', 'sj-CPT' ),
    'add_new'               => __( 'Añadir nuevo', 'sj-CPT' ),
    'new_item'              => __( 'Nuevo texto', 'sj-CPT' ),
    'edit_item'             => __( 'Editar texto', 'sj-CPT' ),
    'update_item'           => __( 'Actualizar texto', 'sj-CPT' ),
    'view_item'             => __( 'Ver texto', 'sj-CPT' ),
    'view_items'            => __( 'Ver textos', 'sj-CPT' ),
    'search_items'          => __( 'Buscar textos', 'sj-CPT' ),
    'not_found'             => __( 'No encontrado', 'sj-CPT' ),
    'not_found_in_trash'    => __( 'No encontrado en la basura', 'sj-CPT' ),
    'featured_image'        => __( 'Imagen destacada', 'sj-CPT' ),
    'set_featured_image'    => __( 'Establecer imagen destacada', 'sj-CPT' ),
    'remove_featured_image' => __( 'Eliminar imagen destacada', 'sj-CPT' ),
    'use_featured_image'    => __( 'Usar como imagen destacada', 'sj-CPT' ),
    'insert_into_item'      => __( 'Insertar en el item', 'sj-CPT' ),
    'uploaded_to_this_item' => __( 'Subido a este item', 'sj-CPT' ),
    'items_list'            => __( 'Lista de items', 'sj-CPT' ),
    'items_list_navigation' => __( 'Navegacion de la lista de items', 'sj-CPT' ),
    'filter_items_list'     => __( 'Filtrar lista de items', 'sj-CPT' ),
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

  // sentencia cpt

  $labels_sentence = [
    'name'                  => _x( 'Sentencias', 'Post Type General Name', 'sj-CPT' ),
  	'singular_name'         => _x( 'Sentencia', 'Post Type Singular Name', 'sj-CPT' ),
  	'menu_name'             => __( 'Sentencias', 'sj-CPT' ),
  	'name_admin_bar'        => __( 'Sentencia', 'sj-CPT' ),
  	'archives'              => __( 'Archivo de sentencias', 'sj-CPT' ),
  	'attributes'            => __( 'Atributos de sentencia', 'sj-CPT' ),
  	'parent_item_colon'     => __( 'Sentencia padre:', 'sj-CPT' ),
  	'all_items'             => __( 'Todas las sentencias', 'sj-CPT' ),
  	'add_new_item'          => __( 'Añadir nueva sentencia', 'sj-CPT' ),
  	'add_new'               => __( 'Añadir nueva', 'sj-CPT' ),
  	'new_item'              => __( 'Nueva sentencia', 'sj-CPT' ),
  	'edit_item'             => __( 'Editar sentencia', 'sj-CPT' ),
  	'update_item'           => __( 'Actualizar sentencia', 'sj-CPT' ),
  	'view_item'             => __( 'Ver sentencia', 'sj-CPT' ),
  	'view_items'            => __( 'Ver sentencias', 'sj-CPT' ),
  	'search_items'          => __( 'Buscar sentencias', 'sj-CPT' ),
  	'not_found'             => __( 'No encontrada', 'sj-CPT' ),
  	'not_found_in_trash'    => __( 'No encontrada en la papelera', 'sj-CPT' ),
  	'insert_into_item'      => __( 'Insertar en sentencia', 'sj-CPT' ),
  	'uploaded_to_this_item' => __( 'Subir a esta sentencia', 'sj-CPT' ),
  	'items_list'            => __( 'Lista de sentencias', 'sj-CPT' ),
  	'items_list_navigation' => __( 'Navecación de lista de sentencia', 'sj-CPT' ),
  	'filter_items_list'     => __( 'Filtrar lista de sentencias', 'sj-CPT' ),
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

  // noticia cpt (story)

  $labels_story = [
    'name'                  => _x( 'Noticias', 'Post Type General Name', 'sj-CPT' ),
  	'singular_name'         => _x( 'Noticia', 'Post Type Singular Name', 'sj-CPT' ),
  	'menu_name'             => __( 'Noticias', 'sj-CPT' ),
  	'name_admin_bar'        => __( 'Noticia', 'sj-CPT' ),
  	'archives'              => __( 'Archivo de noticias', 'sj-CPT' ),
  	'attributes'            => __( 'Atributos de noticia', 'sj-CPT' ),
  	'parent_item_colon'     => __( 'Noticia padre:', 'sj-CPT' ),
  	'all_items'             => __( 'Todas las noticias', 'sj-CPT' ),
  	'add_new_item'          => __( 'Añadir nueva noticia', 'sj-CPT' ),
  	'add_new'               => __( 'Añadir nueva', 'sj-CPT' ),
  	'new_item'              => __( 'Nueva noticia', 'sj-CPT' ),
  	'edit_item'             => __( 'Editar noticia', 'sj-CPT' ),
  	'update_item'           => __( 'Actualizar noticia', 'sj-CPT' ),
  	'view_item'             => __( 'Ver noticia', 'sj-CPT' ),
  	'view_items'            => __( 'Ver noticias', 'sj-CPT' ),
  	'search_items'          => __( 'Buscar noticia', 'sj-CPT' ),
  	'not_found'             => __( 'No encontrado', 'sj-CPT' ),
  	'not_found_in_trash'    => __( 'No encontrado en la papelera', 'sj-CPT' ),
  	'featured_image'        => __( 'Imagen destacada', 'sj-CPT' ),
  	'set_featured_image'    => __( 'Establecer imagen destacada', 'sj-CPT' ),
  	'remove_featured_image' => __( 'Eliminar imagen destacada', 'sj-CPT' ),
  	'use_featured_image'    => __( 'Usar como imagen destacada', 'sj-CPT' ),
  	'insert_into_item'      => __( 'Insertar en la noticia', 'sj-CPT' ),
  	'uploaded_to_this_item' => __( 'Subido a esta noticia', 'sj-CPT' ),
  	'items_list'            => __( 'Lista de noticias', 'sj-CPT' ),
  	'items_list_navigation' => __( 'Navegación de lista de noticias', 'sj-CPT' ),
  	'filter_items_list'     => __( 'Filtrar lista de noticias', 'sj-CPT' ),
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
      'singular' => __( 'Categoría de noticia', 'sj-CPT' ),
  		'plural'   => __( 'Categorías de noticia', 'sj-CPT' ),
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
	'search_items'          => __( 'Buscar enlace', 'sj-CPT' ),
	'not_found'             => __( 'No encontrado', 'sj-CPT' ),
	'not_found_in_trash'    => __( 'No encontrado en la papelera', 'sj-CPT' ),
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
    'singular' => __( 'Categoría de enlace', 'sj-CPT' ),
    'plural'   => __( 'Categorías de enlace', 'sj-CPT' ),
    'slug'     => 'link-category'
  ]
);

}, 0 );
