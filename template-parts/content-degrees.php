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

        <div class="entry-content">
        <?php //get_template_part( 'template-parts/filter', 'programs' );?>
        <div class="flex-wrap">
                <?php
                // add custom body class
                add_filter( 'body_class','ucsc_pbsci_add_body_classes' );
                // Call Programs post
                $args = array (
                    'post_type' => 'degree',
                    'orderby' => 'title',
                    'order' => 'ASC',
                    );
        $program_query = new WP_Query ($args);
        if($program_query->have_posts()): while ($program_query->have_posts()):$program_query->the_post();
        //Set up the parts
        $program_title = get_the_title();
        $program_subtitle = get_field('program_subtitle');
        $program_blurb = get_the_excerpt();
        $program_departments = get_field('department_link');
        $program_majors = get_field('major_link');
        $degrees_offered = get_field_object('degrees_offered');
        $degrees = $degrees_offered['value'];
        $academic_options = get_field('additional_academic_options');
        $postid = get_the_ID();
        // debug
        // $meta = get_post_meta($post->ID);
                // echo '<pre>';
                // var_dump($academic_options);
                // echo '</pre>';
//
                // echo '<pre>';
                // var_dump($meta);
                // echo '</pre>';
        // end debug

        // Construct the parts
        // echo '<div class="flex-wrap">';
        echo '<!-- Card Container Begin --><div class="card-container">';
        echo '<a href="'.esc_url(get_permalink()).'">';
        ucsc_pbsci_post_thumbnail();
        echo '<!-- Card Content Begin --><div class="card-content">';
        echo '<!-- Card Header Begin --><div class="card-header">';
        echo '<h3>'.$program_title.'</h3>';
        // Get values from  ACF Checkbox
        if($degrees):
            echo '<!-- Card Degrees Offered Begin --><div class="card-degrees-offered">';
            echo '<ul class="card-list flex-wrap">';
            if(in_array('undergradminor', $degrees)||in_array('gradminor', $degrees)):
                echo '<li class="minor">m.</li>';
            endif;
            if(in_array('ba', $degrees)):
                echo '<li class="ba">B.A.</li>';
            endif;
            if(in_array('bs', $degrees)):
                echo '<li class="bs">B.S.</li>';
            endif;
            if(in_array('ma', $degrees)):
                echo '<li class="ma">M.A.</li>';
            endif;
            if(in_array('ms', $degrees)):
                echo '<li class="ms">M.S.</li>';
            endif;
            if(in_array('phd', $degrees)):
                echo '<li class="phd">Ph.D.</li>';
            endif;
            echo '</ul>';
            echo '</div><!-- Panel Degrees Offered End -->';
        endif;
        echo '</div><!-- Panel Header End -->';
        if ($program_subtitle !=''){
            echo '<p>'.$program_subtitle.'</p>';
        }
        echo '</div><!-- Card Content End -->';//end Program Content
        // echo '<div class="card-major-link">';
            // var_dump($department);
            // var_dump($dept_link);
        // echo '<a href="'.esc_url(get_permalink()).'"><span>Degree Requirements</span></a>';


        // echo '</div>';
        // if ($program_blurb){
            // echo '<div class="card-more-button"><button class="panel-toggle" id="'.$postid.'">More</button></div>';
        // }
        // echo '</div><!-- end Program Footer -->'; //end Program Footer
        echo '</a>';
        echo '</div><!-- Card Content End -->';//end Card Content
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