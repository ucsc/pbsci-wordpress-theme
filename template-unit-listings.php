<?php
/**
 * Template Name: Unit Listings
 * Template Post Type: page
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="wrap">
            <?php while (have_posts()) : the_post(); ?>
	            <div class="filter-intro">
		            <?php the_content(); ?>
	            </div>
                <div class="collection">
                    <?php get_template_part('template-parts/unit-listings'); ?>
                </div>
            <?php endwhile; ?>
        </div>
    </main>
</div>

<?php
get_footer();
