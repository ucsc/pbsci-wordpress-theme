<?php
// Create a map from official taxonomy name to slug created from the label.
$taxonomy_filters = get_field('fc_filter_taxonomy');
$taxonomy_filter_groups = [];
if ( !empty( $taxonomy_filters ) ) {
	foreach ($taxonomy_filters as $filter) {
		$taxonomy_filter_groups[ $filter['filter_taxonomy'] ] = ucsc_make_slug( $filter['filter_label'] );
	}
}

// Create a map from official ACF field name to slug created from the label.
$field_filters = get_field('fc_filter_field');
$field_filter_groups = [];
if ( !empty( $field_filters )) {
	foreach ($field_filters as $filter) {
		$field_filter_groups[ $filter['filter_field'] ] = ucsc_make_slug( $filter['filter_label'] );
	}
}
// Create a new WP_Query on the desired post type.
$post_type = get_field( 'fc_query_post_type' );
$query = new WP_Query( [
	'post_type' => $post_type['value'],
	'posts_per_page' => -1,
	'orderby' => 'title',
	'order' => 'ASC',
	'ignore_sticky_posts' => true,
] );

// Get all post IDs in the query results.
$post_ids = array_map( function( $post ) { return $post->ID; }, $query->posts );
$terms_by_post = ucsc_get_all_terms_for_posts( $post_ids );

if ( $query->have_posts() ) { 
	while ( $query->have_posts() ) {
		$query->the_post();
		$row_classes = [];

		// Add taxonomy terms as classes on the row.
		$post_terms = [];
		if ( !empty( $terms_by_post[ get_the_ID() ] ) ) {
			$post_terms = $terms_by_post[ get_the_ID() ];
		}

		foreach ( $post_terms as $term ) {
			$row_classes[] = $taxonomy_filter_groups[ $term->taxonomy ] . '--' . $term->slug;
		}

		// Add departments as classes on the row.
		$departments = get_field('department_link_global');
		if ( $departments ) {
			foreach ($departments as $department) {
				$row_classes[] ='department--'.$department->post_name;
			}
		}

		// Add field values on the row for any field used as a filter.
		if ( !empty( $field_filters ) ) {
			foreach ($field_filters as $filter) {
				$field_values = get_field( $filter['filter_field'] );
				if ( $field_values ) {
					if ( !is_array( $field_values ) ) {
						$field_values = [ $field_values ];
					}

					foreach ($field_values as $field_value) {
						$row_classes[] = $field_filter_groups[ $filter['filter_field'] ] . '--' . $field_value;
					}
				}
			}
		}

		$templates = [
			'template-parts/filterable-content-row-' . get_post_type() . '.php',
			'template-parts/filterable-content-row.php'
		];

		include( locate_template( $templates, false, false ) );
	}
	wp_reset_query();
}
