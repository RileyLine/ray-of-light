<?php
/**
 * Ray of Light Theme Customizer
 *
 * @package Ray_of_Light
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function rol_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'rol_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'rol_customize_partial_blogdescription',
			)
		);
	}

	$wp_customize->add_panel( 'rol_social_media', array(
		'title' => esc_html__( 'Social Media', 'rol') 
	) );

	// Etsy
	$wp_customize->add_section( 'rol_etsy', array(
		'title' => esc_html__( 'Etsy', 'rol'),
		'panel' => 'rol_social_media'
	) );

	$wp_customize->add_setting( 'rol_etsy_title');
	$wp_customize->add_control( 'rol_etsy_title', array(
		'label' => 'Title',
		'description' => "Enter your link title",
		'section' => 'rol_etsy'
	) );

	$wp_customize->add_setting( 'rol_etsy_url');
	$wp_customize->add_control( 'rol_etsy_url', array(
		'label' => 'URL',
		'description' => "Enter your Etsy url",
		'section' => 'rol_etsy'
	) );


	// Insta
	$wp_customize->add_section( 'rol_insta', array(
		'title' => esc_html__( 'Instagram', 'rol'),
		'panel' => 'rol_social_media'
	) );

	$wp_customize->add_setting( 'rol_insta_title');

	$wp_customize->add_control( 'rol_insta_title', array(
		'label' => 'Title',
		'description' => "Enter your link title",
		'section' => 'rol_insta'
	) );
	$wp_customize->add_setting( 'rol_insta_url');

	$wp_customize->add_control( 'rol_insta_url', array(
		'label' => 'URL',
		'description' => "Enter your Instagram url",
		'section' => 'rol_insta'
	) );

	// Facebook
	$wp_customize->add_section( 'rol_facebook', array(
		'title' => esc_html__( 'Facebook', 'rol'),
		'panel' => 'rol_social_media'
	) );

	$wp_customize->add_setting( 'rol_facebook_title');

	$wp_customize->add_control( 'rol_facebook_title', array(
		'label' => 'Title',
		'description' => "Enter your link title",
		'section' => 'rol_facebook'
	) );
	$wp_customize->add_setting( 'rol_facebook_url');

	$wp_customize->add_control( 'rol_facebook_url', array(
		'label' => 'URL',
		'description' => "Enter your Facebook url",
		'section' => 'rol_facebook'
	) );
}
add_action( 'customize_register', 'rol_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function rol_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function rol_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rol_customize_preview_js() {
	wp_enqueue_script( 'rol-customizer', get_template_directory_uri() . 'assets/js/customizer.js', array( 'customize-preview' ), ROL_VERSION, true );
}
add_action( 'customize_preview_init', 'rol_customize_preview_js' );
