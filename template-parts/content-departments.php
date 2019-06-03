<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UC_Santa_Cruz
 */
 $page_blurb = get_field('page_blurb');
?>
<div class="wrap">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if(has_excerpt()) {
    the_excerpt();
}?>
        <div class="page-content">
        <div class="flex-wrap">
            <?php

        // Call Departments post
        $args = array (
            'post_type' => 'department',
            'orderby' => 'title',
            'order' => 'ASC',
            );
        $department_query = new WP_Query ($args);
        if($department_query->have_posts()): while ($department_query->have_posts()):$department_query->the_post();

        //Set up the parts
        $department_title = get_the_title();
        $department_url = get_field('department_website');
        $department_blurb = get_field('department_blurb');
        //Construct the parts
        echo '<!-- Card Container Begin --><div class="card-container">';
        ucsc_pbsci_post_thumbnail();
        echo '<!-- card Content Begin --><div class="card-content">';
        echo '<!-- card Header Begin --><div class="card-header">';
        echo '<a href="'.esc_url($department_url).'"><h3>'.$department_title.'</h3></a>';
        echo '</div><!-- card Header End -->';
        echo '</div><!-- card Content End -->';//end Program Content
        echo '<!-- card Blurb Begin --><div id="cardblurb'.$postid.'"class="card-blurb">'.$department_blurb.'</div><!-- card Blurb End -->';
        echo '</div><!-- card Row End -->';//end Program Row
        wp_reset_postdata();
    endwhile; endif;

        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ucsc-pbsci' ),
            'after'  => '</div>',
        ) );
        ?>
        </div><!-- End flex-wrap -->
        </div><!-- .entry-content -->

        <?php if ( get_edit_post_link() ) : ?>
        <footer class="entry-footer">
            <?php
            edit_post_link(
                sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Edit <span class="screen-reader-text">%s</span>', 'ucsc-pbsci' ),
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