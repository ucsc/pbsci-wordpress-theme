<?php
/**
 * Hero code for home page
 */
$hero = get_field('hero_image', 132);
// print_r($hero);
if($hero){
    echo '<div class="hero-home"
    style="background:url('.$hero.') no-repeat top; background-size: cover;"><div class="hero-chevron-container"><div class="wrap"><div class="hero-chevron"><i class="fa fa-angle-down fa-4x"></i></div></div></div>';
}



?>