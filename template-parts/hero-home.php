<?php
/**
 * Hero code for home page
 */
$hero = get_field('hero_image', 132);
// print_r($hero);
if($hero){
    echo '<div class="hero-home"
    style="background:url('.$hero.') no-repeat top; background-size: cover;">';}
    else {
        echo '<div class="hero-home">';
    }
?>
<div class="wrap flex-column flex-wrap">
<div class="flexslider carousel">
    <ul class="slides home-stats">
        <li>One Stat</li>
        <li>Two Stat</li>
        <li>Three Stat</li>
        <li>Four Stat</li>
        <li>One Stat</li>
        <li>Two Stat</li>
        <li>Three Stat</li>
        <li>Four Stat</li>
    </ul>
</div>

        <div class="hero-chevron"><i class="fa fa-angle-down fa-4x"></i>
    </div><!-- .wrap -->
</div><!-- .hero-home -->