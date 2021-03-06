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
        if (is_page(444)) {
            echo '<div id="page-' . $pslug . '" class="page-content">';
            get_template_part('template-parts/filter', 'labs');
            $postType = 'labs';
            $itemClass1 = 'researcher_faculty_labs';
            $itemClass2 = 'researcher_faculty_expertise';
            //custom arguments
            $labArgs = array(
                'post_type' => $postType,
                'meta_key' => 'last_name',
                'orderby' => 'meta_value',
                'order' => 'ASC',
            );
        } elseif (is_page(440)) {
            echo '<div id="page-' . $pslug . '" class="page-content">';
            get_template_part('template-parts/filter', 'resgroups');
            $postType = 'institutes-centers';
            $itemClass1 = 'research_group_location';
            $itemClass2 = 'researcher_faculty_expertise';
        } elseif (is_page(442)) {
            echo '<div id="page-' . $pslug . '" class="page-content">';
            get_template_part('template-parts/filter', 'studentopportunities');
            $postType = 'studentopportunities';
            $itemClass1 = 'student_opportunities';
            $itemClass2 = 'opportunity_eligibility';
            $itemClass3 = 'opportunity_availability';
        } elseif (is_page(438)) {
            echo '<div id="page-' . $pslug . '" class="page-content">';
            get_template_part('template-parts/filter', 'studentsupport');
            $postType = 'student-support';
            $itemClass1 = 'student_support';
            $itemClass2 = 'opportunity_eligibility';
            $itemClass3 = 'opportunity_availability';
        } elseif (is_page(204)) {
            echo '<div id="page-' . $pslug . '" class="page-content">';
            get_template_part('template-parts/filter', 'support');
            $postType = 'support-science';
            $itemClass1 = 'support_science_category';
            $itemClass2 = 'support_science_interest';
        } ?>
        <div class="list three-col-grid">
            <?php

            // Call post
            if (is_page('faculty-researchers')) {
                $args = $labArgs;
            } else {
                $args = array(
                    'post_type' => $postType,
                    'orderby' => 'title',
                    'order' => 'ASC',
                );
            }

            $post_query = new WP_Query($args);
            if ($post_query->have_posts()) : while ($post_query->have_posts()) : $post_query->the_post();

                    //Set up the parts
                    $post_title = get_the_title();                    
                    $urlSwitch = get_field('external_url_switch');

                    if (get_field('external_url_switch')) : 
                        $post_url = get_field('external_url');
                    else:
                        $post_url = get_permalink();
                    endif;

                    $current_post_type = get_post_type();
                    $excerpt_wordcount = '30';
                    //Post Type Conditionals
                    //Post Types
                    if ($postType == 'labs') {
                        // split the title into an array, then get last word of title
                        $explode_post_title = explode(' ', $post_title);
                        $last_word_post_title = end($explode_post_title);
                        // get departments ACF
                        $departments = get_field('department_link_global');
                        $lastname = get_field('last_name');
                        $lastnameObject = get_field_object('last_name');
                        // Update ACF 'last_name' field with $last_word_post_title
                        update_field('last_name', $last_word_post_title);
                        update_field($lastnameObject['key'], $last_word_post_title);
                        //Post Type Taxonomies
                        $postTax1 = 'researcher-faculty-labs-tax';
                        $postTax2 = 'resesarch-area-expertise-tax';
                        //Taxonomy Labels
                        $taxLabel1 = 'Categories';
                        $taxLabel2 = 'Expertise';
                        //Terms conditionals
                        if ($postTax1) {
                            $taxTerms1 = get_the_terms($post->ID, $postTax1);
                            // $taxTerms1a = $taxTerms1;
                        }
                        if ($postTax2) {
                            $taxTerms2 = get_the_terms($post->ID, $postTax2);
                        }
                        if ($postTax3) {
                            $taxTerms3 = get_the_terms($post->ID, $postTax3);
                        }
                    } elseif ($postType == 'institutes-centers') {
                        // get departments ACF
                        $departments = get_field('department_link_global');
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
                            $taxTerms1a = get_the_terms($post->ID, $postTax1);
                        }
                        if ($postTax2) {
                            $taxTerms2 = get_the_terms($post->ID, $postTax2);
                        }
                        if ($postTax3) {
                            $taxTerms3 = get_the_terms($post->ID, $postTax3);
                        }
                    } elseif ($postType == 'support-science') {
                        // get departments ACF
                        $departments = get_field('department_link_global');
                        //Post Type Taxonomies
                        $postTax1 = 'support-science-cat';
                        $postTax2 = 'support-science-int';
                        // $postTax3 = 'student-opp-avail-tax';
                        //Taxonomy Labels
                        $taxLabel1 = 'Category';
                        $taxLabel2 = 'Interest';

                        //Terms conditionals
                        if ($postTax1) {
                            $taxTerms1 = get_the_terms($post->ID, $postTax1);
                            $taxTerms1a = get_the_terms($post->ID, $postTax1);
                        }
                        if ($postTax2) {
                            $taxTerms2 = get_the_terms($post->ID, $postTax2);
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
                            echo '<p class="taxonomy-label">' . $taxLabel1 . '</p>';
                        }
                        echo '<ul class="pbsci-taxonomy flex-wrap">';
                        foreach ($taxTerms1 as $taxTerm1) {
                            echo '<li class="'.$taxTerm1->slug.'"  data-' . $itemClass1 . '="' . $taxTerm1->slug . '">' . $taxTerm1->name . '</li>';
                        }
                        echo '</ul>';
                        echo '<p aria-hidden="true" class="itemtaxonomy1 hidden-data">';
                        foreach ($taxTerms1 as $taxTerm1a) {
                            echo $taxTerm1a->slug . ' ';
                        }
                        echo '</p>';
                    }
                    if (!empty($taxTerms2) && !empty($itemClass2)) {
                        if ($taxLabel2 != '') {
                            echo '<p class="taxonomy-label">' . $taxLabel2 . '</p>';
                        }
                        echo '<ul class="pbsci-taxonomy flex-wrap">';
                        foreach ($taxTerms2 as $taxTerm2) {
                            echo '<li class="'.$taxTerm2->slug.'"  data-' . $itemClass2 . '="' . $taxTerm2->slug . '">' . $taxTerm2->name . '</li>';
                        }
                        echo '</ul>';
                        echo '<p aria-hidden="true" class="itemtaxonomy2 hidden-data">';
                        foreach ($taxTerms2 as $taxTerm2a) {
                            echo $taxTerm2a->slug . ' ';
                        }
                        echo '</p>';
                    }
                    if (!empty($taxTerms3) && !empty($itemClass3)) {
                        if ($taxLabel3 != '') {
                            echo '<p class="taxonomy-label">' . $taxLabel3 . '</p>';
                        }
                        echo '<ul class="pbsci-taxonomy flex-wrap">';
                        foreach ($taxTerms3 as $taxTerm3) {
                            echo '<li class=""  data-' . $itemClass3 . '="' . $taxTerm3->slug . '">' . $taxTerm3->name . '</li>';
                        }
                        echo '</ul>';
                        echo '<p aria-hidden="true" class="itemtaxonomy3 hidden-data">';
                        foreach ($taxTerms3 as $taxTerm3a) {
                            echo $taxTerm3a->slug . ' ';
                        }
                        echo '</p>';
                    }
                    // echo '<pre>';
                    // var_dump($urlSwitch);
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
                    if ($lastname) :
                        echo '<div aria-hidden="true" class="hidden-data">';
                        echo '<p class="last-name">';
                        echo $lastname;
                        echo '<p>';
                        echo '</div>';
                    endif;
                    // if ($last_word_post_title) :
                    //     echo $last_word_post_title;
                    // endif;
                    // if ($lastnameObject) :
                    //     echo $lastnameObject['key'];
                    //     var_dump($lastnameObject['key']);
                    // endif;
                    echo '<hr class="post-grid"></div><!-- card Container End -->'; //end Program Row
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