<?php
/**
 * KC Realty Theme Customizer
 *
 * @package KC Realty
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 *
 * @uses 	get_setting()
 */
function kcrealty_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

} // kcrealty_customize_register()
add_action( 'customize_register', 'kcrealty_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @uses 	wp_enqueue_script()
 * @uses 	get_template_directory_uri()
 */
function kcrealty_customize_preview_js() {

	wp_enqueue_script( 'kcrealty_customizer', get_template_directory_uri() . '/js/customizer.min.js', array( 'customize-preview' ), '20130508', true );

} // kcrealty_customize_preview_js()
add_action( 'customize_preview_init', 'kcrealty_customize_preview_js' );
