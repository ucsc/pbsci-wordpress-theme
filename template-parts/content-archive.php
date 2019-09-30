<?php

/**
 * Template part for displaying archives
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UCSC_PBSci
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="archive-grid">
        <header class="entry-header">
            <div class="entry-meta">
                <?php
                ucsc_pbsci_posted_on();
                ucsc_pbsci_posted_by();
                ?>
            </div><!-- .entry-meta -->

        </header><!-- .entry-header -->
        <?php ucsc_pbsci_post_thumbnail(); ?>
        <div class="archive-excerpt">
            <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
            <?php the_excerpt(); ?>
        </div>

        <footer class="entry-footer">
            <?php ucsc_pbsci_entry_footer(); ?>
        </footer><!-- .entry-footer -->
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
<div class="wrap">
    <hr>
</div>