<?php
$slide_options = get_option( 'ucsc_underscore_theme_options','slide_count' );

if (in_array("one", $slide_options)) {
    $slides = "1";
}
elseif (in_array("two", $slide_options)) {
    $slides = "2";
}
elseif (in_array("three", $slide_options)) {
    $slides = "3";
}
elseif (in_array("four", $slide_options)) {
    $slides = "4";
}
elseif (in_array("three", $slide_options)) {
    $slides = "3";
}
elseif (in_array("four", $slide_options)) {
    $slides = "4";
}
elseif (in_array("five", $slide_options)) {
    $slides = "5";
}
elseif (in_array("six", $slide_options)) {
    $slides = "6";
}
elseif (in_array("seven", $slide_options)) {
    $slides = "7";
}
elseif (in_array("eight", $slide_options)) {
    $slides = "8";
}
elseif (in_array("nine", $slide_options)) {
    $slides = "9";
}
elseif (in_array("ten", $slide_options)) {
    $slides = "10";
}

//Flexslider Begin
echo '<div class="flexslider">';
echo   '<ul class="slides">';
// Call Slider post
$args = array (
    'post_type' => 'slider',
    'posts_per_page' => $slides,
    'orderby' => 'date',
    'order' => 'DESC',
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

//Set up the parts
$slider_headline = get_post_meta( get_the_ID(), '_ucscpbsci_text', true );
$slider_teaser = get_post_meta( get_the_ID(), '_ucscpbsci_textareasmall', true );   
$slider_image = get_the_post_thumbnail($post_id,'slider');
$slider_copy = '<div class="slide-title">'.$slider_headline.'</div><p class="slide-teaser">'.$slider_teaser.'</p>';
$slider_url = get_post_meta( get_the_ID(), '_ucscpbsci_url', true );
$slider_url_sanitized = esc_url($slider_url);
$slider_layout = get_post_meta( get_the_ID(), '_ucscpbsci_layout_chooser', true );
$slider_background = get_post_meta( get_the_ID(), '_ucscpbsci_background_chooser', true );
$sl_space = " ";
$slide_body = "slide-body";

if ($slider_background == 'blue'): $background_class = "color-blue";
elseif ($slider_background == 'gold'): $background_class = "color-gold";
elseif ($slider_background == 'green'): $background_class = "color-green";
elseif ($slider_background == 'light-blue'): $background_class = "color-light-blue";
elseif ($slider_background == 'lime'): $background_class = "color-lime";
elseif ($slider_background == 'pink'): $background_class = "color-pink";
endif; 

if ($slider_layout == 'left'): $layout_class = "layout-left";
elseif ($slider_layout == 'right'): $layout_class = "layout-right";
elseif ($slider_layout == 'top'): $layout_class = "layout-top";
elseif ($slider_layout == 'bottom'): $layout_class = "layout-bottom";
endif; 

echo '<li><a href="'.$slider_url_sanitized.'"><div class="'.$slide_body." ".$layout_class." ".$background_class.'">'.$slider_copy.'</div>'.$slider_image.'</a></li>';
wp_reset_postdata();
endwhile; endif;
echo   '</ul>';
echo '</div>';
print_r($slides);

?>