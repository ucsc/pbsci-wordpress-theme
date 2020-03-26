<?php
/**
 * Template Name: Filterable Content
 * Template Post Type: page
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="wrap">
            <div class="filter-intro">
                <?php the_content(); ?>
            </div>
            <?php while (have_posts()) : the_post(); ?>
                <div class="filters">
                    <?php get_template_part('template-parts/filterable-content', 'filters'); ?>
                </div>
                <div id="no-filter-results">There were no results found for your filters.</div>
                <div class="query">
                    <?php get_template_part('template-parts/filterable-content', 'query'); ?>
                </div>
            <?php endwhile; ?>
        </div>
    </main>
</div>

<?php
get_footer();
