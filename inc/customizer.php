<?php
/**
 * Game Dev Portfolio Theme Customizer
 *
 * @package Game_Dev_Portfolio
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function game_dev_portfolio_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	//////////////////////////////////////////////
	// Add a footer information section.
	$wp_customize->add_section('game-dev-portfolio-footer', array(
		'title'    => __('Footer', 'game-dev-portfolio'),
		'description' => __( 'Adjust the text displayed in the footer, below the widgets.', 'game-dev-portfolio' ),
		'priority' => 105,
	));

	//////////////////////////////////////////////
	// Add a copyright text-field.
	$wp_customize->add_setting('game-dev-portfolio-footer-copyright', array(
		'default'           => '© %s [Name]',
		'capability'        => 'edit_theme_options',
		'type'              => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field', // FIXME: add sanitization!
	));

	$wp_customize->add_control('game-dev-portfolio-footer-copyright', array(
		'type'              => 'text',
		'label'             => __('Copyright', 'game-dev-portfolio'),
		'description'       => __( 'Copyright text displayed in the footer. Add "%s" to the text to display the current year; only one is supported.', 'game-dev-portfolio' ),
		'section'           => 'game-dev-portfolio-footer',
		'settings'          => 'game-dev-portfolio-footer-copyright',
	));

	//////////////////////////////////////////////
	// Add a Display Wordpress checkbox.
	$wp_customize->add_setting('game-dev-portfolio-footer-display-wordpress', array(
		'default'           => 'true',
		'capability'        => 'edit_theme_options',
		'type'              => 'theme_mod',
	));

	$wp_customize->add_control('game-dev-portfolio-footer-display-wordpress', array(
		'type'              => 'checkbox',
		'section'           => 'game-dev-portfolio-footer',
		'settings'          => 'game-dev-portfolio-footer-display-wordpress',
		'label'             => sprintf(
			__('Display "%s"', 'game-dev-portfolio'),
			sprintf(
				__( 'Proudly powered by %s', 'game-dev-portfolio' ),
				__( 'Wordpress' )
				)
			),
	));

	//////////////////////////////////////////////
	// Add a Display Theme checkbox.
	$wp_customize->add_setting('game-dev-portfolio-footer-display-theme', array(
		'default'           => 'true',
		'capability'        => 'edit_theme_options',
		'type'              => 'theme_mod',
	));

	$wp_customize->add_control('game-dev-portfolio-footer-display-theme', array(
		'type'              => 'checkbox',
		'section'           => 'game-dev-portfolio-footer',
		'settings'          => 'game-dev-portfolio-footer-display-theme',
		'label'             => sprintf(
			__('Display "%s"', 'game-dev-portfolio'),
			sprintf(
				__( 'Theme: %s by %s', 'game-dev-portfolio' ),
				__( 'Game Dev Portfolio' ),
				__( 'Taro Omiya' )
				)
			),
	));

	//////////////////////////////////////////////
	// Add a Display Styling checkbox.
	$wp_customize->add_setting('game-dev-portfolio-footer-display-styling', array(
		'default'           => 'true',
		'capability'        => 'edit_theme_options',
		'type'              => 'theme_mod',
	));

	$wp_customize->add_control('game-dev-portfolio-footer-display-styling', array(
		'type'              => 'checkbox',
		'section'           => 'game-dev-portfolio-footer',
		'settings'          => 'game-dev-portfolio-footer-display-styling',
		'label'             => sprintf(
			__('Display "%s"', 'game-dev-portfolio'),
			sprintf(
				__( 'Styled by %s', 'game-dev-portfolio' ),
				__( 'Bulma' )
				)
			),
	));

	//////////////////////////////////////////////
	// Add a Display Icons checkbox.
	$wp_customize->add_setting('game-dev-portfolio-footer-display-icons', array(
		'default'           => 'true',
		'capability'        => 'edit_theme_options',
		'type'              => 'theme_mod',
	));

	$wp_customize->add_control('game-dev-portfolio-footer-display-icons', array(
		'type'              => 'checkbox',
		'section'           => 'game-dev-portfolio-footer',
		'settings'          => 'game-dev-portfolio-footer-display-icons',
		'label'             => sprintf(
			__('Display "%s"', 'game-dev-portfolio'),
			sprintf(
				__( 'Icons by %s', 'game-dev-portfolio' ),
				__( 'FontAwesome' )
				)
			),
	));

	//////////////////////////////////////////////
	// Stuff to accelerate refresh rate.  Requires updating customizer.js
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'game_dev_portfolio_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'game_dev_portfolio_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'game_dev_portfolio_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function game_dev_portfolio_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function game_dev_portfolio_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function game_dev_portfolio_customize_preview_js() {
	wp_enqueue_script( 'game-dev-portfolio-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'game_dev_portfolio_customize_preview_js' );
