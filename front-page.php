<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UC_Santa_Cruz
 */

get_header();

echo '<div id="primary" class="content-area"><main id="main" class="site-main"><div class="row">';
    get_template_part('template-parts/slider','home');
echo '</div></main><!-- #main -->';

get_template_part('template-parts/homepanel','top');
 //get_template_part('template-parts/homepanel','two');
        
get_template_part('template-parts/homepanel','bottom');
echo '</div><!-- #primary -->';

get_footer();