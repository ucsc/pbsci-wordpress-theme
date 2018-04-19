<?php
/**
 * Omnibar
 */

// $logo = get_stylesheet_directory_uri().'/images/logo-abbr.png';
$logo = 'https://static.ucsc.edu/_responsive/images/logos/uc-santa-cruz-reverse.svg';

// Change $custom_title text as you wish
$custom_title = '<a href="/"><img class="campus-secondary" id="logo" src="'.$logo.'" alt="UCSC Logo" ></a>';
echo '<div class="page-top"><div class="row"><div class="top-row-left"><div class="top-row-left-wrap">'.$custom_title.'</div></div><div class="top-row-right">';
// genesis_widget_area( 'top-row-search' );
// wp_nav_menu( array(
    // 'menu' => 'Top Row Menu'
// ) );

echo '</div></div></div>';

?>