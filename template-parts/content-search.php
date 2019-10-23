<?php

/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UCSC_PBSci
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="archive-grid">
        <header class="entry-header">
        <?php 
            if ('post' === get_post_type( get_the_ID() )):
            $postType = 'a <span>News</span> post';
            elseif ('student-support' === get_post_type( get_the_ID() )):
                $postType = 'an <span>Academic Support</span> post';
            elseif ('labs' === get_post_type( get_the_ID() )):
                $postType = 'a <span>Faculty & Researchers</span> post';
            elseif ('support-science' === get_post_type( get_the_ID() )):
                $postType = 'a <span>Support Funds</span> post';
            elseif ('studentopportunities' === get_post_type( get_the_ID() )):
                $postType = 'a <span>Research Opportunities</span> post';
            elseif ('institutes-centers' === get_post_type( get_the_ID() )):
                $postType = 'a <span>Groups & Facilities</span> post';
            elseif ('degree' === get_post_type( get_the_ID() )):
                $postType = 'a <span>Degree</span> post';
            elseif ('department' === get_post_type( get_the_ID() )):
                $postType = 'a <span>Department</span> post';
            elseif ('page' === get_post_type( get_the_ID() )):
                $postType = 'a <span>Page</span>';
            endif;
            ?>
            <p class="archive-meta">This is <?php echo $postType ?></p>
            <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>

            <?php if ('post' === get_post_type()) : ?>
            <div class="entry-meta">
                <?php
						ucsc_pbsci_posted_on();
						ucsc_pbsci_posted_by();
						?>
            </div><!-- .entry-meta -->
            <?php endif; ?>
        </header><!-- .entry-header -->

        <?php ucsc_pbsci_post_thumbnail(); ?>

        <div class="entry-summary">
            <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->

        <footer class="entry-footer">
            <?php ucsc_pbsci_entry_footer(); ?>
        </footer><!-- .entry-footer -->
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
<div class="wrap">
    <hr>
</div>