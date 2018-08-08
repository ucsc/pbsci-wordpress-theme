<?php
/**
 * Template Name: Left Sidebar Page Template
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UC_Santa_Cruz
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<!-- <div class="row"> -->
		<?php
		while ( have_posts() ) :
			the_post();
			$slug = get_post_field('post_name',get_post());
			if( $slug === 'academics' ) :
				get_template_part( 'template-parts/content', $slug );
			elseif( $slug === 'departments' ) :
				get_template_part( 'template-parts/content', $slug );
			elseif( $slug === 'programs' ) :
				get_template_part( 'template-parts/content', $slug );
		  else :
				//get_template_part( 'template-parts/content', get_post_format() );
				get_template_part( 'template-parts/content', 'page' );
		  endif;



			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		<!-- </div> -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
