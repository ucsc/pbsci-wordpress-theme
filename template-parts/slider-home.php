<?php
$slide_options = get_field('number_of_slides','option');

if ($slide_options == "one"){
    $slides = "1";
}
elseif ($slide_options == "two"){
    $slides = "2";
}
elseif ($slide_options == "three"){
    $slides = "3";
}
elseif ($slide_options == "four"){
    $slides = "4";
}
elseif ($slide_options == "five"){
    $slides = "5";
}
elseif ($slide_options == "six"){
    $slides = "6";
}
elseif ($slide_options == "seven"){
    $slides = "7";
}
elseif ($slide_options == "eight"){
    $slides = "8";
}
elseif ($slide_options == "nine"){
    $slides = "9";
}
elseif ($slide_options == "ten"){
    $slides = "10";
}

//Flexslider Begin
echo '<div class="flexslider">';
echo   '<ul class="slides">';
// Call Slider post
$args = array (
    'post_type' => 'slide',
    'posts_per_page' => $slides,
    'orderby' => 'date',
    'order' => 'DESC',
    // 'tax_query' => array(
        // array(
            // 'taxonomy' => 'slider-location',
            // 'field' => 'slug',
            // 'terms' => 'home-page',
        // )
    // )
    );
$slider_query = new WP_Query ($args);
if($slider_query->have_posts()): while ($slider_query->have_posts()):$slider_query->the_post();

//Set up the parts
// $slider_headline = get_post_meta( get_the_ID(), '_ucscpbsci_text', true );
$slider_headline = get_field('slide_title_headline');
$slider_teaser = get_field('slide_teaser');
$slider_image = get_the_post_thumbnail($post_id,'slider');
$slider_copy = '<div class="slide-title">'.$slider_headline.'</div><p class="slide-teaser">'.$slider_teaser.'</p>';
$slider_url = get_field('slide_url');
$slider_url_sanitized = esc_url($slider_url);
$slider_layout = get_field('slide_layout');
$slider_background = get_field('slide_background_color');
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

echo '<li><div class="slide"><a href="'.$slider_url_sanitized.'"><div class="'.$slide_body." ".$layout_class." ".$background_class.'">'.$slider_copy.'</div>'.$slider_image.'</a></div></li>';
wp_reset_postdata();
endwhile; endif;
echo   '</ul>';
// echo '</div>';

// debug
        // $meta = get_post_meta($post->ID);
                // echo '<pre>';
                // var_dump($slider_background);
                // echo '</pre>';
//
                // echo '<pre>';
                // var_dump($slider_layout);
                // echo '</pre>';
//
                // echo '<pre>';
                // var_dump($layout_class);
                // echo '</pre>';
        // end debug

?>