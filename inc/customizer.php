<?php
/**
 * Moon Theme Customizer
 *
 * @package Moon
 */

/** Load definition file for static default css values. */
require_once get_template_directory() . '/inc/definitions.php';

/**
 * Implement additions and adjustments to the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function moon_customize_register( $wp_customize ) {
        // Add postMessage support for site title and description for the Theme Customizer.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
        
        // Add the menu color setting and control.
        $wp_customize->add_setting(
            'menu_color',
            array(
                'default'           => COLOR__TEXT_MENU,
                'sanitize_callback' => 'sanitize_hex_color',
                'transport'         => 'postMessage'
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'menu_color',
                array(
                    'label' => __('Menu Color', 'moon'),
                    'section' => 'colors',
                    'settings' => 'menu_color',
                    'priority' => 20
                )
            )
        ); 
}
add_action( 'customize_register', 'moon_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function moon_customize_preview_js() {
	wp_enqueue_script( 'moon_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'moon_customize_preview_js' );
