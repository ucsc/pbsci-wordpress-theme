<?php
/**
 * Template Name: Degree Child Page
 * Template Post Type: degree
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 */

get_header();
?>


<div id="primary" class="entry-content">
    <main id="main" class="site-main">
        <div class="wrap">
            <div class="content-wrapper">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="content show-submenu">
                        <?php the_content(); ?>
                    </div>
                    <div class="sidebar show-submenu">
                        <?php get_template_part( 'template-parts/page-submenu' ) ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </main>
</div>

<?php
get_footer();
