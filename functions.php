<?php
/**
 * Moon functions and definitions
 *
 * @package Moon
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'moon_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function moon_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Moon, use a find and replace
	 * to change 'moon' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'moon', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in multiple locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'moon' ),
                'grid-menu' => __( 'Grid Menu', 'moon' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'moon_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // moon_setup
add_action( 'after_setup_theme', 'moon_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function moon_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'moon' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'moon_widgets_init' );

/**
 * Register scripts and styles.
 */
function moon_register_scripts() {
        // Register html5shiv JS workaround.
        wp_register_script( 'html5shiv', 'http://html5shiv.googlecode.com/svn/trunk/html5.js' );

        // Register Superfish menu plugin.
        wp_register_style( 'superfish', get_template_directory_uri() . '/css/superfish/superfish.css', array(), '1.7.4' );
        wp_register_style( 'superfish-vertical', get_template_directory_uri() . '/css/superfish/superfish-vertical.css', array(), '1.7.4' );
        wp_register_script( 'superfish', get_template_directory_uri() . '/js/superfish/superfish.js', array( 'jquery' ), '1.7.4' );
        wp_register_script( 'hoverintent', get_template_directory_uri() . '/js/superfish/hoverIntent.js', array( 'jquery' ), '1.7.4' );
        
        // Register Three.js WebGL.
        wp_register_script( 'three', get_template_directory_uri() . '/js/three.min.js', array(), '1.7.4');
}
add_action( 'wp_enqueue_scripts', 'moon_register_scripts' );

/**
 * Enqueue scripts and styles.
 */
function moon_scripts() {
        // html5shiv before CSS if lt IE 8
        if( is_ie() && get_browser_version() <= 8 ) {
                wp_enqueue_script( 'html5shiv' );
        }
        
        // Superfish menu plugin
        wp_enqueue_style( 'superfish' );
        wp_enqueue_style( 'superfish-vertical' );
        wp_enqueue_script( 'superfish' );
        wp_enqueue_script( 'hoverintent' );
        
        // Three.js WebGL
        wp_enqueue_script( 'three' );
        
        // CSS overrides for third party CSS files
        wp_enqueue_style('overrides', get_template_directory_uri() . '/css/overrides.css');

	wp_enqueue_style( 'moon-style', get_stylesheet_uri() );

	wp_enqueue_script( 'moon-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'moon-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'moon_scripts' );

/**
 * Load web fonts.
 */
function load_fonts() {
        wp_register_style('googlefonts', 'http://fonts.googleapis.com/css?family=Montserrat:400,700');
        wp_enqueue_style( 'googlefonts');
}
add_action('wp_print_styles', 'load_fonts');

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions and adjustments.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Stylizer that prints css override and governs default values.
 */
require get_template_directory() . '/inc/stylizer.php';

/**
 * Add TGM_Plugin_Activation action.
 */
require get_template_directory() . '/inc/tgm-plugin-activation.php';

/**
 * Custom walker nav menu that adds more CSS classes.
 */
require get_template_directory() . '/inc/moon-walker-nav-menu.php';

/**
 * Temporarily add shortcodes. Create another file if too many.
 */
function moon_image_shortcode( $atts ) {
        $a = shortcode_atts( array(
                'src' => null, 'width' => null, 'height' => null, 'style' => null
        ), $atts);
        
        if( is_null($a['src']) )
            return '';
        else
        {
            $str = '<img src="' . get_template_directory_uri() . '/img/' . esc_attr($a['src']) . '"';
            if( !is_null($a['width']) ) { $str .= ' width="' . $a['width'] . '"'; }
            if( !is_null($a['height']) ) { $str .= ' height="' . $a['height'] . '"'; }
            if( !is_null($a['style']) ) { $str .= ' style="' . $a['style'] . '"'; }
            $str .= '>';
            return $str;
        }
}
add_shortcode( 'moon_image', 'moon_image_shortcode' );

function home_url_shortcode() {
        return get_home_url();
}
add_shortcode( 'home_url', 'home_url_shortcode' );

/**
 * Prettify attachment permalinks with new rules.
 */
function moon_attachment_link( $link, $post_id ){
        $post = get_post( $post_id );
        return home_url( '/images/' . $post->post_name );
}
add_filter( 'attachment_link', 'moon_attachment_link', 20, 2 );

/**
 * Print the attached image with a link to the next attached image.
 */
function moon_the_attached_image() {
	$post                = get_post();
	/**
	 * Retrieve medium size attachment image and URL.
	 */
	$attachment_size     = "medium";
	$attachment_url = wp_get_attachment_url();

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}

/**
 * Add custom field to gallery popup.
 */
function moon_attachment_fields_to_edit( $form_fields, $post ) {
        /*
         * $form_fields is a an array of fields to include in the attachment form.
         * $post is nothing but attachment record in the database.
         * $post->post_type == 'attachment'
         * attachments are considered as posts in WordPress. So value of post_type
         * in wp_posts table will be attachment.
         * input type="text" name/id="attachments[$attachment->ID][custom1]" 
         */
        $form_fields[ "finisheddate" ] = array(
                "label" => __( "Finished Date" ),
                "input" => "text", // default value
                "value" => get_post_meta( $post->ID, "_finisheddate", true ),
                //"helps" => __( "Help string." ),
        );
        return $form_fields;
}
add_filter( "attachment_fields_to_edit", "moon_attachment_fields_to_edit", null, 2 );

function moon_attachment_fields_to_save( $post, $attachment ) {
        /*
         * $attachment part of the form $_POST ($_POST[attachments][postID])
         * $post['post_type'] == 'attachment'
         */
        if( isset( $attachment['finisheddate'] ) ){
                // update_post_meta(postID, meta_key, meta_value);
                update_post_meta( $post['ID'], '_finisheddate', $attachment['finisheddate'] );
        }
        return $post;
}
add_filter( "attachment_fields_to_save", "moon_attachment_fields_to_save", null , 2 );

/**
 * Display navigation to next/previous image when applicable.
 */
function moon_image_nav() {
	$post = get_post();
	$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );

	foreach ( $attachments as $k => $attachment ) {
		if ( $attachment->ID == $post->ID ) {
			break;
		}
	}

	$link = ''; $text ='';
	$attachment_id = 0;
        
        /*
         * Don't print empty markup if there's nowhere to navigate.
         */
        if (! $attachments ) {
                return;
        }
        $previous = isset( $attachments[ $k - 1 ] );
        $next = isset( $attachments[ $k + 1 ] );
        if( ! $previous && ! $next ) {
                return;
        }

        echo '<nav id="image-navigation" class="navigation image-navigation">';
	echo '<div class="nav-links">';

        if( $previous ) {
                $attachment_id = $attachments[ $k - 1 ]->ID;
                $text = '<span class="meta-nav">&larr;</span><div class="wrap-title-nav-previous"><span class="title-nav-previous">'. $attachments[ $k - 1 ]->post_title . '</span></div>';
                $link = wp_get_attachment_link( $attachment_id, 'thumbnail', true, false, $text );
                echo '<div class="previous-image nav-previous">' . $link . '</div>';
        }

        if( $next ) {
                $attachment_id = $attachments[ $k + 1 ]->ID;
                $text = '<span class="meta-nav">&rarr;</span><div class="wrap-title-nav-next"><span class="title-nav-next">'. $attachments[ $k + 1 ]->post_title . '</span></div>';
                $link = wp_get_attachment_link( $attachment_id, 'thumbnail', true, false, $text );
                echo '<div class="next-image nav-next">' . $link . '</div>';
        }
        
        echo '</div>';
        echo '</nav>';
}
