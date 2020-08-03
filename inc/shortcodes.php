<?php

/**
 * Department faculty.
 */
add_shortcode( 'department-faculty', function( $attrs = [], $content = '' ) {
	$department = get_post();

	// If there is no "current post", then bail.
	if ( !$department ) {
		return;
	}

	// Find the most-parent item of the current post.
	while ( $department->post_parent > 0 ) {
		$department = get_post( $department->post_parent );
	}

	$query = new WP_Query( [
		'post_type' => 'labs',
		'posts_per_page' => -1,
		'meta_key' => 'last_name',
		'orderby' => 'meta_value',
		'order' => 'ASC',
		'meta_query' => [
			[
				'key' => 'department_link_global',
				'value' => "\"{$department->ID}\"",
				'compare' => 'LIKE',
			]
		]
	] );
	ob_start();
	echo '<div class="query">';
	while( $query->have_posts() ) {
		$query->the_post();
		get_template_part( 'template-parts/filterable-content-row' );
	}
	echo '</div>';

	$query->reset_postdata();
	$output = ob_get_clean();

    wp_reset_postdata();
	return $output;
} );

/**
 * List of department degrees.
 */
add_shortcode( 'department-degrees', function( $attrs = [], $content = '' ) {
	$department = get_post();

	// If there is no "current post", then bail.
	if ( !$department ) {
		return;
	}

	// Find the most-parent item of the current post.
	while ( $department->post_parent > 0 ) {
		$department = get_post( $department->post_parent );
	}

	$query = new WP_Query( [
		'post_type' => 'degree',
		'posts_per_page' => -1,
//		'meta_key' => 'last_name',
//		'orderby' => 'meta_value',
		'order' => 'ASC',
		'meta_query' => [
			[
				'key' => 'department_link_global',
				'value' => "\"{$department->ID}\"",
				'compare' => 'LIKE',
			]
		]
	] );
	ob_start();
    echo '<div class="query">';
	while( $query->have_posts() ) {
		$query->the_post();
		get_template_part( 'template-parts/filterable-content-row', 'degree' );
	}
    echo '</div>';

	$query->reset_postdata();
	$output = ob_get_clean();
    wp_reset_postdata();
	return $output;
} );

/**
 * Get contact info as shortcode
 */
add_shortcode( 'department-contact-info', function( $attrs = [], $content = '' ) {
    $department = get_post();

    // If there is no "current post", then bail.
    if ( !$department ) {
        return;
    }

    // Find the most-parent item of the current post.
	while ( $department->post_parent > 0 ) {
		$department = get_post( $department->post_parent );
	}

    ob_start();
    get_template_part( 'template-parts/department-contact-info');
    $output = ob_get_clean();

    return $output;
} );
