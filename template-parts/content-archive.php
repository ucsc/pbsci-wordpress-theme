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
        <?php 
        if (has_post_thumbnail()) {
            ucsc_pbsci_post_thumbnail();
            echo '<div class="archive-excerpt">';
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
            the_excerpt();
            echo '</div>';
        } else {
            echo '<div class="archive-excerpt-wide">';
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
            the_excerpt();
            echo '</div>';
        }
        
        ?>
        <footer class="entry-footer">
            <?php ucsc_pbsci_entry_footer(); ?>
        </footer><!-- .entry-footer -->
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
<div class="wrap">
    <hr>
</div>