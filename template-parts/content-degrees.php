<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UC_Santa_Cruz
 */

?>
<div class="crumbs">
    <div class="wrap">
        <?php get_template_part( 'template-parts/breadcrumbs','all' ); ?>
    </div>
</div>
<div class="wrap">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="entry-content">
            <div class="flex-wrap">
                <?php
                //AJAX Search
                // get_template_part( 'template-parts/degrees', 'search' );
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
        echo '<!-- Card Container Begin --><div class="card-container">';
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

        // if ($degrees):
        //     echo '<!-- Card Academic Options Begin --><div class="card-academic-options">';
        //     echo '<ul class="card-list">';
        //     if(in_array('undergradminor', $degrees)):
        //         echo '<li>Undergraduate Minor</li>';
        //     endif;
        //     if(in_array('gradminor', $degrees)):
        //         echo '<li>Graduate Minor</li>';
        //     endif;
        //     if(in_array('gradcert', $degrees)):
        //         echo '<li>Graduate Certificate</li>';
        //     endif;
        //     if(in_array('undergradhonors', $degrees)):
        //         echo '<li>Undergraduate Honors</li>';
        //     endif;
        //     if(in_array('gradhonors', $degrees)):
        //         echo '<li>Graduate Honors</li>';
        //     endif;
        //     if(in_array('jointmajor', $degrees)):
        //         echo '<li>Joint Majors</li>';
        //     endif;
        //     echo '</ul>';
        //     echo '</div><!-- Panel Academic Options End -->';
        // endif;
        echo '</div><!-- Card Content End -->';//end Program Content

        // echo '<!-- Card Blurb Begin --><div id="panelblurb'.$postid.'"class="card-blurb">'.$program_blurb.'</div><!-- Card Blurb End -->';

        // echo '<div class="card-footer">';
        // echo '<div class="card-department-link">';
        // if($program_departments){
        // foreach ($program_departments as $department){
        //     $dept_post = get_post($department);
        //     $dept_title = $dept_post->post_title;
        //     $dept_link = esc_url(get_permalink($department));
        //     echo '<div class="card-department-link">';
        //     echo '<a href="'.$dept_link.'"><span>'.$dept_title.' Department Info</span></a>';
        //     echo '</div>';
        //     }
        // }
        // echo '</div>';
        echo '<div class="card-major-link">';
            // var_dump($department);
            // var_dump($dept_link);
            echo '<a href="'.esc_url(get_permalink()).'"><span>Degree Requirements</span></a>';

        echo '</div>';
        // if ($program_blurb){
            // echo '<div class="card-more-button"><button class="panel-toggle" id="'.$postid.'">More</button></div>';
        // }
        // echo '</div><!-- end Program Footer -->'; //end Program Footer
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