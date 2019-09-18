<?php

/**
 * The template for displaying the BLOG/NEWS archive page
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
        echo '<section class="panel news-hero">';
            echo     '<div class="wrap">';

            echo         '<div class="news-hero-container">';

            //Featured loop
            // Call Featured Hero post
            $args = array(
                'posts_per_page' => '1',
                'tax_query' => array (
                    array (
                        'taxonomy' => 'featured-tax',
                        'field' => 'slug',
                        'terms' => 'featured',
                    )
                )
            );
            $featured = new WP_Query($args);
            while ($featured->have_posts()) : $featured->the_post();
            //Set up the parts
            $do_not_duplicate[] = $post->ID;
            // $subtitle = get_field('post_subtitle');
            // output the parts
            echo '<article class="flex-wrap">';
            ucsc_pbsci_post_thumbnail('thumbnail');
            echo '<div class="news-hero-copy">';


            ucsc_pbsci_post_cats();
            echo '<header class="entry-header">';
            ucsc_pbsci_post_title();
            if ($subtitle){
                echo '<p class="news-entry-subtitle">'.$subtitle.'</p>';
            }

            echo '</header>';
            the_excerpt();

            echo '</article>';
            echo '</div>';
        endwhile;
        echo '</div>';
    echo '</section>';
    echo '<section>';
    echo '<div class="wrap">';
    echo '<div class="three-col-grid">';

        if (have_posts() ) : while (have_posts() ) : the_post();
        if (in_array($post->ID, $do_not_duplicate)) continue;
        echo '<div class="card-container">';
        echo '<article>';
        ucsc_pbsci_post_thumbnail();
        // the_post_thumbnail();
        ucsc_pbsci_post_cats();
        ucsc_pbsci_post_title();
        ucsc_pbsci_posted_on();
        echo '</article>';
        echo '</div>';

    endwhile;
    endif;

    echo '</div>';
    echo '</div>';
    echo '</section>';
// End of the loop.
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();