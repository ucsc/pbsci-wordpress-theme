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
		<!-- breadcrumbs -->
		<div class="breadcrumbs">
			<p>
			<?php if (function_exists('yoast_breadcrumb')){
				yoast_breadcrumb();
			}?>
			</p>
		</div>
		<?php the_title( '<h1 class="entry-title departments">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php ucsc_underscore_post_thumbnail(); ?>
	<?php get_template_part( 'template-parts/academics', 'subpages' ); ?>
	<div class="entry-content">
		<?php
		echo '<ul>';
		// Call Departments post
        $args = array (
            'post_type' => 'department',
            'orderby' => 'title',
            'order' => 'ASC',
            );
        $department_query = new WP_Query ($args);
        if($department_query->have_posts()): while ($department_query->have_posts()):$department_query->the_post();

		//Set up the parts
		$department_title = get_the_title();
		$department_url = get_permalink();
		//Construct the parts
		if ($department_title !=""){
			echo '<li><a href="'.esc_url($department_url).'"><p>'.$department_title.'</p></a></li>';
		}
		wp_reset_postdata();
	endwhile; endif;
	echo '</ul>';
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
