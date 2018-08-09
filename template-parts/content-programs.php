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
    <?php get_template_part( 'template-parts/academics', 'subpages' ); ?>
	<div class="entry-content">
		<?php
        // Call Programs post
        $args = array (
            'post_type' => 'program',
            'orderby' => 'title',
            'order' => 'ASC',
            );
        $program_query = new WP_Query ($args);
        if($program_query->have_posts()): while ($program_query->have_posts()):$program_query->the_post();

        //Set up the parts
        $program_image = get_the_post_thumbnail($post_id, 'thumbnail');
        $program_title = get_the_title();
        $program_subtitle = get_post_meta(get_the_ID(), '_ucsc_program_subtitle_text', true);
        $program_blurb = wpautop(get_post_meta(get_the_ID(), '_ucsc_program_blurb_wysiwyg', true));
        $program_departments = get_post_meta(get_the_ID(), '_ucsc_attached_cmb2_attached_department', true);
        $program_majors = get_post_meta(get_the_ID(), '_ucsc_attached_cmb2_attached_majors', true);
        $postid = get_the_ID();


        // Construct the parts
        echo '<div class="panel-row">';
        echo '<div class="panel-image">'.$program_image.'</div>';
        // echo '<div class="panel-content">';
        echo '<div class="panel-header">';
        echo '<h3>'.$program_title.'</h3>';
        $degree_args = array (
            'taxonomy' => 'degrees-offered',
            'hide_empty' => true,
            // 'fields' => 'names',
            'object_ids' => array($postid),
        );
        $degrees = new WP_Term_Query($degree_args);
        if (!empty($degrees->terms)){
            echo '<div class="panel-degrees-offered">';
            echo '<ul>';
            foreach ($degrees->terms as $degree){
                if ($degree->name != ''){
                echo '<li>'.$degree->name.'</li>';
            }
        }
            echo '</ul>';
            echo '</div>';
            
        }
        if ($program_subtitle !=''){
            echo '<p>'.$program_subtitle.'</p>';
        }
 
        $options_args = array (
            'taxonomy' => 'academic-options',
            'hide_empty' => true,
            // 'fields' => 'names',
            'object_ids' => array($postid),
        );
        $options = new WP_Term_Query($options_args);
        if ($options && !is_wp_error($options)){
            echo '<div class="panel-academic-options">';
            echo '<ul>';
            foreach ($options->terms as $option){
                echo '<li>'.$option->name.'</li>';
            }
            echo '</ul>';
            echo '</div>';
        }
        
        echo '</div>';
        echo '<div class="panel-blurb">'.$program_blurb.'</div>';
        // echo '</div>';//end Program Content
        echo '<div class="panel-footer">';
        echo '<div class="panel-department-link">';
        foreach ($program_departments as $department){
            // $dept_post = get_post($department);
            // $dept_title = $dept_post->post_title;
            $dept_link = esc_url(get_permalink($department));
            echo '<a href="'.$dept_link.'">Department Home</a>';
        }
        echo '</div>';
        echo '<div class="panel-major-link">';
        foreach ($program_majors as $major){
            $maj_link = esc_url(get_permalink($major));
            // var_dump($department);
            // var_dump($dept_link);
            echo '<a href="'.$maj_link.'">Degree Requirements</a>';
        }
        echo '</div>';
        echo '<button class="panel-more-button">More</button>';
        
        
        echo '</div>'; //end Program Footer
        echo '</div>';//end Program Row
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