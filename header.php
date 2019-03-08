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
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text"
            href="#content"><?php esc_html_e( 'Skip to content', 'ucsc-pbsci' ); ?></a>
			<?php get_template_part( 'template-parts/navigation', 'primary' );?>
        <header id="masthead" class="site-header">
            <div class="site-branding">
                <?php
			$hero = get_the_post_thumbnail_url();
			// var_dump($hero);
			if($hero){
			    echo '<div class="hero-page flex-wrap" style="background:url('.$hero.') no-repeat top; background-size: cover;">';}
			    else {
			        echo '<div class="hero-page flex-wrap">';
				}

			?>
				<div class="hero-page-runner">
                <div class="wrap flex-wrap">
				<header class="entry-header flex-wrap">
				<span class="entry-header-span-a">Science</span>
					<span class="entry-header-span-b flex-wrap"><h1>Impactful</h1><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></span>
					<span class="entry-header-span-c">From the microscopic to the unfathomable, UC Santa Cruz offers 37 high impact science degree programs that explore and study the inner secrets of the universe.</span>
	</header><!-- .entry-header -->

				</div><!-- .hero-home wrap -->
					</div>
            </div><!-- .site-branding -->
        </header><!-- #masthead -->

        <div id="content" class="site-content">