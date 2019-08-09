<?php

/**
 * Template Name: Degrees Filter
 *
 * Template for Vue.js app.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UC_Santa_Cruz
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="wrap">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if (has_excerpt()) {
                    the_excerpt();
                } ?>
                <div class="page-content">
                    <?php get_template_part('template-parts/filter', 'programs');
                    get_template_part('template-parts/vue', 'departments'); ?>
                </div>
            </article>
        </div>
    </main>
</div>
<?php
get_footer();
?>