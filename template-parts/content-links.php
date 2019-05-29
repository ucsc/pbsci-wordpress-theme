<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UC_Santa_Cruz
 */

?>
<div class="wrap">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="page-content">
        <div class="flex-wrap">
            <?php
        //Set up post
        //get post-type based on page title
        $postType = get_post_type();
        $pageTitle = get_the_title();
        if ($pageTitle == "Researcher and Faculty Labs") {
            $postType = 'labs';
        } elseif ($pageTitle == "Institutes and Centers") {
            $postType = 'institutes-centers';
        } elseif ($pageTitle == "Student Research Opportunities") {
            $postType = 'studentopportunities';
        } elseif ($pageTitle == "Student Support") {
            $postType = 'student-support';
        }
        var_dump($pageTitle);
        // Call post
        $args = array (
            'post_type' => $postType,
            'orderby' => 'title',
            'order' => 'ASC',
            );
        $post_query = new WP_Query ($args);
        if($post_query->have_posts()): while ($post_query->have_posts()):$post_query->the_post();

        //Set up the parts
        $post_title = get_the_title();
        $post_url = get_field('external_url');
        $post_blurb = get_the_excerpt();
        //Construct the parts
        echo '<!-- Card Container Begin --><div class="card-container">';
        echo '<a href="'.esc_url($post_url).'">';
        ucsc_pbsci_post_thumbnail();
        echo '<!-- card Content Begin --><div class="card-content">';
        echo '<!-- card Header Begin --><div class="card-header">';
        echo '<h3>'.$post_title.'</h3>';
        echo '</div><!-- card Header End -->';
        echo '</div><!-- card Content End -->';//end Program Content
        echo '</a>';
        echo '<!-- card Blurb Begin --><div id="cardblurb'.$postid.'"class="card-blurb">'.$post_blurb.'</div><!-- card Blurb End -->';
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