<?php
/**
 * Hero code for home page
 */
$hero = get_field('hero_image', 132);
// print_r($hero);
if($hero){
    echo '<div class="hero-home"
    style="background:url('.$hero.') no-repeat top; background-size: cover; background-position-y: -200px">';}
    else {
        echo '<div class="hero-home">';
    }
?>
<div class="wrap flex-column flex-wrap">
<div class="flexslider carousel">
    <ul class="slides stats-home">
        <li><div class="stats-container"><div class="stats-rank"><p>#5</p></div><div class="stats-meta"><p class="stats-headline">Global ranking for science reserach influence</p><p class="stats-source">Source: THE 2019</p></div></div></li>
        <li><div class="stats-container"><div class="stats-rank"><p>#5</p></div><div class="stats-meta"><p class="stats-headline">Global ranking for science reserach influence</p><p class="stats-source">Source: THE 2019</p></div></div></li>
        <li><div class="stats-container"><div class="stats-rank"><p>#5</p></div><div class="stats-meta"><p class="stats-headline">Global ranking for science reserach influence</p><p class="stats-source">Source: THE 2019</p></div></div></li>
        <li><div class="stats-container"><div class="stats-rank"><p>#5</p></div><div class="stats-meta"><p class="stats-headline">Global ranking for science reserach influence</p><p class="stats-source">Source: THE 2019</p></div></div></li>
        <li><div class="stats-container"><div class="stats-rank"><p>#5</p></div><div class="stats-meta"><p class="stats-headline">Global ranking for science reserach influence</p><p class="stats-source">Source: THE 2019</p></div></div></li>
        <li><div class="stats-container"><div class="stats-rank"><p>#5</p></div><div class="stats-meta"><p class="stats-headline">Global ranking for science reserach influence</p><p class="stats-source">Source: THE 2019</p></div></div></li>
    </ul>
</div>

        <div class="hero-chevron"><i class="fa fa-angle-down fa-4x"></i>
    </div><!-- .wrap -->
</div><!-- .hero-home -->