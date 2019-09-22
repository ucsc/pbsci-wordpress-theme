<?php

/**
 * Template part for displaying DEGREES archive content in page.php
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
        <div id="degree_cards" class="page-content">
            <?php get_template_part('template-parts/filter', 'programs'); ?>
            <div class="list three-col-grid">
                <?php
                // Call Programs post
                $args = array(
                    'post_type' => 'degree',
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'posts_per_page' => '-1'
                );
                $program_query = new WP_Query($args);
                if ($program_query->have_posts()) : while ($program_query->have_posts()) : $program_query->the_post();
                        //Set up the parts
                        $program_title = get_the_title();
                        $program_subtitle = get_field('program_subtitle');
                        $program_blurb = get_the_excerpt();
                        $program_departments = get_field('department_link');
                        $program_majors = get_field('major_link');
                        $degrees_offered = get_field_object('degrees_offered');
                        $degrees = $degrees_offered['value'];
                        $departments = get_field('department_link');
                        $postid = get_the_ID();
                        // debug
                        // $meta = get_post_meta($post->ID);
                        // echo '<pre>';
                        // var_dump($departments);
                        // echo '</pre>';
                        // end debug
                        // if ($departments) :
                        // echo count($departments);
                        // endif;
                        // Construct the parts
                        echo '<!-- Card Container Begin --><div id="card_container" class="card-container" data-degrees=\'[';
                        foreach ($degrees as $key => $degree) {
                            if ($key !== count($degrees) - 1) {
                                echo '"' . $degree . '",';
                            } else {
                                echo '"' . $degree . '"';
                            }
                        };
                        echo ']\' ';
                        echo 'data-departments=\'[';
                        if ($departments) :
                            foreach ($departments as $key => $department) :
                                if ($key !== count($departments) - 1) {
                                    echo '"' . $department->post_name . '",';
                                } else {
                                    echo '"' . $department->post_name . '"';
                                }
                            endforeach;
                        endif;
                        echo ']\'';
                        echo '>';
                        echo '<a href="' . esc_url(get_permalink()) . '">';
                        ucsc_pbsci_post_thumbnail();
                        echo '<!-- Card Content Begin --><div class="card-content">';
                        echo '<!-- Card Header Begin --><div class="card-header">';
                        echo '<h3 class="card-title">' . $program_title . '</h3>';
                        // Get values from  ACF Checkbox
                        if ($degrees) :
                            echo '<!-- Card Degrees Offered Begin --><div id="degrees_offered" class="card-degrees-offered">';
                            echo '<ul class="card-list flex-wrap">';
                            if (in_array('phd', $degrees)) :
                                echo '<li class="program phd">Ph.D.</li>';
                            endif;
                            if (in_array('ma', $degrees)) :
                                echo '<li class="program ma">M.A.</li>';
                            endif;
                            if (in_array('ms', $degrees)) :
                                echo '<li class="program ms">M.S.</li>';
                            endif;
                            if (in_array('designatedemphasis', $degrees)) :
                                echo '<li class="program designatedemphasis bs">D.E.</li>';
                            endif;
                            if (in_array('contig', $degrees)) :
                                echo '<li class="program contig ma">4+1</li>';
                            endif;
                            if (in_array('ba', $degrees)) :
                                echo '<li class="ba">B.A.</li>';
                            endif;
                            if (in_array('bs', $degrees)) :
                                echo '<li class="bs">B.S.</li>';
                            endif;
                            if (in_array('undergradminor', $degrees)) :
                                echo '<li class="minor">Min.</li>';
                            endif;
                            echo '</ul>';
                            echo '</div><!-- Panel Degrees Offered End -->';
                        endif;
                        echo '</div><!-- Panel Header End -->';
                        if ($program_subtitle != '') {
                            echo '<p class="card-subtitle">' . $program_subtitle . '</p>';
                        }
                        echo '<div aria-hidden="true" class="hidden-data">';
                        if ($departments) :
                            echo '<p class="depts">';
                            foreach ($departments as $key => $department) :

                                echo $department->post_name . ' ';
                            endforeach;
                            echo '</p>';
                            echo '<ul class="hidden-dept-list">';
                            foreach ($departments as $key => $department2) :

                                echo '<li class="dept">' . $department->post_name . '</li>';
                            endforeach;
                            echo '</ul>';
                        endif;
                        if ($degrees) :
                            echo '<p class="programHidden">';
                            foreach ($degrees as $degree) :
                                echo $degree . ' ';
                            endforeach;
                            echo '</p>';
                        endif;
                        echo '</div>';

                        echo '</div><!-- Card Content End -->'; //end Program Content
                        echo '</a>';
                        echo '</div><!-- Card Content End -->'; //end Card Content
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