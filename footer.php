<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package UCSC_PBSci
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">

		<div class="panel">
			<div class="wrap">
				<div class="flex-wrap">
					<div class="panel-heading footer-top">
						<h2 class="icon chevron-right"><span class="span-a">Science</span><span class="span-b">Apply</span>Today</h2>
					</div>
				</div>
			</div>
		</div>
		<div class="wrap">
	<div class="flex-wrap">
		<div class="panel-cell-2 footer-cell">
			<div class="panel-heading-footer flex-wrap">
				<span class="f-logo"><img src="<?php echo get_stylesheet_directory_uri();?>/images/uc-santa-cruz-reverse.svg" alt="" width="195px" height="auto"/></span><span class="f-text">Science</span>
			</div>
		</div>
		<div class="panel-cell-2 footer-cell">
			<div class="panel-heading">
				<h2><span>Academic</span>Departments</h2>
			</div>
		</div>
		<div class="panel-cell-2 footer-cell">
			<div class="panel-heading">
				<h2><span>Sharing</span>Science</h2>
			</div>
		</div>
		</div>
		</div>
		<div class="site-info">
		<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'ucsc-pbsci' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'ucsc-pbsci' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'ucsc-pbsci' ), 'ucsc-pbsci', '<a href="https://automattic.com/">Automattic</a>' );
				?>
		</div><!-- .site-info -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
