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
            $postType = 'a <b>News</b> post';
            elseif ('student-support' === get_post_type( get_the_ID() )):
                $postType = 'an <b>Academic Support</b> post';
            elseif ('labs' === get_post_type( get_the_ID() )):
                $postType = 'a <b>Faculty & Researchers</b> post';
            elseif ('support-science' === get_post_type( get_the_ID() )):
                $postType = 'a <b>Support Funds</b> post';
            elseif ('studentopportunities' === get_post_type( get_the_ID() )):
                $postType = 'a <b>Research Opportunities</b> post';
            elseif ('institutes-centers' === get_post_type( get_the_ID() )):
                $postType = 'a <b>Groups & Facilities</b> post';
            elseif ('degree' === get_post_type( get_the_ID() )):
                $postType = 'a <b>Degree</b> post';
            elseif ('department' === get_post_type( get_the_ID() )):
                $postType = 'a <b>Department</b> post';
            elseif ('page' === get_post_type( get_the_ID() )):
                $postType = 'a <b>Page</b>';
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