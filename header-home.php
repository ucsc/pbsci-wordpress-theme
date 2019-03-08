<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package UCSC_PBSci
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text"
            href="#content"><?php esc_html_e( 'Skip to content', 'ucsc-pbsci' ); ?></a>
           <?php get_template_part( 'template-parts/navigation', 'primary' );?>
        <header id="masthead" class="site-header">
            <div class="site-branding">
                <?php
			/**
			 * Hero code for home page
			 */
			$postID = get_the_ID();
            $hero = get_field('hero_image', $postID);
            $slideRows = get_field('hero_stats_slider');
			// print_r($slideRows);
			if($hero){
			    echo '<div class="hero-home"
			    style="background:url('.$hero.') no-repeat top; background-size: cover;">';}
			    else {
			        echo '<div class="hero-home">';
                }
            if($slideRows){
                echo '<div class="wrap flex-column flex-wrap"><div class="flexslider carousel"><ul class="slides stats-home">';
                foreach ($slideRows as $slideRow){
                    echo '<li><div class="stats-container"><div class="stats-rank"><p>#'.$slideRow['stat_rank'].'</p></div><div class="stats-meta"><p class="stats-headline">'.$slideRow['stat_heading'].'</p><p class="stats-source">Source: '.$slideRow['stat_source'].'</p></div></div> </li>';
                }
                echo'</ul></div>';
            }
			?>
                <!-- <div class="wrap flex-column flex-wrap">
                    <div class="flexslider carousel">
                        <ul class="slides stats-home">
                            <li>
                                <div class="stats-container">
                                    <div class="stats-rank">
                                        <p>#5</p>
                                    </div>
                                    <div class="stats-meta">
                                        <p class="stats-headline">Global ranking for science reserach influence</p>
                                        <p class="stats-source">Source: THE 2019</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="stats-container">
                                    <div class="stats-rank">
                                        <p>#5</p>
                                    </div>
                                    <div class="stats-meta">
                                        <p class="stats-headline">Global ranking for science reserach influence</p>
                                        <p class="stats-source">Source: THE 2019</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="stats-container">
                                    <div class="stats-rank">
                                        <p>#5</p>
                                    </div>
                                    <div class="stats-meta">
                                        <p class="stats-headline">Global ranking for science reserach influence</p>
                                        <p class="stats-source">Source: THE 2019</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="stats-container">
                                    <div class="stats-rank">
                                        <p>#5</p>
                                    </div>
                                    <div class="stats-meta">
                                    <p class="stats-headline">Global ranking for science reserach influence</p>
                                        <p class="stats-source">Source: THE 2019</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="stats-container">
                                    <div class="stats-rank">
                                        <p>#5</p>
                                    </div>
                                    <div class="stats-meta">
                                        <p class="stats-headline">Global ranking for science reserach influence</p>
                                        <p class="stats-source">Source: THE 2019</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="stats-container">
                                    <div class="stats-rank">
                                        <p>#5</p>
                                    </div>
                                    <div class="stats-meta">
                                        <p class="stats-headline">Global ranking for science reserach influence</p>
                                        <p class="stats-source">Source: THE 2019</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div> -->

                    <div class="hero-chevron"><i class="fa fa-angle-down fa-4x"></i>
                    </div><!-- .wrap -->
                </div><!-- .hero-home -->
            </div><!-- .site-branding -->
        </header><!-- #masthead -->

        <div id="content" class="site-content">