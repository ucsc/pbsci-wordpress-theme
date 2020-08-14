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

	// Toggle to show both custom logo and site title
    $wp_customize->add_setting( 'custom_logo_with_title', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'custom_logo_with_title', array(
        'type' => 'checkbox',
        'priority' => 49,
        'section' => 'title_tagline',
        'label' => __( 'Show logo and site title' ),
        'description' => __( 'If custom logo is uploaded, it will replace site title unless this box is checked' ),
    ) );

    // Custom Watermark
    $wp_customize->add_setting( 'watermark', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '',
    ) );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'watermark',
            array(
                'label'      => __( 'Upload a Watermark'),
                'section'    => 'title_tagline',
                'settings'   => 'watermark',
            )
        )
    );

    // remove the stock "show title" checkbox
    $wp_customize->remove_control('display_header_text');

    // Alert Bar
    $wp_customize->add_section('alert_bar', array(
        'title' => 'Alert Bar',
        'description' => '',
        'priority' => 20,
    ));
    $wp_customize->add_setting( 'alert_bar_active', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'alert_bar_active', array(
        'type' => 'checkbox',
        'priority' => 10,
        'section' => 'alert_bar',
        'label' => __( 'Alert Bar Active' ),
        'description' => __( 'Enable the alert bar.' ),
    ) );
    $wp_customize->add_setting( 'alert_bar_text', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'alert_bar_text', array(
        'type' => 'textarea',
        'priority' => 20,
        'section' => 'alert_bar',
        'label' => __( 'Alert Message' ),
        'description' => __( '' ),
    ) );
    $wp_customize->add_setting( 'alert_url', array(
        'default' => '',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => '',
        'sanitize_callback' => 'esc_url',
    ) );
    $wp_customize->add_control( 'alert_url', array(
        'type' => 'url',
        'priority' => 30,
        'section' => 'alert_bar',
        'label' => __( 'Call to Action URL', 'textdomain' ),
        'description' => '',
    ) );
    $wp_customize->add_setting( 'alert_cta', array(
        'default' => 'View Details',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'alert_cta', array(
        'type' => 'text',
        'priority' => 40,
        'section' => 'alert_bar',
        'label' => __( 'Call to Action Button Text' ),
        'description' => '',
    ) );
    $wp_customize->add_setting( 'alert_cta', array(
        'default' => 'View Details',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'alert_cta', array(
        'type' => 'text',
        'priority' => 40,
        'section' => 'alert_bar',
        'label' => __( 'Call to Action Button Text' ),
        'description' => '',
    ) );
    $wp_customize->add_setting( 'alert_type', array(
            'default' => 'notice',
            'transport' => 'refresh',
     ) );

    $wp_customize->add_control( 'alert_type',
        array(
            'label' => __( 'Alert Type' ),
            'description' => esc_html__( 'This will affect the color scheme of the alert' ),
            'section' => 'alert_bar',
            'priority' => 50,
            'type' => 'select',
            'choices' => array( // Optional.
                'notice' => __( 'Notice' ),
                'emergency' => __( 'Emergency' ),
            )
        )
    );
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
