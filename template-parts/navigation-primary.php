<?php

/**
 * Primary Navigation Menu
 */
?>
<div class="header">
    <div class="wrap">
        <div class="header-left">
	        <?php if (ucsc_has_custom_logo()) { ?>
                <a href="/" class="custom-logo">
                    <img src="<?php echo ucsc_the_custom_logo_url(); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
			        <?php if (get_theme_mod('custom_logo_with_title', 0)) : ?>
                        <span class="site-title"><?php echo esc_attr(get_bloginfo('name')); ?></span>
			        <?php endif; ?>
                </a>
	        <?php } else { ?>
                <a href="/" class="no-logo">
                    <div class="site-title"><?php echo esc_attr(get_bloginfo('name')); ?> </div>
                </a>
	        <?php } ?>
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