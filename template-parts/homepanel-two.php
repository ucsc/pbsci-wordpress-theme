<?php
/**
 * Home Page Widgets Three Column
 */
echo '<div class="row three separate dark">';

echo '<div class="wrap">';
     if ( is_active_sidebar( 'sidebar-home-left' ) ) : 
     dynamic_sidebar( 'sidebar-home-left' ); 
 endif;
echo '</div>';

echo '<div class="wrap">';
     if ( is_active_sidebar( 'sidebar-home-center' ) ) : 
     dynamic_sidebar( 'sidebar-home-center' ); 
 endif;
echo '</div>';

echo '<div class="wrap last">';
echo '<div class="block gallery-block" id="view">';
     if ( is_active_sidebar( 'sidebar-home-right' ) ) : 
     dynamic_sidebar( 'sidebar-home-right' ); 
 endif;
echo '</div>';

echo '</div>';
echo '</div>';

?>