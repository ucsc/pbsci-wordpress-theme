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

/*
 *
 */
require get_template_directory() . '/inc/post-types.php';
require get_template_directory() . '/inc/shortcodes.php';


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
         * Add new image sizes
         */
        add_image_size('page-hero', 1600, 530, false);
        add_image_size('home-grid', 560, 315, true);
        add_image_size('filterable-thumb', 720, 248, true);
	    add_image_size('news-thumb', 360, 240, true);

	    /**
         * Register nav menu locations
         * this theme uses wp_nav_menu() in three location.
         */
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'ucsc-pbsci'),
            'menu-2' => esc_html__('Impactful Research', 'ucsc-pbsci'),
            'menu-3' => esc_html__('Impactful Academics', 'ucsc-pbsci'),
            'menu-global' => esc_html__('Global Header Menu', 'ucsc-pbsci'),
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
// function ucsc_pbsci_modify_jquery()
// {
//     if (!is_admin()) {
//         // deregister WordPress JQuery
//         wp_deregister_script('jquery');
//         //register and enqueue jquery
//         wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', null, true); // register the external file
//         wp_enqueue_script('jquery'); // enqueue the external file
//     }
// }
// add_action('init', 'ucsc_pbsci_modify_jquery');

add_action( 'wp_enqueue_scripts', function(){
    if (is_admin()) return; // don't dequeue on the backend
    wp_deregister_script( 'jquery' );
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', null, true); // register the external file
        wp_enqueue_script('jquery'); // enqueue the external file
});
/**
 * Enqueue scripts and styles.
 */
function ucsc_pbsci_scripts()
{
    wp_enqueue_style( 'ucsc-pbsci-style', get_stylesheet_uri(), [], null );
    // wp_enqueue_script( 'ucsc-pbsci-navigation', get_template_directory_uri() . '/js/navigation.js', [], null, true );
    wp_enqueue_script('ucsc-pbsci-navigation-2', get_template_directory_uri() . '/js/navigation2.js', [], null, true);
    wp_enqueue_script('ucsc-pbsci-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', [], null, true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    // Enqueue custom Localist widget script
    wp_enqueue_script('localist-widget-fix', get_template_directory_uri() . '/js/localist-widget-fix.js', [], null, true);
    //Enqueue FontAwesome
    wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css');
    //Enqueue list.js
    wp_enqueue_script('listJS', '//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js');
    //Enqueue Google Fonts
    wp_enqueue_style('roboto-condensed-garamond', 'https://fonts.googleapis.com/css?family=EB+Garamond:400,500,700|Roboto+Condensed:300,400,700|Roboto:300,400,600,700', array(), false);
    // Back To Top
    wp_enqueue_script('back-to-top', get_template_directory_uri() . '/js/back-to-top.js', [], null, true);

    // Enqueue <span></span> adder
    // wp_enqueue_script( 'span-adder', get_template_directory_uri() . '/js/span-add.js', [], null, true );
    //Enqueue Flexslider and its parts on home page
    if (is_page_template('template-homepage.php')) {
        //main Flexslider js
        wp_enqueue_script('flexslider', get_template_directory_uri() . '/flexslider/jquery.flexslider-min.js', '', null, true);
        //main Flexslider css
        wp_enqueue_style('flexstyles', get_template_directory_uri() . '/flexslider/flexslider.css');
        //Home custom slider/carousel js
        wp_enqueue_script('homeflex', get_template_directory_uri() . '/js/flex-home.js', [], null);
        //scroll-to-here js
        // wp_enqueue_script('scroll-to-here', get_template_directory_uri() . '/js/home-page-scroll-to-here.js', [], null, true);
    }
    // Enqueue custom Majors front end script
    if (is_singular() && ('degree' === get_post_type())) {
        wp_enqueue_script('majors-front', get_template_directory_uri() . '/js/majors-front.js', [], null, true);
    }
    // Enqueue degree parse script --- temporary
    if (is_page(array('degrees', 'support', 'faculty-researchers', 'student-research-opportunities', 'institutes-and-centers', 'student-support', 'research-groups-facilities'))) {
        wp_enqueue_script('filter-js', get_template_directory_uri() . '/js/filter.js', [], null, true);
    }
    if ( (is_singular() && ('department' === get_post_type()) ) || (is_page_template('template-alt-homepage.php'))) {
        wp_enqueue_script('slick-js', get_template_directory_uri() . '/slick/slick.js', array('jquery'), null, true);
        wp_enqueue_script('hero-carousel', get_template_directory_uri() . '/js/hero-carousel.js', array('slick-js'), null, true);
        wp_enqueue_style('slick-css', get_template_directory_uri() . '/slick/slick.css');
        wp_enqueue_style('slick-theme', get_template_directory_uri() . '/slick/slick-theme.css');
    }

    wp_enqueue_script('isotope', get_template_directory_uri() . '/js/isotope.js', '', null, true);
    wp_enqueue_script('select2', get_template_directory_uri() . '/js/select2.js', '', null, true);
    wp_enqueue_script('filters', get_template_directory_uri() . '/js/filters.js', '', null, true);

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
 * Conditionally Override Yoast SEO Breadcrumb Trail
 * http://plugins.svn.wordpress.org/wordpress-seo/trunk/frontend/class-breadcrumbs.php
 * -----------------------------------------------------------------------------------
 */

add_filter('wpseo_breadcrumb_links', 'ucsc_underscore_override_yoast_breadcrumb_trail');

function ucsc_underscore_override_yoast_breadcrumb_trail($links)
{
    global $post;

    if (is_singular('post') || is_archive()) {
        $breadcrumb[] = array(
            'url' => get_permalink(get_option('page_for_posts')),
            // 'text' => 'News',
            'text' => get_the_title(get_option('page_for_posts')),
        );

        array_splice($links, 1, -2, $breadcrumb);
    }

    return $links;
}

/*
 * Remove the last breadcrumb, the post name, from the Yoast SEO breadcrumbs
 * Credit: Jason @ http://thejasonjones.com/wordpress-seo-breadcrumbs-tweaks/
 * Last Tested: Jun 11 2018 using Yoast SEO 7.6.1 on WordPress 4.9.6
 */
// add_filter( 'wpseo_breadcrumb_links', 'ucsc_breadcrumb_remove_postname' );
// function ucsc_breadcrumb_remove_postname( $links ) {
// 	if( sizeof($links) > 1 ){
// 		array_pop($links);
// 	}
// 	return $links;
// }

/**
 * Add a class to "the_excerpt"
 */
add_filter("the_excerpt", "ucsc_underscore_add_class_to_excerpt");
function ucsc_underscore_add_class_to_excerpt($excerpt)
{
    return str_replace('<p', '<p class="pbsci-excerpt"', $excerpt);
}
/**
 * add page title slug to body class and add body class to custom post types
 */
add_filter('body_class', 'ucsc_underscore_body_classes');
function ucsc_underscore_body_classes($classes)
{
    global $post;
    if (isset($post)) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    if ((isset($post)) && (is_singular(array('department','degree','academic-support','student-support','studentopportunities','institutes-centers')))) {
        $classes[] = 'cpt';
    }
    if (get_theme_mod('alternate_header_style_active', 0)) {
        $classes[] = 'alternate-header';
    }
    return $classes;
}
/**
 * disable Gutenberg Editor
 */
add_filter('use_block_editor_for_post', '__return_false', 10);

/**
 * enable excerpts on pages
 */
add_post_type_support('page', 'excerpt');
/**
 * Hide Content editor on specific pages.
 *
 */
add_action('admin_init', 'ucsc_underscore_hide_editor');
function ucsc_underscore_hide_editor()
{
    // Get the Post ID.
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
    if (!isset($post_id)) return;
    // Hide the editor on the page titled 'Homepage'
    $pagename = get_the_title($post_id);
    if ( in_array($pagename, array('Student Support', 'Degrees', 'Departments', 'Faculty &#038; researchers', 'Research groups &#038; facilities', 'Student research opportunities')) ){
        remove_post_type_support('page', 'editor');
    }
    $template_file = get_post_meta($post_id, '_wp_page_template', true);
    if($template_file == 'template-alt-homepage.php'){ // the filename of the page template
        remove_post_type_support('page', 'editor');
    }

/**
 * Redirect Custom Post Type Archives to their page
 *
 */
}
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
    if (count($excerpt) > $num) {
        array_pop($excerpt);
    }
    $excerpt = implode(" ", $excerpt);
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

/**
 * CUSTOM HOOKS
 */

function ucsc_header()
{
    do_action('ucsc_header');
}
function ucsc_before_header()
{
    do_action('ucsc_before_header');
}
function ucsc_after_header()
{
    do_action('ucsc_after_header');
}

// filter to show caption, if available, on thumbnail, wrapped with '.wp-caption thumb-caption' div;
// show just the thumbnail otherwise

is_singular('post'); {

    add_filter('post_thumbnail_html', 'ucsc_add_post_thumbnail_caption', 10, 5);
}

function ucsc_add_post_thumbnail_caption($html, $post_id, $post_thumbnail_id, $size, $attr)
{

    if ($html == '') {

        return $html;
    } else {

        $out = '';

        $thumbnail_image = get_posts(array('p' => $post_thumbnail_id, 'post_type' => 'attachment'));

        if ($thumbnail_image && isset($thumbnail_image[0])) {

            $image = wp_get_attachment_image_src($post_thumbnail_id, $size);

            if ($thumbnail_image[0]->post_excerpt)
                $out .= '<div class="wp-caption thumb-caption">';

            $out .= $html;

            if ($thumbnail_image[0]->post_excerpt)
                $out .= '<p class="wp-caption-text thumb-caption-text">' . $thumbnail_image[0]->post_excerpt . '</p></div>';
        }

        return $out;
    }
}

//archive title

add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('Category: ', false);
    }
    if (is_tag()) {
        $title = single_cat_title('Topic: ', false);
    }

    return $title;
});

/**
 * @param [type] $num
 * @return void
 * Add Social Media Sharing buttons
 * https://gist.github.com/sciita/43af3f73bc7a0d25c793d8f6e5cba990
 * https://wpvkp.com/add-social-media-sharing-buttons-to-wordpress-without-plugin/
 * @license GNU General Public License 2.0+
 * TODO Make this a plugin
 */
// Function to handle the thumbnail request
function get_the_post_thumbnail_src($img)
{
    return (preg_match('~\bsrc="([^"]++)"~', $img, $matches)) ? $matches[1] : '';
}
function ucsc_underscore_social_buttons($content)
{
    global $post;
    if (is_singular() || is_home()) {

        // Get current page URL
        $sb_url = urlencode(get_permalink());

        // Get current page title
        $sb_title = str_replace(' ', '%20', get_the_title());

        // Get Post Thumbnail for pinterest
        $sb_thumb = get_the_post_thumbnail_src(get_the_post_thumbnail());

        // Construct sharing URL without using any script
        $twitterURL = 'https://twitter.com/intent/tweet?text=' . $sb_title . '&amp;url=' . $sb_url;
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u=' . $sb_url;
        $bufferURL = 'https://bufferapp.com/add?url=' . $sb_url . '&amp;text=' . $sb_title;
        $redditURL = 'https://www.reddit.com/submit?url=' . $sb_url . '&amp;text=' . $sb_title . '&amp;ref=share';
        $whatsappURL = 'whatsapp://send?text=' . $sb_title . ' ' . $sb_url;
        $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $sb_url . '&amp;title=' . $sb_title;

        if (!empty($sb_thumb)) {
            $pinterestURL = 'https://pinterest.com/pin/create/button/?url=' . $sb_url . '&amp;media=' . $sb_thumb[0] . '&amp;description=' . $sb_title;
        } else {
            $pinterestURL = 'https://pinterest.com/pin/create/button/?url=' . $sb_url . '&amp;description=' . $sb_title;
        }

        // Based on popular demand added Pinterest too
        $pinterestURL = 'https://pinterest.com/pin/create/button/?url=' . $sb_url . '&amp;media=' . $sb_thumb[0] . '&amp;description=' . $sb_title;
        $gplusURL = 'https://plus.google.com/share?url=' . $sb_title . '';

        // Add sharing button at the end of page/page content
        // $content .= '<div class="social-sharing bottom">';
        $content .= '<a class="fab fa-twitter" href="' . $twitterURL . '" target="_blank" rel="nofollow"></a>';
        $content .= '<a class="fab fa-facebook" href="' . $facebookURL . '" target="_blank" rel="nofollow"></a>';
        $content .= '<a class="fab fa-linkedin" href="' . $linkedInURL . '" target="_blank" rel="nofollow"></a>';
        $content .= '<a class="fab fa-reddit" href="' . $redditURL . '" target="_blank" rel="nofollow"></a>';
        // $content .= '</div>';

        return $content;
    } else {
        // if not a post/page then don't include sharing button
        return $content;
    }
};
// Enable the_content if you want to automatically show social buttons below your post.

// add_filter('the_content', 'wpvkp_social_buttons');

// This will create a wordpress shortcode [social].
// Please it in any widget and social buttons appear their.
// You will need to enabled shortcode execution in widgets.
add_shortcode('social', 'ucsc_underscore_social_buttons');

/**
 * Helper function to detect presence of custom logo.
 *
 * @return bool
 */
function ucsc_has_custom_logo() {
    return !! get_theme_mod( 'custom_logo' );
}

/**
 * Custom output for the customizer define theme logo.
 *
 * @link https://codex.wordpress.org/Theme_Logo
 *
 * @return string
 */
function ucsc_the_custom_logo_url( $size = 'full' ) {
    $url = '';
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    if ( $custom_logo_id ) {
        $url = wp_get_attachment_image_url( $custom_logo_id , $size );
    }
    return esc_url( $url );
}

/**
 * Breadcrumbs
 * 
 * @link https://github.com/justintadlock/breadcrumb-trail
 */
function ucsc_breadcrumb_trail_args( $args ) {
    $args['show_browse'] = false;
    $args['show_on_front'] = false;
    $args['separator'] = '';
    $args['post_taxonomy']['post'] = 'category';
    $args['post_taxonomy']['labs'] = 'researcher-faculty-labs';
    $args['post_taxonomy']['labs'] = 'research-area-expertise-tax';
    $args['post_taxonomy']['studentopportunities'] = 'student-opportunities-tax';
    $args['post_taxonomy']['studentopportunities'] = 'student-opp-avail-tax';
    $args['post_taxonomy']['studentopportunities'] = 'student-opp-eligib-tax';
    $args['post_taxonomy']['student-support'] = 'student-support-tax';
    $args['post_taxonomy']['institutes-centers'] = 'resesarch-group-location-tax';
    $args['post_taxonomy']['support-science'] = 'support-science-cat';
    $args['post_taxonomy']['support-science'] = 'support-science-int';

    return $args;
}
add_filter( 'breadcrumb_trail_args', 'ucsc_breadcrumb_trail_args' );

/**
 * Implement hook breadcrumb_trail_items();
 * @link https://github.com/justintadlock/breadcrumb-trail
 *
 * Allow site admins to alter breadcrumbs. The UI for this is in "Theme Options" ACF fields.
 * The reason for this approach is because there is no predictable way to know what the
 * desired breadcrumb path/hierarchy should be, so we may as well let the admins decide.
 *
 * If this theme removes the use of the breadcrumb_trail plugin in the future, this
 * functionality can be removed.
 *
 * @param array $items
 * @return array
 */
add_filter( 'breadcrumb_trail_items', function( $items ) {
	$replacements = get_field( 'breadcrumb_adjustments', 'options' );
	if ( empty( $replacements ) || count( $replacements ) < 1 ) {
		return $items;
	}

	$searches = array_column( $replacements, 'search' );
	$searches = array_map( function( $string ) {
		return '/'.trim( $string, '/' ).'/';
	}, $searches );

	foreach( $items as $item_index => $item ) {
		foreach( $searches as $search_index => $search ) {
			// Match at the end of the link href to ensure we have an exact path match
			// and not a partial path match.
			$pattern = '/'.preg_quote( $search, '/' ).'"/';
			if ( preg_match( $pattern, $item ) ) {
				$replacement = $replacements[ $search_index ];
				// If text is provided, we need to replace the entire link
				if ( !empty( $replacement['replace_text'] ) ) {
					$items[ $item_index ] = "<a href='{$replacement['replace_url']}'>{$replacement['replace_text']}</a>";
				}
				// If no text is provided, just string replace, hoping to get the url the URL.
				else {
					$items[ $item_index ] = str_replace( $search, $replacement['replace_url'], $item );
				}

				break;
			}
		}
	}

	return $items;
} );

function ucsc_make_slug($string) {
	return preg_replace("/[^a-z0-9]/", "", str_replace(' ', '-', strtolower($string)));
}

/**
 * Cache busting to get updated versions of js and css
 *
 * @link https://www.recolize.com/en/blog/wordpress-cache-busting-design-changes/
 * @param string $src
 *
 * @return string
 */
function set_custom_ver_css_js($src) {
    // Don't touch admin scripts.
    if (is_admin()) {
        return $src;
    }

    $_src = $src;
    if (strpos($_src, '//') === 0) {
        $_src = 'http:' . $_src;
    }

    $_src = parse_url($_src);

    // Give up if malformed URL.
    if (false === $_src) {
        return $src;
    }

    // Check if it's a local URL.
    $wordPressUrl = parse_url(home_url());
    if (isset($_src['host']) && $_src['host'] !== $wordPressUrl['host']) {
        return $src;
    }

    $filePath = ABSPATH . $_src['path'];
	$theme = wp_get_theme();
	if (file_exists($filePath) && strpos($src, $theme->get_stylesheet_directory_uri()) !== false) {
        $src = add_query_arg('ver', filemtime($filePath), $src);
    }

    return $src;
}

function css_js_versioning() {
    add_filter('style_loader_src', 'set_custom_ver_css_js', 9999);
    add_filter('script_loader_src', 'set_custom_ver_css_js', 9999);
}

add_action('init', 'css_js_versioning');
