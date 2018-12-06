<?php
/**
 * Template part for displaying Ajax degrees results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UC_Santa_Cruz
 */

 // Call Programs post
//  $args = array (
//     'post_type' => 'degree',
//     );
// $degree_query = new WP_Query ($args);
// if($degree_query->have_posts()): while ($degree_query->have_posts()):$degree_query->the_post();
// $degrees_offered2 = get_field_object('degrees_offered');
// $groups = acf_get_field_groups(array('post_type' => 'degree'));

//include ajax search script

ucsc_ajax_filter_search_scripts(); // Added here

echo '<!-- Panel Row Begin --><div class="panel-row">';


echo '<div id="ucsc-ajax-filter-search">';
echo '<form action="" method="get">';
echo '<fieldset>';
echo '<legend class="degree-search-title">Undergraduate Academic Options</legend>';
echo '<div class="hide-till-reveal">';
echo '<ul class="academic-options undergraduate-options">';
echo '<li class="ba"><input type="checkbox" name="degrees_offered" id="ba" value="ba"><label for="ba">BA - Bachelor of Arts</label></li>';
echo '<li class="bs"><input type="checkbox" name="degrees_offered" id="bs" value="bs"><label for="bs">BS - Bachelor of Science</label></li>';
echo '<li class="undergradminor"><input type="checkbox" name="degrees_offered" id="undergradminor" value="undergradminor"><label for="undergradminor">Undergraduate Minor</label></li>';
echo '<li class="undergradhonors"><input type="checkbox" name="degrees_offered" id="undergradhonors" value="undergradhonors"><label for="undergradhonors">Undergraduate Honors</label></li>';
echo '<li class="jointmajor"><input type="checkbox" name="degrees_offered" id="jointmajor" value="jointmajor"><label for="jointmajor">Joint Majors</span></li>';
echo '</ul>';
echo '</div>';
echo '</fieldset>';
echo '<fieldset>';
echo '<legend class="degree-search-title">Graduate Academic Options</legend>';
echo '<div class="hide-till-reveal">';
echo '<ul class="academic-options graduate-options">';
echo '<li class="ma"><input type="checkbox" name="degrees_offered" id="ma" value="ma"><label for="ma">MA - Master of Arts</label></li>';
echo '<li class="ms"><input type="checkbox" name="degrees_offered" id="ms" value="ms"><label for="ms">MS - Master of Science</label></li>';
echo '<li class="gradminor"><input type="checkbox" name="degrees_offered" id="gradminor" value="gradminor"><label for="gradminor">Graduate Minor</label></li>';
echo '<li class="gradhonors"><input type="checkbox" name="degrees_offered" id="gradhonors" value="gradhonors"><label for="gradhonors">Graduate Honors</label></li>';
echo '<li class="gradcert"><input type="checkbox" name="degrees_offered" id="gradcert" value="gradcert"><label for="gradcert">Graduate Certificate</label></li>';
echo '<li class="jointmajor"><input type="checkbox" name="degrees_offered" id="jointmajor" value="jointmajor"><label for="jointmajor">Joint Majors</span></li>';
echo '<li class="phd"><input type="checkbox" name="degrees_offered" id="phd" value="phd"><label for="phd">PhD - Doctor of Philosophy</label></li>';
echo '</ul>';
echo '</div>';
echo '</fieldset>';

        // debug
                // echo '<pre>';
                // var_dump($groups);
                // echo '</pre>';
        // end debug
echo '<input type="text" name="search" id="search" value="" placeholder="Search Here..">';
echo '<input type="submit" id="submit" name="submit" value="Search">';
echo '</form>';
echo '<ul id="ajax_fitler_search_results"></ul>';
echo '</div>';
echo '</div>';

?>