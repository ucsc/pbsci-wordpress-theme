<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package UC_Santa_Cruz
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ucsc-underscore' ); ?></a>

	<header id="masthead" class="site-header main-header">
		<div class="site-branding row names">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<div class="secondary-name">
				<h1 class="site-title title-medium"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<a class="mobile-menu" href="#mainNav"></a>
				</div>
				<?php
			else :
				?>
				<div class="secondary-name">
				<p class="site-title title-medium"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<a class="mobile-menu" href="#mainNav"></a>
				</div>
				<?php
			endif;
			$ucsc_underscore_description = get_bloginfo( 'description', 'display' );
			if ( $ucsc_underscore_description || is_customize_preview() ) :
				?>
				<!-- <p class="site-description"><?php echo $ucsc_underscore_description; /* WPCS: xss ok. */ ?></p> -->
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'ucsc-underscore' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				'menu_class'	=>	'main-navigation',
				'items_wrap'	=>	'<ul id="MENU-ID" class="MENU-CLASS">%3$s</ul>',
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
