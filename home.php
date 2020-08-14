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
        <section class="news-hero">
	        <?php if (get_theme_mod('watermark', '')) : ?>
                <span class="background watermark" style="background-image: url(<?php print get_theme_mod('watermark', ''); ?>)"></span>
	        <?php endif; ?>
            <div class="wrap">
                <div class="news-hero-container">

        <?php
        //Featured loop
        // Call Featured Hero post

        $page_for_posts = get_option('page_for_posts');
        $ids = get_field('hero_post', $page_for_posts);
        // var_dump($ids);
        $args = array(
            'posts_per_page'    => 1,
            'post__in'            => $ids,
            'post_status'        => 'any',
            'orderby'            => 'post__in',
        );

        $featured = new WP_Query($args);
        while ($featured->have_posts()) : $featured->the_post();
            //Set up the parts
            // $do_not_duplicate[] = $post->ID;
            // $subtitle = get_field('post_subtitle');
            // output the parts
            // echo '<div class="wrap">';
            // echo '</div>';
            echo '<article class="flex-wrap">';

            ucsc_pbsci_post_thumbnail('post-thumbnail');
            echo '<div class="news-hero-copy">';
            echo '<header class="entry-header">';
            ucsc_pbsci_post_cats();
            ucsc_pbsci_post_title();
            if ($subtitle) {
                echo '<p class="news-entry-subtitle">' . $subtitle . '</p>';
            }

            echo '</header>';
            the_excerpt();

            echo '</article>';
            echo '</div>';
        endwhile;
        echo '</div>';
        echo '</section>';
        ?>
        <div class="news-navigation">
            <div class="wrap">
                <h2>Explore News Topics</h2>
            <?php
            $featuredRows = get_field('featured_posts', $page_for_posts);
            if ($featuredRows): ?>
                <?php foreach ($featuredRows as $featuredRow): ?>
                <?php
	                $category = $featuredRow['featcat'];
	                $name     = $category->name;
		            $cat_key  = $category->slug;
		            ?>
                <a class="button yellow-outline" href="#<?php print $cat_key; ?>"><?php print $name; ?></a>
                <?php endforeach; ?>
	        <?php endif; ?>
            </div>
        </div>
        <?php
        echo '<div class="featured-wrap">';
        // ACF Stuff
        if ($featuredRows) {
            foreach ($featuredRows as $featuredRow) {
                $featPosts = $featuredRow['featposts'];
                $featCategory = $featuredRow['featcat'];
	            $name     = $featCategory->name;
	            $cat_key = $featCategory->slug;
            ?>

            <?php
                echo '<section>';
                echo '<div class="wrap">';
                echo '<div class="featured-header"><h2 id="'. $cat_key .'">' . $featCategory->name . '</h2></div>';
                echo '<div class="three-col-grid">';
                if ($featPosts) : foreach ($featPosts as $post) :
                        setup_postdata($post);
                        echo '<div class="card-container">';
                        echo '<article>';
	                    ucsc_pbsci_post_thumbnail('news-thumb');
                        ucsc_pbsci_post_cats();
                        ucsc_pbsci_post_title();
                        ucsc_pbsci_posted_on();
                        echo '</article>';
                        echo '<div class="wrap post-mobile"><hr></div>';
                        echo '</div>';
                    endforeach;
                    wp_reset_postdata();
                endif;
                echo '</div>';
                // Get the ID of a given category
                $category_id = get_cat_ID($featCategory->name);
                // Get the URL of this category
                $category_link = get_category_link($category_id);
                echo '<div class="news-more more"><a class="button news-more-button" href="' . esc_url($category_link) . '" title="' . $featCategory->name . '"><span>See more ' . $featCategory->name . ' news</span></a></div>';

                echo '</div>';
                echo '</section>';
            }
        }
        echo '</div>';
        echo '<div class="posts-div">';
        echo '<section>';
        echo '<div class="wrap">';
        echo '<div class="featured-header"><h2>Latest Posts</h2></div>';
        echo '<div class="three-col-grid">';

        if (have_posts()) : while (have_posts()) : the_post();

                echo '<div class="card-container">';
                echo '<article>';
	            ucsc_pbsci_post_thumbnail('news-thumb');
                ucsc_pbsci_post_cats();
                ucsc_pbsci_post_title();
                ucsc_pbsci_posted_on();
                echo '</article>';
                echo '<div class="wrap post-mobile"><hr></div>';
                echo '</div>';

            endwhile;

        endif;

        echo '</div>';
        the_posts_navigation();
        echo '
</div>';
        echo '</section>';
        // End of the loop.
        echo '</div>'; ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();