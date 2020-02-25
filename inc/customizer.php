<?php
/**
 * UCSC_PBSci Theme Customizer
 *
 * @package UCSC_PBSci
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ucsc_pbsci_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'ucsc_pbsci_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'ucsc_pbsci_customize_partial_blogdescription',
		) );
	}

	// Toggle alternate header
	$wp_customize->add_setting( 'alternate_header_style_active', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'alternate_header_style_active', array(
		'type' => 'checkbox',
		'priority' => 50,
		'section' => 'title_tagline',
		'label' => __( 'Alternate Header Style' ),
		'description' => __( 'Enable the alternate header style. (White header)' ),
	) );
}
add_action( 'customize_register', 'ucsc_pbsci_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function ucsc_pbsci_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function ucsc_pbsci_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ucsc_pbsci_customize_preview_js() {
	wp_enqueue_script( 'ucsc-pbsci-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'ucsc_pbsci_customize_preview_js' );
