<?php
/**
 * Omnibar
 */

$logo = 'https://static.ucsc.edu/_responsive/images/logos/uc-santa-cruz-reverse.svg';

// Change $custom_title text as you wish
$custom_title = '<a href="/"><img class="campus-secondary" id="logo" src="'.$logo.'" alt="UCSC Logo" ></a>';
echo '<div class="page-top"><div class="row"><div class="page-top-left">'.$custom_title.'</div><div class="page-top-right">';
echo '<ul id="topNav">
<li><a href="https://my.ucsc.edu" title="The student portal">MyUCSC</a></li>
<li><a href="https://www.ucsc.edu/tools/people.html" title="Campus directory">People</a></li>
<li><a href="https://www.ucsc.edu/tools/calendars.html" title="Upcoming events, academic, and administrative calendars">Calendars</a></li>
<li><a href="https://www.ucsc.edu/visit/maps-directions.html">Maps</a></li>
<li><a href="https://www.ucsc.edu/tools/azindex.html" title="A to Z index of UCSC websites">A-Z Index</a></li>
</ul>';
echo '<div class="search" role="search">
<!-- Google Custom Search --><form action="'.get_bloginfo().'" id="cse-search-box-site" _lpchecked="1" >
<div><label class="hide" for="search-site">Search</label> <input class="query" id="search-site" name="q" placeholder="Search this Site" type="text"> <input class="srchBtn" type="submit"></div>
</form><!-- end Google Custom Search -->
</div>';
echo '</div></div></div>';
/**The WordPress Way */
// wp_nav_menu( array(
//     'menu' => 'Top Row Menu',
//     'menu_id' => 'topNav',
// ) );
// if (is_active_sidebar('top-row-search')):
//     dynamic_sidebar('top-row-search');
// endif;

?>