<?php

/**
 * Moon Custom Styllizer - prints CSS overrides on html
 * 
 * @package Moon
 */

/** Load definition file for static default css values. */
require_once get_template_directory() . '/inc/definitions.php';

function moon_custom_styles( $styles ) {
    
        $menu_color = esc_html(get_theme_mod( 'menu_color' ));
        if ( isset($menu_color) && ( $menu_color != COLOR__TEXT_MENU ) ) {
                $styles = ".main-navigation a { color: {$menu_color} !important; }"."\n";
	}
        
        // Output all the styles
        wp_add_inline_style( 'moon-style', $styles);
}
add_action( 'wp_enqueue_scripts', 'moon_custom_styles' );

/**
 * Enqueue dashicons script in the header for frontend menu icons.
 */
function moon_enqueue_dashicons() {
	wp_enqueue_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'moon_enqueue_dashicons' );
