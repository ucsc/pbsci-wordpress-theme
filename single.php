<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package UCSC_PBSci
 */

get_header('blog');
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="wrap">
            <?php
			while (have_posts()) :
				the_post();

				get_template_part('template-parts/content', get_post_type());

				if ('post' === get_post_type()) :
					get_template_part('template-parts/social', 'sharing');
					get_template_part('template-parts/related', 'posts');
					the_post_navigation();
				endif;

				// If comments are open or we have at least one comment, load up the comment template.
				if (comments_open() || get_comments_number()) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
// if ('post' === get_post_type()) :
// 	get_sidebar();
// 	echo 'sidebar here?';
// endif;
get_footer();