<?php

/**
 * Primary Navigation Menu
 */
?>
<div class="header">
    <div class="wrap">
        <div class="header-left">
            <?php echo '<a href="/" class="logo"><img src="' . IMAGES . '/science-logo.svg" alt="" /></a>'; ?>
            <span class="menu-toggle navbar-toggle" id="js-navbar-toggle" aria-controls="primary-menu"
                    aria-expanded="false">
                    <i class="fas fa-bars"></i>
            </span>
        </div>
        <div class="header-right" id="menu-container">
            <?php if (has_nav_menu('menu-global')) { ?>
                <nav id="global-navigation" class="global-navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'menu-global' ) ); ?>
                    <?php echo get_search_form(); ?>
                </nav>
            <?php } ?>
            <!-- #site-navigation -->
            <nav id="site-navigation" class="main-navigation">

                <?php wp_nav_menu(array(
                    'theme_location' => 'menu-1',
                    'menu_id' => 'primary-menu',
                    'container' => false,
                ));
                ?>
            </nav><!-- #site-navigation -->
        </div>
    </div>
</div>