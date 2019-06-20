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
            $hero = get_the_post_thumbnail_url(get_the_ID(),'page-hero');
            $page_blurb = get_field('page_blurb');
            $degrees_offered = get_field_object('degrees_offered');
            $degrees = $degrees_offered['value'];
            if($hero){
                echo '<div class="hero-page flex-wrap" style="background:url('.$hero.') no-repeat bottom; background-size: cover;">';}
                else {
                    echo '<div class="hero-page flex-wrap">';
                }
                ?>

                <div class="hero-page-runner desktop">
                    <div class="wrap flex-wrap">
                        <header class="entry-header flex-wrap">
                        <div class="entry-header-left">
                            <span class="entry-header-span-a">Science</span>
                        </div>
                        <div class="entry-header-right">
                        <?php get_template_part( 'template-parts/breadcrumbs','head' ); ?>
                        <span class="entry-header-span-b flex-wrap">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' )?>
                        </span>
                            <?php
                            // $cocksucker = get_post_type();
                            // var_dump($cocksucker);
                            if ('degree' == get_post_type()) {
                                echo '<span class="entry-header-span-c">';
                                if($degrees):
                                    echo '<!-- Card Degrees Offered Begin --><div class="card-degrees-offered">';
                                    echo '<ul class="card-list flex-wrap">';
                                    if(in_array('undergradminor', $degrees)||in_array('gradminor', $degrees)):
                                        echo '<li class="minor">m.</li>';
                                    endif;
                                    if(in_array('ba', $degrees)):
                                        echo '<li class="ba">B.A.</li>';
                                    endif;
                                    if(in_array('bs', $degrees)):
                                        echo '<li class="bs">B.S.</li>';
                                    endif;
                                    if(in_array('ma', $degrees)):
                                        echo '<li class="ma">M.A.</li>';
                                    endif;
                                    if(in_array('ms', $degrees)):
                                        echo '<li class="ms">M.S.</li>';
                                    endif;
                                    if(in_array('phd', $degrees)):
                                        echo '<li class="phd">Ph.D.</li>';
                                    endif;
                                    echo '</ul>';
                                    echo '</div><!-- Panel Degrees Offered End -->';
                                endif;
                                }

                            ?></span>
                            </div>
                        </header><!-- .entry-header -->

                    </div><!-- .hero-home wrap -->
                </div><!-- .hero-page-runner -->

            </div><!-- .site-branding -->
        </header><!-- #masthead -->
        <div class="hero-page-runner mobile">
                    <div class="wrap flex-wrap">
                        <header class="entry-header flex-wrap">
                        <div class="entry-header-left">
                            <span class="entry-header-span-a">Science</span>
                        </div>
                        <div class="entry-header-right">
                        <?php get_template_part( 'template-parts/breadcrumbs','head' ); ?>
                            <span class="entry-header-span-b flex-wrap">
                            <?php
                            if (is_page()) :
                            ?>
                            <h1>Impactful </h1><?php the_title( '<h1 class="entry-title">', '</h1>' );
                            else:
                                the_title( '<h1 class="entry-title">', '</h1>' );
                            endif; ?>

                            </span>
                            <?php
                            if (is_page()) {
                                echo '<span class="entry-header-span-c">';
                                if($page_blurb):
                                    echo $page_blurb;
                                endif;
                            } else {
                                echo '<span class="entry-header-span-c">';
                                if($degrees):
                                    echo '<!-- Card Degrees Offered Begin --><div class="card-degrees-offered">';
                                    echo '<ul class="card-list flex-wrap">';
                                    if(in_array('undergradminor', $degrees)||in_array('gradminor', $degrees)):
                                        echo '<li class="minor">m.</li>';
                                    endif;
                                    if(in_array('ba', $degrees)):
                                        echo '<li class="ba">B.A.</li>';
                                    endif;
                                    if(in_array('bs', $degrees)):
                                        echo '<li class="bs">B.S.</li>';
                                    endif;
                                    if(in_array('ma', $degrees)):
                                        echo '<li class="ma">M.A.</li>';
                                    endif;
                                    if(in_array('ms', $degrees)):
                                        echo '<li class="ms">M.S.</li>';
                                    endif;
                                    if(in_array('phd', $degrees)):
                                        echo '<li class="phd">Ph.D.</li>';
                                    endif;
                                    echo '</ul>';
                                    echo '</div><!-- Panel Degrees Offered End -->';
                                endif;
                                }

                            ?></span>
                            </div>
                        </header><!-- .entry-header -->

                    </div><!-- .hero-home wrap -->
                </div><!-- .hero-page-runner -->
        <div id="content" class="site-content">