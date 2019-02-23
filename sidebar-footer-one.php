<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package UCSC_PBSci
 */

if ( ! is_active_sidebar( 'footer-sidebar-1' ) ) {
	return;
}
?>

<aside id="footer-one" class="widget-area">
	<?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
</aside>
