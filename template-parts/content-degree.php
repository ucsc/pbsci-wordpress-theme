<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UC_Santa_Cruz
 */

?>
<div class="wrap">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-content">
            <?php

            $degrees_offered = get_field_object('degrees_offered');
            $degrees = $degrees_offered['value'];
            if ($degrees != '') {
                echo '<div id="major-tabs" class="major-tabs">';
                echo '<ul role="tablist">';
                echo '<li id="overview-tab"  role="presentation"><a href="#overview" class="tab-link" data-rel="overview" role="tab">Overview</a></li>';
                if (in_array('phd', $degrees)) :
                    echo '<li id="phd-tab"  role="presentation"><a href="#phd" class="tab-link" data-rel="phd" role="tab">Doctoral</a></li>';
                endif;
                if (in_array('ma', $degrees) || in_array('ms', $degrees)) :
                    echo '<li id="ma-tab"  role="presentation"><a href="#ma" class="tab-link" data-rel="ma" role="tab">Master\'s</a></li>';
                endif;
                if (in_array('designatedemphasis', $degrees)) :
                    echo '<li id="designatedemphasis-tab"  role="presentation"><a href="#designatedemphasis" class="tab-link" data-rel="designatedemphasis" role="tab">Designated Emphasis</a></li>';
                endif;
                if (in_array('contig', $degrees)) :
                    echo '<li id="contig-tab"  role="presentation"><a href="#contig" class="tab-link" data-rel="contig" role="tab">Contiguous Bachelor\'s/Master\'s (4+1)</a></li>';
                endif;
                if (in_array('ba', $degrees) || in_array('bs', $degrees)) {
                    echo '<li id="ba-tab"  role="presentation"><a href="#ba" class="tab-link" data-rel="ba" role="tab">Bachelor\'s</a></li>';
                }
                if (in_array('undergradminor', $degrees) || in_array('gradminor', $degrees)) :
                    echo '<li id="minor-tab"  role="presentation"><a href="#minor" class="tab-link" data-rel="minor" role="tab">Minor</a></li>';
                endif;

                if (in_array('c', $degrees)) :
                    echo '<li id="courses-tab"  role="presentation"><a href="#courses" class="tab-link" data-rel="courses" role="tab">Courses</a></li>';
                endif;
                echo '</ul>';
                echo '</div>';
                echo '<div style="clear:both"></div>';

                echo '<div class="majorcontainers">';
                echo '<section id="overview" class="tab-content">' . get_field('overview') . '</section>';
                if (in_array('ba', $degrees) || in_array('bs', $degrees)) {
                    echo '<section id="ba" class="tab-content">' . get_field('bachelor_degree') . '</section>';
                }
                if (in_array('contig', $degrees)) {
                    echo '<section id="contig" class="tab-content">' . get_field('contiguous_bachelorsmasters') . '</section>';
                }
                if (in_array('ma', $degrees) || in_array('ms', $degrees)) {
                    echo '<section id="ma" class="tab-content">' . get_field('master_degree') . '</section>';
                }
                if (in_array("phd", $degrees)) {
                    echo '<section id="phd" class="tab-content">' . get_field('doctoral_degree') . '</section>';
                }
                if (in_array('designatedemphasis', $degrees)) {
                    echo '<section id="designatedemphasis" class="tab-content">' . get_field('designated_emphasis') . '</section>';
                }
                if (in_array('undergradminor', $degrees)) {
                    echo '<section id="minor" class="tab-content">' . get_field('minor') . '</section>';
                }
                if (in_array("c", $degrees)) {
                    echo '<section id="courses" class="tab-content">' . get_field('courses') . '</section>';
                }
                echo '</div>';
            }

            /**
             *
             * Lots of coding here. Loop to retrieve repeatable
             * fields. Don't want to lose it.
             */
            // $major_components = get_post_meta( get_the_ID(), '_ucsc_major_components_group', true );
            // echo '<div><ul>';
            // foreach ((array) $major_components as $key => $entry){
            //     $component = $content = '';

            //     if (isset($entry['major_component_checkbox'])){
            //         $component = esc_html($entry['major_component_checkbox']);
            //     }

            //     if (isset($entry['major_component_text'])){
            //         $content = wpautop($entry['major_component_text']);
            //         // $content = esc_html($entry['major_component_wysiwyg']);
            //     }

            //     echo '<li>';
            //     echo '<span>'.$component.'</span>';
            //     echo '<span>'.$content.'</span>';
            //     echo '</li>';

            // }
            // echo '</ul></div>';

            /**
             * BEGINNING OF ORIGINAL UNDERSCORES CODE
             */
            the_content(sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'ucsc-underscore'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ));

            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'ucsc-underscore'),
                'after'  => '</div>',
            ));
            ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">
            <?php ucsc_pbsci_entry_footer(); ?>
        </footer><!-- .entry-footer -->
    </article><!-- #post-<?php the_ID(); ?> -->
</div>