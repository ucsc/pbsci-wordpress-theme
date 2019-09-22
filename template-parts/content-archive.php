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
        <?php
        if (is_singular()) :
            if ('post' === get_post_type()) :
                ?>
        <div class="entry-meta">
            <?php
                            ucsc_pbsci_posted_on();
                            ?>
        </div><!-- .entry-meta -->
        <?php endif;
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;
        ?>

    </header><!-- .entry-header -->

    <footer class="entry-footer">
        <?php ucsc_pbsci_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->