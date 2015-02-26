<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Moon
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function moon_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'moon_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function moon_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'moon_body_classes' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function moon_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}

	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'moon' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'moon_wp_title', 10, 2 );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function moon_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'moon_setup_author' );

/**
 * Generates nested divs for golden ratio grid.
 * Number of rows and columns will be 2^$iter-x and 2^$iter-y.
 * 
 * @param integer $iter_x Number of x-grid is 2^$iter_x
 * @param integer $iter_y Number of y-grid is 2^$iter_y
 * @return string Nested divs of one's and phi's.
 */
function moon_golden_grid( $iter_x, $iter_y, $callback ) {
        /**
         * Check sanity of iteration counters.
         */
        if( !is_int($iter_x) || !is_int($iter_y) ) {
                return "Error: input must be an integer type.";
        }

        /**
         * Define anonymous function for recursive calls.
         */
        $split = function( $x, $y, $iter_x, $iter_y, callable $callback ) use( &$split ) {
                if( $iter_x <= 0 ){
                        if( $iter_y <= 0 ) {
                                $str .= "<div id=\"grid-" . $x . $y . "\">\n";
                                $str .= $callback( $x, $y ); // Callback with coordinate argument
                                $str .= "</div>\n";
                        }
                        else {
                                $str .= "<div class=\"phi-y\">\n";
                                $str .= $split( $x, $y - pow(2, ($iter_y - 1)), $iter_x, $iter_y - 1, $callback );
                                $str .= "</div>\n<div class=\"one-y\">\n";
                                $str .= $split( $x, $y, $iter_x, $iter_y - 1, $callback );
                                $str .= "</div>\n";
                        }
                }
                else {
                        $str .= "<div class=\"one-x\">\n";
                        $str .= $split( $x - pow(2, ($iter_x - 1)), $y, $iter_x - 1, $iter_y, $callback );
                        $str .= "</div>\n<div class=\"phi-x\">\n";
                        $str .= $split( $x, $y, $iter_x - 1, $iter_y, $callback );
                        $str .= "</div>\n";
                }
                return $str;
        };
        
        return $split( pow(2, $iter_x), pow(2, $iter_y), $iter_x, $iter_y, $callback );
}
