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
        <?php if (has_excerpt()) {
            the_excerpt();
        } ?>

        <?php
        global $post;
        $pslug = $post->post_name;
        //Set up posts based on page slug and pull in filters
        if (is_page('faculty-researchers')) {
            echo '<div id="page-' . $pslug . '" class="page-content">';
            get_template_part('template-parts/filter', 'labs');
            $postType = 'labs';
            $itemClass = 'researcher_faculty_labs';
        } elseif (is_page('institutes-and-centers')) {
            echo '<div id="page-' . $pslug . '" class="page-content">';
            $postType = 'institutes-centers';
        } elseif (is_page('student-research-opportunities')) {
            echo '<div id="page-' . $pslug . '" class="page-content">';
            get_template_part('template-parts/filter', 'studentopportunities');
            $postType = 'studentopportunities';
            $itemClass = 'student_opportunities';
        } elseif (is_page('student-support')) {
            echo '<div id="page-' . $pslug . '" class="page-content">';
            $postType = 'student-support';
            $itemClass = 'student_support';
        } ?>
        <div class="list three-col-grid">
            <?php

            // Call post
            $args = array(
                'post_type' => $postType,
                'orderby' => 'title',
                'order' => 'ASC',
            );
            $post_query = new WP_Query($args);
            if ($post_query->have_posts()) : while ($post_query->have_posts()) : $post_query->the_post();

                    //Set up the parts
                    $post_title = get_the_title();
                    $post_url = get_field('external_url');
                    $excerpt_wordcount = '34';
                    if ($postType == 'labs') {
                        $postTax = 'researcher-faculty-labs-tax';
                    } elseif ($postType == 'student-support') {
                        $postTax = 'student-support-resources-tax';
                    } elseif ($postType == 'studentopportunities') {
                        $postTax = 'student-opportunities-tax';
                    }
                    if ($postType == 'labs' || $postType == 'student-support' || $postType == 'studentopportunities') {
                        $taxTerms = get_the_terms($post->ID, $postTax);
                    }
                    //Construct the parts
                    echo '<!-- Card Container Begin --><div class="card-container">';
                    echo '<a href="' . esc_url($post_url) . '">';
                    ucsc_pbsci_post_thumbnail();
                    echo '<!-- card Content Begin --><div class="card-content">';
                    echo '<!-- card Header Begin --><div class="card-header">';
                    echo '<h3 class="post-title">' . $post_title . '</h3>';
                    echo '</div><!-- card Header End -->';
                    echo '</div><!-- card Content End -->'; //end Program Content
                    echo '</a>';
                    if (!empty($taxTerms)) {
                        echo '<ul class="pbsci-taxonomy flex-wrap">';
                        foreach ($taxTerms as $taxTerm) {
                            echo '<li class="itemtaxonomy" data-timestamp="1234" data-' . $itemClass . '="' . $taxTerm->slug . '">' . $taxTerm->name . '</li>';
                        }
                        echo '</ul>';
                    }
                    //print_r($taxTerms);
                    echo '<!-- card Blurb Begin --><div id="cardblurb' . $postid . '"class="card-blurb">';
                    ucsc_underscore_custom_excerpt($excerpt_wordcount);
                    echo '</div><!-- card Blurb End -->';
                    echo '</div><!-- card Row End -->'; //end Program Row
                    wp_reset_postdata();
                endwhile;
            endif;

            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'ucsc-pbsci'),
                'after'  => '</div>',
            ));
            ?>
        </div><!-- End flex-wrap -->
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