<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;
use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key=' . 'AIzaSyBsyHHL-08gdVPybnyZPPE56fk6WTIXC4c', [], null, true);
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    $sj_data = array(
        'homeUrl' => get_bloginfo( 'url' ),
        'sjLogoMarker' => basename(\App\asset_path('images/sj-logo-marker.png')),
    );

    wp_localize_script('sage/main.js', 'sj', $sj_data);
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Menú principal', 'sage'),
        'footer_navigation' => __('Menú pie', 'sage'),
        'lang_navigation' => __('Menu lenguaje', 'sage'),
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Principal', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Pie', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});

/**
 * pasar datos a JS
 * https://discourse.roots.io/t/wp-localize-script-not-working-in-sage-9/11282/3
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);
    $sj_data = array(
        'homeUrl' => get_bloginfo( 'url' ),
        'sjLogoMarker' => basename(\App\asset_path('images/sj-logo-marker.png')),
        'sjLogoMarkerPath' => \App\asset_path('images/sj-logo-marker.png'),
    );

    wp_localize_script('sage/main.js', 'sj', $sj_data);
}, 100);

/**
 * image sizes
 */
add_image_size( 'very-large', 2000 );


/**
 * Cambiar títulos sentencias
 */

 function actualizar_titulo_sentencia($post_id) {
   $post_type = get_post_type($post_id);
   if ($post_type == 'sentence') {
       $nombre = get_field('nombre', $post_id);
       $sentencia_no = get_field('sentencia_no', $post_id);
       $tribunal = get_field('tribunal', $post_id);
       $fecha = get_field('fecha', $post_id, false);
       $fecha_datetime = new \DateTime($fecha);
       $anio = $fecha_datetime->format('Y');
       $fecha_titulo =  $fecha_datetime->format('j-n-Y');

       if ($sentencia_no == '') {
           $new = $tribunal . ' ' . $fecha_titulo;
       } else {
           $new = $tribunal . ' ' . $sentencia_no . '/' . $anio;
       }
       if (!'' == $nombre) {
           $new = $new . ' ' . $nombre;
       }

       $my_post = array(
         'ID' => $post_id,
         'post_title'   => $new,
       );
       remove_action( 'acf/save_post', 'actualizar_titulo_sentencia', 10, 1 );
       wp_update_post( $my_post );
       add_action( 'acf/save_post', 'actualizar_titulo_sentencia', 10, 1 );
   }
 }
 add_action( 'acf/save_post', __NAMESPACE__ .'\\actualizar_titulo_sentencia', 10, 1 );

 /**
 * Initialize ACF Builder
 */
add_action('init', function () {
    collect(glob(config('theme.dir').'/app/fields/*.php'))->map(function ($field) {
        return require_once($field);
    })->map(function ($field) {
        if ($field instanceof FieldsBuilder) {
            acf_add_local_field_group($field->build());
        }
    });
});

/**
 * cargar texdomain
 */
add_action('after_setup_theme', function () {
    load_theme_textdomain('sage', get_template_directory() . '/lang');
});
