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
		$department_blurb = get_field('department_blurb');
		//Construct the parts
		echo '<!-- Panel Row Begin --><div class="panel-row">';
		ucsc_pbsci_post_thumbnail();
		echo '<!-- Panel Content Begin --><div class="panel-content">';
        echo '<!-- Panel Header Begin --><div class="panel-header">';
		echo '<a href="'.esc_url($department_url).'"><h3>'.$department_title.'</h3></a>';
		echo '</div><!-- Panel Header End -->';
		echo '</div><!-- Panel Content End -->';//end Program Content
		echo '<!-- Panel Blurb Begin --><div id="panelblurb'.$postid.'"class="panel-blurb">'.$department_blurb.'</div><!-- Panel Blurb End -->';
		echo '</div><!-- Panel Row End -->';//end Program Row
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