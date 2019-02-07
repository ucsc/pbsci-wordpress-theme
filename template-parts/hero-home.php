<?php
/**
 * Hero code for home page
 */
$hero = get_field('hero_image', 132);
// print_r($hero);
if($hero){
    echo '<div class="hero-home"
    style="background:url('.$hero.') no-repeat top; background-size: cover;">';
?>
<div class="wrap flex-wrap">
<ul class="home-stats">
    <li>One Stat</li>
    <li>Two Stat</li>
    <li>Three Stat</li>
</ul>
<!-- </div> -->
<?php
    echo '<div class="hero-chevron-container"><div class="hero-chevron"><i class="fa fa-angle-down fa-4x"></i></div>';

    echo '</div></div>';
}



?>