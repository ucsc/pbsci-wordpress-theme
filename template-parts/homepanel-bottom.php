<?php
/**
 * Home Page Widgets Four Column
 */
echo '<div class="row four clear">';

echo '<div class="wrap">';
     if ( is_active_sidebar( 'sidebar-home-bottom-one' ) ) : 
     dynamic_sidebar( 'sidebar-home-bottom-one' ); 
 endif;
echo '</div>';

echo '<div class="wrap">';
     if ( is_active_sidebar( 'sidebar-home-bottom-two' ) ) : 
     dynamic_sidebar( 'sidebar-home-bottom-two' ); 
 endif;
echo '</div>';

echo '<div class="wrap">';
     if ( is_active_sidebar( 'sidebar-home-bottom-three' ) ) : 
     dynamic_sidebar( 'sidebar-home-bottom-three' ); 
 endif;
echo '</div>';

echo '<div class="wrap last">';
     if ( is_active_sidebar( 'sidebar-home-bottom-four' ) ) : 
     dynamic_sidebar( 'sidebar-home-bottom-four' ); 
 endif;
echo '</div>';

echo '</div>';
echo '</div>';

?>