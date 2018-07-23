<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package UC_Santa_Cruz
 */

// if ( ! is_active_sidebar( 'sidebar-home-bottom-one' ) ) {
// 	return;
// }
?>

<aside id="secondary" class="widget-area">
	<?php echo '<div class="wrap">';
     if ( is_active_sidebar( 'sidebar-home-bottom-one' ) ) : 
     dynamic_sidebar( 'sidebar-home-bottom-one' ); 
 endif;
echo '</div>'; ?>
</aside><!-- #secondary -->
