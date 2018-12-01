<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UC_Santa_Cruz
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

        <?php get_template_part( 'template-parts/breadcrumbs', 'all' ); ?>
		<?php the_title( '<h1 class="entry-title programs">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php ucsc_underscore_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
        // Call Programs post
        $args = array (
            'post_type' => 'degree',
            'orderby' => 'title',
            'order' => 'ASC',
            );
        $program_query = new WP_Query ($args);
        if($program_query->have_posts()): while ($program_query->have_posts()):$program_query->the_post();

        //Set up the parts
        $program_image = get_the_post_thumbnail($post_id,'thumbnail');
        // $program_image = ucsc_underscore_post_thumbnail();
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
        echo '<!-- Panel Row Begin --><div class="panel-row">';

        if($program_image){
        echo '<!-- Panel Image Begin --><div class="panel-image">';
        // ucsc_underscore_post_thumbnail($post_id,'thumbnail');
        echo $program_image;
        echo '</div><!-- Panel Image End -->';
        // echo '<!-- Panel Image Begin -->'.$program_image.'<!-- Panel Image End -->';
        }
        echo '<!-- Panel Content Begin --><div class="panel-content">';
        echo '<!-- Panel Header Begin --><div class="panel-header">';
        echo '<h3 class="">'.$program_title.'</h3>';
        // Get values from  ACF Checkbox
        if($degrees):
            echo '<!-- Panel Degrees Offered Begin --><div class="panel-degrees-offered">';
            echo '<ul class="panel-list">';
            if(in_array('ba', $degrees)):
                echo '<li class="ba">ba</li>';
            endif;
            if(in_array('bs', $degrees)):
                echo '<li class="bs">bs</li>';
            endif;
            if(in_array('ma', $degrees)):
                echo '<li class="ma">ma</li>';
            endif;
            if(in_array('ms', $degrees)):
                echo '<li class="ms">ms</li>';
            endif;
            if(in_array('phd', $degrees)):
                echo '<li class="phd">phd</li>';
            endif;
            echo '</ul>';
            echo '</div><!-- Panel Degrees Offered End -->';
        endif;
        echo '</div><!-- Panel Header End -->';
        if ($program_subtitle !=''){
            echo '<p>'.$program_subtitle.'</p>';
        }

        if ($degrees):
            echo '<!-- Panel Academic Options Begin --><div class="panel-academic-options">';
            echo '<ul class="panel-list">';
            if(in_array('undergradminor', $degrees)):
                echo '<li>Undergraduate Minor</li>';
            endif;
            if(in_array('gradminor', $degrees)):
                echo '<li>Graduate Minor</li>';
            endif;
            if(in_array('gradcert', $degrees)):
                echo '<li>Graduate Certificate</li>';
            endif;
            if(in_array('undergradhonors', $degrees)):
                echo '<li>Undergraduate Honors</li>';
            endif;
            if(in_array('gradhonors', $degrees)):
                echo '<li>Graduate Honors</li>';
            endif;
            if(in_array('jointmajor', $degrees)):
                echo '<li>Joint Majors</li>';
            endif;
            echo '</ul>';
            echo '</div><!-- Panel Academic Options End -->';
        endif;
        echo '</div><!-- Panel Content End -->';//end Program Content

        echo '<!-- Panel Blurb Begin --><div id="panelblurb'.$postid.'"class="panel-blurb">'.$program_blurb.'</div><!-- Panel Blurb End -->';

        echo '<div class="panel-footer">';
        // echo '<div class="panel-department-link">';
        if($program_departments){
        foreach ($program_departments as $department){
            $dept_post = get_post($department);
            $dept_title = $dept_post->post_title;
            $dept_link = esc_url(get_permalink($department));
            echo '<div class="panel-department-link">';
            echo '<a href="'.$dept_link.'">'.$dept_title.' Department Info</a>';
            echo '</div>';
        }}
        // echo '</div>';
        echo '<div class="panel-major-link">';
            // var_dump($department);
            // var_dump($dept_link);
            echo '<a href="'.esc_url(get_permalink()).'">Degree Requirements</a>';

        echo '</div>';
        echo '<div class="panel-more-button"><button class="panel-toggle" id="'.$postid.'">More</button></div>';


        echo '</div><!-- end Program Footer -->'; //end Program Footer
        echo '</div><!-- Panel Row End -->';//end Program Row
        wp_reset_postdata();
        endwhile; endif;
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ucsc-underscore' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'ucsc-underscore' ),
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