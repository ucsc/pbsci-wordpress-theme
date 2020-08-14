<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UCSC_PBSci
 */
$page_blurb = get_field('page_blurb');

get_template_part( 'template-parts/page-special-menu' )
?>

<div class="wrap">

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="entry-content">
            <div class="content-wrapper">
                <div class="content" >
                    <?php if (has_excerpt()) {
                        the_excerpt();
                    } ?>
			        <?php the_content(); ?>
			        <?php

			        wp_link_pages(array(
				        'before' => '<div class="page-links">' . esc_html__('Pages:', 'ucsc-pbsci'),
				        'after'  => '</div>',
			        ));
			        ?>
                </div>
            </div>
        </div><!-- .entry-content -->
        <?php if (get_edit_post_link()) : ?>
        <footer class="entry-footer">
            <?php
                    edit_post_link(
                        sprintf(
                            wp_kses(
                                /* translators: %s: Name of current post. Only visible to screen readers */
                                __('Edit <span class="screen-reader-text">%s</span>', 'ucsc-pbsci'),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            get_the_title()
                        ),
                        '<span class="edit-link">',
                        '</span>'
                    );
                    ?>
        </footer><!-- .entry-footer -->
        <?php endif; ?>
    </article><!-- #post-<?php the_ID(); ?> -->
</div>