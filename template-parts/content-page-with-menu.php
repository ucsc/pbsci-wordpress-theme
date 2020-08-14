<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UCSC_PBSci
 */
$page_blurb = get_field('page_blurb');

get_template_part( 'template-parts/page-special-menu' )
?>

<div class="wrap">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
		global $post;
		$children = get_pages( array( 'child_of' => $post->ID ) );
		if ( is_page() && ( $post->post_parent || count( $children ) > 0 ) ) {
			$class="show-submenu";
		} else {
			$class="no-submenu";
		}
		$children = get_posts( [ 'post_parent' => $parent->ID, ] );
		?>
		<div class="entry-content">
			<div class="content-wrapper">
				<div class="content <?php print $class; ?>" >
					<?php if (has_excerpt()) {
						the_excerpt();
					} ?>
					<?php the_content(); ?>
					<?php

					wp_link_pages(array(
						'before' => '<div class="page-links">' . esc_html__('Pages:', 'ucsc-pbsci'),
						'after'  => '</div>',
					));
					?>
				</div>
				<?php if (!empty ($children)) : ?>
					<div class="sidebar <?php print $class; ?>">
						<?php get_template_part( 'template-parts/page-submenu' ) ?>
					</div>
				<?php endif; ?>
			</div>
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