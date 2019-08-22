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
            $itemClass1 = 'researcher_faculty_labs';
        } elseif (is_page('institutes-and-centers')) {
            echo '<div id="page-' . $pslug . '" class="page-content">';
            $postType = 'institutes-centers';
        } elseif (is_page('student-research-opportunities')) {
            echo '<div id="page-' . $pslug . '" class="page-content">';
            get_template_part('template-parts/filter', 'studentopportunities');
            $postType = 'studentopportunities';
            $itemClass1 = 'student_opportunities';
            $itemClass2 = 'opportunity_eligibility';
            $itemClass3 = 'opportunity_availability';
        } elseif (is_page('student-support')) {
            echo '<div id="page-' . $pslug . '" class="page-content">';
            $postType = 'student-support';
            $itemClass1 = 'student_support';
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
                        $postTax1 = 'researcher-faculty-labs-tax';
                    } elseif ($postType == 'student-support') {
                        $postTax1 = 'student-support-resources-tax';
                    } elseif ($postType == 'studentopportunities') {
                        $postTax1 = 'student-opportunities-tax';
                        $postTax2 = 'student-opp-eligib-tax';
                        $postTax3 = 'student-opp-avail-tax';
                    }
                    if ($postType == 'labs' || $postType == 'student-support' || $postType == 'studentopportunities') {
                        if ($postTax1) {
                            $taxTerms1 = get_the_terms($post->ID, $postTax1);
                        }
                        if ($postTax2) {
                            $taxTerms2 = get_the_terms($post->ID, $postTax2);
                        }
                        if ($postTax3) {
                            $taxTerms3 = get_the_terms($post->ID, $postTax3);
                        }
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
                    if (!empty($taxTerms1) && !empty($itemClass1)) {
                        echo '<ul class="pbsci-taxonomy flex-wrap">';
                        foreach ($taxTerms1 as $taxTerm1) {
                            echo '<li class="itemtaxonomy1"  data-' . $itemClass1 . '="' . $taxTerm1->slug . '">' . $taxTerm1->name . '</li>';
                        }
                        echo '</ul>';
                    }
                    if (!empty($taxTerms2) && !empty($itemClass2)) {
                        echo '<ul class="pbsci-taxonomy flex-wrap">';
                        foreach ($taxTerms2 as $taxTerm2) {
                            echo '<li class="itemtaxonomy"  data-' . $itemClass2 . '="' . $taxTerm2->slug . '">' . $taxTerm2->name . '</li>';
                        }
                        echo '</ul>';
                    }
                    if (!empty($taxTerms3) && !empty($itemClass3)) {
                        echo '<ul class="pbsci-taxonomy flex-wrap">';
                        foreach ($taxTerms3 as $taxTerm3) {
                            echo '<li class="itemtaxonomy"  data-' . $itemClass3 . '="' . $taxTerm3->slug . '">' . $taxTerm3->name . '</li>';
                        }
                        echo '</ul>';
                    }
                    var_dump($taxTerms2);
                    echo '<!-- card Blurb Begin --><div id="cardblurb" class="card-blurb">';
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