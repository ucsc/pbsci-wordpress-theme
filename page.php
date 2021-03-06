<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UCSC_PBSci
 */

get_header();

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
global $post;
        while (have_posts()) :
            the_post();
            // $postSlug = get_post_field('post_name', get_the_ID());
            // var_dump($postSlug);
            if (is_page( 104 )) {
                get_template_part('template-parts/content', 'degrees');
            } else if (is_page( 7 )) {
                get_template_part('template-parts/content', 'departments');
            } else if (is_page( 444 ) ) {
                get_template_part('template-parts/content', 'links');
            } else if (is_page( 440 ) ) {
                get_template_part('template-parts/content', 'links');
            } else if (is_page( 442 ) ) {
                get_template_part('template-parts/content', 'links');
            } else if (is_page( 438 ) ) {
                get_template_part('template-parts/content', 'links');
            } else if (is_page( 204 ) ) {
                get_template_part('template-parts/content', 'links');
            } else {
                get_template_part('template-parts/content', 'page');
            }



            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;

        endwhile; // End of the loop.
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();