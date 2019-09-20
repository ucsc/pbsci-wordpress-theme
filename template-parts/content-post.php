<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UCSC_PBSci
 */
$subtitle = get_field('post_subtitle');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php ucsc_pbsci_post_cats(); ?>
        <div class="two-thirds-left">
            <div class="news-title-containers">
                <?php the_title('<h1 class="entry-title">', '</h1>');
                if ($subtitle) {
                    echo '<p class="news-entry-subtitle">' . $subtitle . '</p>';
                } ?>
            </div>
            <div class="entry-meta">
                <?php
                ucsc_pbsci_posted_by();
                ucsc_pbsci_posted_on();
                ?>
                <h5>Share this story</h5>
                <div class="social-sharing top right">
                    <a class="fab fa-twitter" href=""></a>
                    <a class="fab fa-facebook" href=""></a>
                    <a class="fab fa-youtube" href=""></a>
                    <a class="fab fa-linkedin" href=""></a>
                    <a class="fab fa-reddit" href=""></a>
                </div>
            </div><!-- .entry-meta -->
        </div>

    </header><!-- .entry-header -->

    <?php ucsc_pbsci_post_thumbnail(); ?>

    <div class="entry-content">
        <?php
        the_content(sprintf(
            wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'ucsc-pbsci'),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            get_the_title()
        ));

        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'ucsc-pbsci'),
            'after'  => '</div>',
        ));
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php ucsc_pbsci_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->