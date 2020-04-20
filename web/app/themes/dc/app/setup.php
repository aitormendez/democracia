<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;
use function \Sober\Intervention\intervention;
use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * https://github.com/soberwp/intervention
 */
if (function_exists('\Sober\Intervention\intervention')) {
    // now you can use the function to call the required modules and their params
    // intervention('remove-menu-items', 'plugins', 'all');
    intervention('remove-customizer-items');
    intervention('remove-emoji');
    intervention('remove-howdy', 'Hola pringao');
    intervention('remove-dashboard-items', ['welcome', 'activity', 'incoming-links', 'news']);
    // intervention('remove-menu-items', ['posts', 'acf'], 'all');
}

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
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
        'primary_navigation' => __('Primary Navigation', 'sage')
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

    /**
     * responsive-embeds
     */
    add_theme_support('responsive-embeds');

    /**
     * load text domain
     */
    load_theme_textdomain('sage', get_template_directory() . '/lang');


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
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
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
* Posts por pág en noticias
*/
add_action('pre_get_posts', function ($query) {
    if ( ! is_admin() && is_post_type_archive( 'story' ) && $query->is_main_query() ) {
        $query->set( 'posts_per_page', 10 );
        return;
    }
});

/**
* Cargar todos los posts en tax external_type
*/
add_action('pre_get_posts', function ($query) {
    if ( ! is_admin() && is_tax( 'external_type' ) && $query->is_main_query() ) {
        $query->set( 'nopaging', true );
        return;
    }
});

/**
* Posts project
*/
add_action('pre_get_posts', function ($query) {
    if ( ! is_admin() && is_post_type_archive( 'project' ) && $query->is_main_query() ) {
        $query->set( 'posts_per_page', 20 );
        // $query->set('meta_key', 'fecha_proyecto' );
        // $query->set('orderby', 'meta_value_num');
        // $query->set('order', 'DESC');
        $query->set('tax_query', [
            [
                'taxonomy' => 'project_format',
                'field'    => 'slug',
                'terms'    => ['edition', 'edicion', 'comisariado', 'curatorship'],
                'operator' => 'NOT IN',
            ],
        ],);
        return;
    }
});
