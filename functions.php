<?php

/**
 * UCSC_PBSci functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package UCSC_PBSci
 */

define('THEMEROOT', get_stylesheet_directory_uri());
define('TEMPLATE', get_template_directory_uri());
define('IMAGES', THEMEROOT . '/images');

if (!function_exists('ucsc_pbsci_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function ucsc_pbsci_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on UCSC_PBSci, use a find and replace
         * to change 'ucsc-pbsci' to the name of your theme in all the template files.
         */
        load_theme_textdomain('ucsc-pbsci', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        /**
         * Register nav menu locations
         * this theme uses wp_nav_menu() in three location.
         */
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'ucsc-pbsci'),
            'menu-2' => esc_html__('Impactful Research', 'ucsc-pbsci'),
            'menu-3' => esc_html__('Impactful Academics', 'ucsc-pbsci'),
        ));
        /**
         * Restrict Impctful Research and Impactful Academics
         * menus to only three top-level items
         * like this: https://www.isitwp.com/limit-amount-of-menu-items/
         * note: does not currently appear to work
         */
        add_filter('wp_nav_menu_objects', 'ucsc_pbsci_menufilter', 10, 2);
        function ucsc_pbsci_menufilter($items, $args)
        {
            if (($args->theme_location == 'menu-2')) {
                $toplinks = 0;
                foreach ($items as $k => $v) {
                    if ($v->menu_item_parent == 0) {
                        // count how many top-level links we have so far...
                        $toplinks++;
                    }
                    // if we've passed our max # ...
                    if ($toplinks > 3) {
                        unset($items[$k]);
                    }
                }
            }
            return $items;
        }
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('ucsc_pbsci_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'ucsc_pbsci_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */        // This theme uses wp_nav_menu() in three locations.
function ucsc_pbsci_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('ucsc_pbsci_content_width', 640);
}
add_action('after_setup_theme', 'ucsc_pbsci_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ucsc_pbsci_widgets_init()
{
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'ucsc-pbsci'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'ucsc-pbsci'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer One', 'ucsc-pbsci'),
        'id'            => 'footer-sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'ucsc-pbsci'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Footer Two', 'ucsc-pbsci'),
        'id'            => 'footer-sidebar-2',
        'description'   => esc_html__('Add widgets here.', 'ucsc-pbsci'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Footer Three', 'ucsc-pbsci'),
        'id'            => 'footer-sidebar-3',
        'description'   => esc_html__('Add widgets here.', 'ucsc-pbsci'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'ucsc_pbsci_widgets_init');

/**
 * Add new image sizes
 */
add_image_size('page-hero', 1905, 430, true);

/**
 * Register new image sizes for Add Media modal
 */
add_filter('image_size_names_choose', 'ucsc_pbsci_custom_sizes');
function ucsc_pbsci_custom_sizes($sizes)
{
    return array_merge($sizes, array(
        'page-hero' => __('Hero Image'),
    ));
}

/**
 * Deregister WordPress JQuery and register Google JQuThese are some wordsery library
 */

function ucsc_pbsci_modify_jquery()
{
    if (!is_admin()) {
        // deregister WordPress JQuery
        wp_deregister_script('jquery');
        //register and enqueue jquery
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', null, true); // register the external file
        wp_enqueue_script('jquery'); // enqueue the external file
    }
}

add_action('init', 'ucsc_pbsci_modify_jquery');

/**
 * Enqueue scripts and styles.
 */
function ucsc_pbsci_scripts()
{
    wp_enqueue_style('ucsc-pbsci-style', get_stylesheet_uri());

    // wp_enqueue_script( 'ucsc-pbsci-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

    wp_enqueue_script('ucsc-pbsci-navigation-2', get_template_directory_uri() . '/js/navigation2.js', array(), '', true);

    wp_enqueue_script('ucsc-pbsci-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    // Enqueue custom Localist widget script
    wp_enqueue_script('localist-widget-fix', get_template_directory_uri() . '/js/localist-widget-fix.js', '', null, true);
    //Enqueue FontAwesome
    wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css');

    //Enqueue Vue.js
    //Development Version
    wp_enqueue_script('vue', 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js');
    // Production Version
    // wp_enqueue_script('vue', 'https://cdn.jsdelivr.net/npm/vue');

    //Enqueue Google Fonts
    wp_enqueue_style('roboto-condensed-garamond', 'https://fonts.googleapis.com/css?family=EB+Garamond:400,500,700|Roboto+Condensed:300,400,700|Roboto:300,400,500,700', array(), false);
    // Enqueue <span></span> adder
    // wp_enqueue_script( 'span-adder', get_template_directory_uri() . '/js/span-add.js', '',null, true );
    //Enqueue Flexslider and its parts on home page
    if (is_front_page()) {
        //main Flexslider js
        wp_enqueue_script('flexslider', get_template_directory_uri() . '/flexslider/jquery.flexslider-min.js', '', null, true);
        //main Flexslider css
        wp_enqueue_style('flexstyles', get_template_directory_uri() . '/flexslider/flexslider.css');
        //Home custom slider/carousel js
        wp_enqueue_script('homeflex', get_template_directory_uri() . '/js/flex-home.js');
        //scroll-to-here js
        wp_enqueue_script('scroll-to-here', get_template_directory_uri() . '/js/home-page-scroll-to-here.js', '', null, true);
    }
    // Enqueue degree panel toggle script
    if (is_page('104')) {
        wp_enqueue_script('panel-toggle', get_template_directory_uri() . '/js/majors-blurb-toggle.js', '', null, true);
    }

    // Enqueue custom Majors front end script
    if (is_singular() && ('degree' === get_post_type())) {
        wp_enqueue_script('majors-front', get_template_directory_uri() . '/js/majors-front.js', '', null, true);
    }

    // Enqueue degree parse script --- temporary
    if (is_page('degrees') || is_page('newsroom')) {
        wp_enqueue_script('test-js', get_template_directory_uri() . '/js/test.js', '', null, true);
    }
}
add_action('wp_enqueue_scripts', 'ucsc_pbsci_scripts');


/**
 * Theme Options -- Admin Page
 */
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'     => 'Theme Options',
        'menu_title'     => 'Theme Options',
        'menu_slug'     => 'theme-options',
        'capability'     => 'edit_posts',
        'icon_url' => 'dashicons-palmtree',
        'redirect'     => false
    ));
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * add page title slug to body class
 */

add_filter('body_class', 'ucsc_underscore_body_classes');
function ucsc_underscore_body_classes($classes)
{
    global $post;
    if (isset($post)) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}

/**
 * enable excerpts on pages
 */
add_post_type_support('page', 'excerpt');

/**
 * @param [type] $num
 * @return void
 * Change Excerpt Length
 * https://wordpress.stackexchange.com/questions/1567/best-collection-of-code-for-your-functions-php-file/6225#6225
 * @license GNU General Public License 2.0+
 */
function ucsc_underscore_custom_excerpt($num)
{
    $limit = $num + 1;
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    array_pop($excerpt);
    $excerpt = implode(" ", $excerpt)
        /**."... (<a href='" .get_permalink($post->ID) ." '>Read more</a>)"*/
    ;
    echo $excerpt;
}
/**
 * ADVANCED CUSTOM FIELDS
 *
 * Set of Functions related to ACF
 * @package
 * @since
 * @author Jason Chafin
 * @link http://www.blackbirdconsult.com
 * @license GNU General Public License 2.0+
 */

/** format values on ACF text field to return shortcode */
function ucsc_underscore_acf_format_value($value, $post_id, $field)
{
    // run do_shortcode on all textarea values
    $value = do_shortcode($value);
    // return
    return $value;
}

add_filter('acf/format_value/type=textarea', 'ucsc_underscore_acf_format_value', 10, 3);

// Enable the option show in rest
add_filter('acf/rest_api/field_settings/show_in_rest', '__return_true');

// Enable the option edit in rest
add_filter('acf/rest_api/field_settings/edit_in_rest', '__return_true');

// Custom REST API endpoints.
//Requires [acf-to-rest-api](https://github.com/airesvsg/acf-to-rest-api)
//also uses https://clarencepearson.com/advanced-custom-fields-rest-api/

function ucsc_underscore_degrees_endpoint($request_data)
{

    // setup query argument
    $args = array(
        'post_type' => 'degree',
    );

    // get posts
    $posts = get_posts($args);

    // add custom field data to posts array
    foreach ($posts as $key => $post) {
        $posts[$key]->acf = get_fields($post->ID);
        $posts[$key]->link = get_permalink($post->ID);
        $posts[$key]->image = get_the_post_thumbnail_url($post->ID);
    }
    return $posts;
}

// register the endpoint
add_action('rest_api_init', 'ucsc_underscore_register_degree_rest_route');


function ucsc_underscore_register_degree_rest_route()
{
    register_rest_route(
        'degree_endpoint/v1',
        '/degree/',
        array(
            'methods' => 'GET',
            'callback' => 'ucsc_underscore_degrees_endpoint',
        )
    );
}