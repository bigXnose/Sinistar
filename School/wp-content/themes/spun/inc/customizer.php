<?php
/**
 * Spun Theme Customizer
 *
 * @package Spun
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function spun_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	// Create the Theme Options section
	$wp_customize->add_section( 'spun_theme_options', array(
		'title'             => __( 'Theme Options', 'spun' ),
	) );
	
	$wp_customize->add_setting( 'spun_grayscale', array(
		'default'		    => false,
		'type'			    => 'theme_mod',
		'capability'	    => 'edit_theme_options',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'spun_grayscale', array(
		'label'			    => __( 'Always show color circles', 'spun' ),
		'section'		    => 'spun_theme_options',
		'type'              => 'checkbox',
		'priority'		    => 1,
	) );
	
	$wp_customize->add_setting( 'spun_titles', array(
		'default'		    => false,
		'type'			    => 'theme_mod',
		'capability'	    => 'edit_theme_options',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'spun_titles', array(
		'label'			    => __( 'Always show post titles over circles', 'spun' ),
		'section'		    => 'spun_theme_options',
		'type'              => 'checkbox',
		'priority'		    => 2,
	) );
	
	$wp_customize->add_setting( 'spun_opacity', array(
		'default'		    => false,
		'type'			    => 'theme_mod',
		'capability'	    => 'edit_theme_options',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'spun_opacity', array(
		'label'			    => __( 'Fully opaque meta', 'spun' ),
		'section'		    => 'spun_theme_options',
		'type'              => 'checkbox',
		'priority'		    => 3,
	) );
}
add_action( 'customize_register', 'spun_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function spun_customize_preview_js() {
	wp_enqueue_script( 'spun_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20131113', true );
}
add_action( 'customize_preview_init', 'spun_customize_preview_js' );