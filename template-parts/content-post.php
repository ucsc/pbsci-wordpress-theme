<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UCSC_PBSci
 */
// $linkAuthor = get_field('post_author');
// if (!empty($linkAuthor)) {
//     $postAuthor = '<span class="byline">By <span class="author vcard"><a class="url fn n" href="'.$linkAuthor['url'].'">'.$linkAuthor['title'].'</a></span>';
// } else {
//     $postAuthor = ucsc_pbsci_posted_by();
// }
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
                // echo $postAuthor;
                ucsc_pbsci_posted_by();
                ucsc_pbsci_posted_on();
                ?>
                <h5>Share this story:</h5>
                <div class="social-sharing top right">
                    <?php echo do_shortcode('[social]'); ?>
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