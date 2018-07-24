<?php
echo '<div class="carousel">';
echo '<div class="slides">';
echo '<div class="slide">';
echo '<a href="https://news.ucsc.edu/2018/03/sfbay-toxins.html">';
echo '<div class="slide-body layout-left color-green">';
echo '<div class="slide-title">Toxic Shellfish</div>';
echo '<p class="slide-teaser">&quotThe SF bay is acting as a big mixing bowl where toxins from both fresh and marine water are found together.&quot -Raphael Kudela, Professor of Ocean Health</p>';
echo '</div>';
echo '<img alt="Four kinds of algal toxins found in San Francisco Bay shellfish" src="https://pbsci.ucsc.edu/images/harmful-algae.jpg" width="780">';
echo '</a>';
echo '</div>'; 
echo '</div>';
echo '</div>';
echo '<div class="flexslider">';
echo   '<ul class="slides">';
// Call Slider post
$args = array (
    'post_type' => 'slider',
    'posts_per_page' => 3,
    'orderby' => 'rand',
    'tax_query' => array(
        array(
            'taxonomy' => 'slider-location',
            'field' => 'slug',
            'terms' => 'home-page',
        )
    )
    );
$slider_query = new WP_Query ($args);
if($slider_query->have_posts()): while ($slider_query->have_posts()):$slider_query->the_post();

//Grab the parts
$slider_headline = get_post_meta( get_the_ID(), '_ucscpbsci_text', true );
$slider_teaser = get_post_meta( get_the_ID(), '_ucscpbsci_textareasmall', true );   
$slider_image = get_the_post_thumbnail($post_id,'slider');
$slider_copy = '<h2>'.$slider_headline.'</h2><p>'.$slider_teaser.'</p>';
$slider_url = get_post_meta( get_the_ID(), '_ucscpbsci_url', true );
$slider_url_sanitized = esc_url($slider_url);
$slider_layout = get_post_meta( get_the_ID(), '_ucscpbsci_layout_chooser', true );
$slider_background = get_post_meta( get_the_ID(), '_ucscpbsci_background_chooser', true );

// echo '<li><a href="'.$slider_url_sanitized.'">'.$slider_image.'<div class="flex-blurb">'.$slider_copy.'</div></a></li>';
echo '<li><a href="'.$slider_url_sanitized.'"><div class="slide-body layout-left color-green">'.$slider_copy.'</div>'.$slider_image.'</a></li>';
wp_reset_postdata();
endwhile; endif;
echo   '</ul>';
var_dump($slider_background);
echo '</div>';

?>