<?php
/**
 * The header for front page template, including front-page.php and home.php.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Moon
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site front">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'moon' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
                <div class="site-branding">
			<h1 class="site-title">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                        <?php //bloginfo( 'name' ); // Stylize in CSS file ?>
                                        <span class="title-top">the</span>
                                        <span class="title-middle">Astropolitan</span>
                                        <span class="title-bottom">project</span>
                                </a>
                        </h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div><!-- .site-branding -->	
            
                <nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Primary Menu', 'moon' ); ?></button>
                        <?php wp_nav_menu( array( 'theme_location' => 'primary',
                                'menu_class' => 'primary-menu sf-menu sf-vertical',
                                'container' => 'div', 'container_class' => 'primary-menu-container',
                                'walker' => new moon_walker_nav_menu ) ); ?>
                                <a href="<?php echo esc_url( home_url( '/about-author/' ) ); ?>" rel="about author">
                        <div id="about-author" class="author-navigation">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/author-icon_c.png" alt="about author">
                             
                        </div><!-- about-author -->
                                </a>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
