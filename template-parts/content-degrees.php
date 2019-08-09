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
        <div class="page-content">
            <?php get_template_part('template-parts/filter', 'programs'); ?>
            <div class="three-col-grid">
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
                        echo '<!-- Card Container Begin --><div id="card-container" class="card-container" data-degrees=\'[';
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
                            foreach ($departments as $key => $post) :
                                setup_postdata($post);
                                if ($key !== count($departments) - 1) {
                                    echo '"' . $post->post_name . '",';
                                } else {
                                    echo '"' . $post->post_name . '"';
                                }
                            endforeach;
                            wp_reset_postdata();
                        endif;
                        echo ']\'';
                        echo '>';
                        echo '<a href="' . esc_url(get_permalink()) . '">';
                        ucsc_pbsci_post_thumbnail();
                        echo '<!-- Card Content Begin --><div class="card-content">';
                        echo '<!-- Card Header Begin --><div class="card-header">';
                        echo '<h3>' . $program_title . '</h3>';
                        // Get values from  ACF Checkbox
                        if ($degrees) :
                            echo '<!-- Card Degrees Offered Begin --><div class="card-degrees-offered">';
                            echo '<ul class="card-list flex-wrap">';
                            if (in_array('undergradminor', $degrees) || in_array('gradminor', $degrees)) :
                                echo '<li class="minor">m.</li>';
                            endif;
                            if (in_array('ba', $degrees)) :
                                echo '<li class="ba">B.A.</li>';
                            endif;
                            if (in_array('bs', $degrees)) :
                                echo '<li class="bs">B.S.</li>';
                            endif;
                            if (in_array('ma', $degrees)) :
                                echo '<li class="ma">M.A.</li>';
                            endif;
                            if (in_array('ms', $degrees)) :
                                echo '<li class="ms">M.S.</li>';
                            endif;
                            if (in_array('phd', $degrees)) :
                                echo '<li class="phd">Ph.D.</li>';
                            endif;
                            echo '</ul>';
                            echo '</div><!-- Panel Degrees Offered End -->';
                        endif;
                        echo '</div><!-- Panel Header End -->';
                        if ($program_subtitle != '') {
                            echo '<p>' . $program_subtitle . '</p>';
                        }
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