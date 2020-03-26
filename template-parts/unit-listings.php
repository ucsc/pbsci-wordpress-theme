<?php
if( have_rows('unit_listings') ):
	while ( have_rows('unit_listings') ) : the_row();
		$unit_category = get_sub_field('unit_category');
		$unit_label = get_sub_field('unit_label');?>
		<h2 class="unit-heading"><?php print $unit_label; ?></h2>
		<div class="query units-wrapper">
		<?php
		// Create a new WP_Query on the desired post type.
		$query = new WP_Query( [
			'post_type' => 'department',
			'tax_query' => [
				[
					'taxonomy' => 'unit-category',
					'field' => 'term_id',
					'terms' => $unit_category,
				],
			],
			'posts_per_page' => -1,
			'orderby' => 'title',
			'order' => 'ASC',
			'ignore_sticky_posts' => true,
		] );
		if ( $query->have_posts() ) { 
			while ( $query->have_posts() ) {
				$query->the_post();
				$templates = [
					'template-parts/unit-listings-content-row.php'
				];

				include( locate_template( $templates, false, false ) );
			}
			wp_reset_query();
		} ?>
		</div>
		<?php 
	endwhile;
endif;
