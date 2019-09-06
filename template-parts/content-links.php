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
            $itemClass2 = 'researcher_faculty_expertise';
        } elseif (is_page('research-groups-facilities')) {
            echo '<div id="page-' . $pslug . '" class="page-content">';
            get_template_part('template-parts/filter', 'resgroups');
            $postType = 'institutes-centers';
            $itemClass1 = 'research_group_location';
            $itemClass2 = 'researcher_faculty_expertise';
        } elseif (is_page('student-research-opportunities')) {
            echo '<div id="page-' . $pslug . '" class="page-content">';
            get_template_part('template-parts/filter', 'studentopportunities');
            $postType = 'studentopportunities';
            $itemClass1 = 'student_opportunities';
            $itemClass2 = 'opportunity_eligibility';
            $itemClass3 = 'opportunity_availability';
        } elseif (is_page('student-support')) {
            echo '<div id="page-' . $pslug . '" class="page-content">';
            get_template_part('template-parts/filter', 'studentsupport');
            $postType = 'student-support';
            $itemClass1 = 'student_support';
            $itemClass2 = 'opportunity_eligibility';
            $itemClass3 = 'opportunity_availability';
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
                    $current_post_type = get_post_type();
                    $excerpt_wordcount = '30';
                    //Post Type Conditionals
                    //Post Types
                    if ($postType == 'labs') {
                        // get departments ACF
                        $departments = get_field('department_link_global');
                        //Post Type Taxonomies
                        $postTax1 = 'researcher-faculty-labs-tax';
                        $postTax2 = 'resesarch-area-expertise-tax';
                        //Taxonomy Labels
                        $taxLabel1 = 'Categories';
                        $taxLabel2 = 'Expertise';
                        //Terms conditionals
                        if ($postTax1) {
                            $taxTerms1 = get_the_terms($post->ID, $postTax1);
                        }
                        if ($postTax2) {
                            $taxTerms2 = get_the_terms($post->ID, $postTax2);
                        }
                        if ($postTax3) {
                            $taxTerms3 = get_the_terms($post->ID, $postTax3);
                        }
                    } elseif ($postType == 'institutes-centers') {
                        // get departments ACF
                        // $departments = get_field('department_link_global');
                        //Post Type Taxonomies
                        $postTax1 = 'resesarch-group-location-tax';
                        $postTax2 = 'resesarch-area-expertise-tax';
                        //Taxonomy Labels
                        $taxLabel1 = 'Locations';
                        $taxLabel2 = 'Expertise';
                        //Terms conditionals
                        if ($postTax1) {
                            $taxTerms1 = get_the_terms($post->ID, $postTax1);
                        }
                        if ($postTax2) {
                            $taxTerms2 = get_the_terms($post->ID, $postTax2);
                        }
                        if ($postTax3) {
                            $taxTerms3 = get_the_terms($post->ID, $postTax3);
                        }
                    } elseif ($postType == 'student-support') {
                        // get departments ACF
                        $departments = get_field('department_link_global');
                        //Post Type Taxonomies
                        $postTax1 = 'student-support-tax';
                        $postTax2 = 'student-opp-eligib-tax';
                        $postTax3 = 'student-opp-avail-tax';
                        //Taxonomy Labels
                        $taxLabel1 = 'Category';
                        $taxLabel2 = 'Eligibility';
                        $taxLabel3 = 'Availability';
                        //Terms conditionals
                        if ($postTax1) {
                            $taxTerms1 = get_the_terms($post->ID, $postTax1);
                        }
                        if ($postTax2) {
                            $taxTerms2 = get_the_terms($post->ID, $postTax2);
                        }
                        if ($postTax3) {
                            $taxTerms3 = get_the_terms($post->ID, $postTax3);
                        }
                    } elseif ($postType == 'studentopportunities') {
                        // get departments ACF
                        $departments = get_field('department_link_global');
                        //Post Type Taxonomies
                        $postTax1 = 'student-opportunities-tax';
                        $postTax2 = 'student-opp-eligib-tax';
                        $postTax3 = 'student-opp-avail-tax';
                        //Taxonomy Labels
                        $taxLabel1 = 'Category';
                        $taxLabel2 = 'Eligibility';
                        $taxLabel3 = 'Availability';
                        //Terms conditionals
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
                        if ($taxLabel1 != '') {
                            echo '<h4>' . $taxLabel1 . '</h4>';
                        }
                        echo '<ul class="pbsci-taxonomy flex-wrap">';
                        foreach ($taxTerms1 as $taxTerm1) {
                            echo '<li class="itemtaxonomy1"  data-' . $itemClass1 . '="' . $taxTerm1->slug . '">' . $taxTerm1->name . '</li>';
                        }
                        echo '</ul>';
                    }
                    if (!empty($taxTerms2) && !empty($itemClass2)) {
                        if ($taxLabel2 != '') {
                            echo '<h4>' . $taxLabel2 . '</h4>';
                        }
                        echo '<ul class="pbsci-taxonomy flex-wrap">';
                        foreach ($taxTerms2 as $taxTerm2) {
                            echo '<li class="itemtaxonomy2"  data-' . $itemClass2 . '="' . $taxTerm2->slug . '">' . $taxTerm2->name . '</li>';
                        }
                        echo '</ul>';
                    }
                    if (!empty($taxTerms3) && !empty($itemClass3)) {
                        if ($taxLabel3 != '') {
                            echo '<h4>' . $taxLabel3 . '</h4>';
                        }
                        echo '<ul class="pbsci-taxonomy flex-wrap">';
                        foreach ($taxTerms3 as $taxTerm3) {
                            echo '<li class="itemtaxonomy3"  data-' . $itemClass3 . '="' . $taxTerm3->slug . '">' . $taxTerm3->name . '</li>';
                        }
                        echo '</ul>';
                    }
                    // echo '<pre>';
                    // var_dump($current_post_type);
                    // echo '</pre>';
                    // echo '<pre>';
                    // $me = get_post_taxonomies(get_the_ID());
                    // print_r($me);
                    // echo '</pre>';
                    // echo '<pre>';
                    // $you = get_the_terms($post->ID, $postTax1);
                    // print_r($you);
                    // echo '</pre>';
                    echo '<!-- card Blurb Begin --><div class="card-blurb">';
                    ucsc_underscore_custom_excerpt($excerpt_wordcount);
                    echo '</div><!-- card Blurb End -->';

                    if ($departments) :
                        echo '<div aria-hidden="true" class="hidden-data">';
                        echo '<p class="depts">';
                        foreach ($departments as $key => $department) :

                            echo $department->post_name . ' ';
                        endforeach;
                        echo '</p>';
                        echo '</div>';
                    endif;

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