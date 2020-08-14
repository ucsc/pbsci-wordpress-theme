<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package UCSC_PBSci
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'ucsc-pbsci'); ?></a>
        <?php
            ucsc_before_header();
            // See if there is an active alert bar
            if (get_theme_mod('alert_bar_active', 0)) {
                get_template_part('template-parts/alert-bar');
            }
        // Swap nagivation template if alternate header is used.
            if (get_theme_mod('alternate_header_style_active', 0)) {
                get_template_part('template-parts/navigation', 'alternate');
            }
            else {
                get_template_part('template-parts/navigation', 'primary');
            }
            if ( !(is_front_page() ) ) {
	            get_template_part( 'template-parts/breadcrumbs' );
            }
            // Swap out hero section based on current query context.
            if (is_archive()) {
                get_header('archive');
            }
            else if (is_search()) {
                get_header('utility');
            }
            else if (in_array(get_post_type(), array('studentopportunities', 'student-support', 'institutes-centers', 'labs', 'support-science'))) {
                get_header('utility');
            }
            else if ('department' === get_post_type()) {
                get_header('department');
            }
            else if ('post' === get_post_type()) {
                get_header('blog');
            }
            else if (is_page_template('template-homepage.php')) {
                get_header('home');
            }
            else if (is_page_template('template-alt-homepage.php')) {
                get_header('home-alt');
            }
            else {
                get_header('default');
            }
        ?>
        <div id="content" class="site-content">