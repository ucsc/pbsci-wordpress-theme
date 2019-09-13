<?php

/**
 * Primary Navigation Menu
 */
?>
<!-- #site-navigation -->
<nav id="site-navigation" class="main-navigation">
    <?php ucsc_before_header(); ?>
    <div class="nav-wrap">
        <span class="menu-toggle navbar-toggle" id="js-navbar-toggle" aria-controls="primary-menu"
            aria-expanded="false">
            <i class="fas fa-bars"></i>
        </span>
        <?php echo '<a href="/" class="logo"><img src="' . IMAGES . '/science-logo.svg" alt="" /></a>';
        wp_nav_menu(array(
            'theme_location' => 'menu-1',
            'menu_id' => 'primary-menu',
            'container' => false,
        ));
        ?>
    </div>
</nav><!-- #site-navigation -->