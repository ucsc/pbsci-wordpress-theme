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
        <a class="skip-link screen-reader-text"
            href="#content"><?php esc_html_e('Skip to content', 'ucsc-pbsci'); ?></a>
        <?php get_template_part('template-parts/navigation', 'primary'); ?>
        <header id="masthead" class="site-header">
            <div class="site-branding">
                <div class="no-hero flex-wrap">
                    <div class="header-runner">
                        <div class="wrap flex-wrap">
                            <header class="entry-header flex-wrap">
                                <div class="entry-header-right">
                                    <?php get_template_part('template-parts/breadcrumbs', 'head'); ?>
                                    <span class="entry-header-span-b flex-wrap">
                                        <?php single_post_title('<h1 class="entry-title">', '</h1>'); ?>
                                    </span>
                                </div>
                            </header><!-- .entry-header -->

                        </div><!-- .hero-home wrap -->
                    </div><!-- .header-runner -->

                </div><!-- .site-branding -->
        </header><!-- #masthead -->
        <div id="content" class="site-content">