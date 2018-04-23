<?php
/**
 * Omnibar
 */

// $logo = get_stylesheet_directory_uri().'/images/logo-abbr.png';
$logo = 'https://static.ucsc.edu/_responsive/images/logos/uc-santa-cruz-reverse.svg';

// Change $custom_title text as you wish
$custom_title = '<a href="/"><img class="campus-secondary" id="logo" src="'.$logo.'" alt="UCSC Logo" ></a>';
echo '<div class="page-top"><div class="row"><div class="page-top-left">'.$custom_title.'</div><div class="page-top-right">';
wp_nav_menu( array(
    'menu' => 'Top Row Menu',
    'menu_id' => 'topNav',
) );
if (is_active_sidebar('top-row-search')):
    dynamic_sidebar('top-row-search');
endif;

echo '</div></div></div>';

?>