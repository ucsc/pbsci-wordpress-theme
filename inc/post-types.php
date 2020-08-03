<?php

/**
 * @todo - move registration out of the plugin.
 */
add_filter( 'register_post_type_args', function( $args, $slug ) {
	if ( $slug === 'department' ) {
		$args['hierarchical'] = true;
		$args['supports'][] = 'page-attributes';
		$args['supports'][] = 'editor';
	}

	return $args;
}, 20, 2 );

/**
 * If we're querying for departments and there is no post_parent, then we only want top-level posts.
 */
add_action( 'pre_get_posts', function ( WP_Query $wp_query ) {
	if ( !$wp_query->is_main_query() ) {
		$post_type = is_array( $wp_query->query_vars['post_type'] ) ? $wp_query->query_vars['post_type'] : [ $wp_query->query_vars['post_type'] ];
		if ( in_array( 'department', $post_type ) && empty( $wp_query->query_vars['post_parent'] ) ) {
			$wp_query->set( 'post_parent', 0 );
		}
	}
} );
