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
    <header class="entry-header">
        <div class="entry-meta">
            <?php
            ucsc_pbsci_posted_on();
            ?>
        </div><!-- .entry-meta -->

    </header><!-- .entry-header -->
    <?php ucsc_pbsci_post_thumbnail();
    the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
    ?>


</article><!-- #post-<?php the_ID(); ?> -->