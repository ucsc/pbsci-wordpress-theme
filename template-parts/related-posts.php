<?php

/**
 * Template part for displaying related posts
 * below a single blog entry
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UCSC_PBSci
 */
$relatedPosts = get_field('related_posts');
if ($relatedPosts) :
    echo '<section class="related-posts">';
    // echo '<div class="wrap">';
    echo '<div class="featured-header"><h2>Related Posts</h2></div>';
    echo '<div class="three-col-grid">';
    foreach ($relatedPosts as $post) :
        setup_postdata($post);
        echo '<div class="card-container">';
        echo '<article>';
        ucsc_pbsci_post_thumbnail();
        ucsc_pbsci_post_cats();
        ucsc_pbsci_related_post_title();
        // ucsc_pbsci_posted_on();
        echo '</article>';
        echo '<div class="wrap post-mobile"><hr></div>';
        echo '</div>';

    endforeach;
    echo '</div>';
    // echo '</div>';
    echo '</section>';
    echo '<div class="wrap post-desktop"><hr></div>';
    wp_reset_postdata();
endif;