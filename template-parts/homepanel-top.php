<?php
/**
 * Home Page Widgets Three Column
 */
echo '<div class="row three separate dark">';

echo '<div class="wrap">';
     if ( is_active_sidebar( 'sidebar-home-top-left' ) ) :
     dynamic_sidebar( 'sidebar-home-top-left' );
 endif;
echo '</div>';

echo '<div class="wrap">';
     if ( is_active_sidebar( 'sidebar-home-top-center' ) ) :
     dynamic_sidebar( 'sidebar-home-top-center' );
 endif;
echo '</div>';

echo '<div class="wrap last">';
// echo '<div class="block gallery-block" id="view">';
     if ( is_active_sidebar( 'sidebar-home-top-right' ) ) :
     dynamic_sidebar( 'sidebar-home-top-right' );
 endif;
// echo '</div>';

echo '</div>';
echo '</div>';

?>