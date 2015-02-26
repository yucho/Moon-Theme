<?php
/**
 * Template Name: Golden Grid 2
 * 
 * An experimental page template displaying golden ratio layout
 * helps developers to visualize landmarks to align contents on the page.
 *
 * @package Moon
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class('grid-page'); ?>>

            <!--
		<main id="main" class="site-main" role="main">

			<?php //while ( have_posts() ) : the_post(); ?>

				<?php //get_template_part( 'content', 'page' ); ?>

			<?php //endwhile; // end of the loop. ?>

		</main><!-- #main -->

<div class="grid-wrapper">
    <div class="one-x">
        <div id="grid2-1" class="one-x">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam maximus sed nisi vel lacinia. Quisque pretium eget lorem quis viverra. Ut et dictum nulla. Donec convallis pretium tempus. Curabitur aliquet arcu non ligula volutpat placerat. Phasellus mattis ligula quis quam efficitur lobortis. Phasellus bibendum hendrerit massa vitae scelerisque. Praesent quis elementum orci. Integer lacinia at lectus ut auctor. Aliquam bibendum mi ut viverra cursus. Maecenas ullamcorper sem sit amet rutrum tincidunt. Donec id elit turpis. Donec pulvinar augue et sagittis egestas. Praesent rhoncus sem leo, ac interdum tellus pretium vel.

Donec aliquam sem id ante iaculis, eget imperdiet libero commodo. Praesent condimentum metus nec lacinia aliquet. Aliquam erat volutpat. Integer libero ex, porttitor non nisi at, molestie lacinia sem. Donec consectetur luctus sagittis. Quisque justo nisl, ornare a aliquet sed, elementum quis ipsum. In euismod libero rhoncus enim commodo bibendum. Etiam dapibus libero et diam fermentum, sit amet maximus ipsum suscipit. Donec vitae ante bibendum, sodales nisl ut, egestas leo. Mauris ac nulla quam. Duis imperdiet imperdiet tortor eget consectetur. Sed urna lorem, interdum eu velit eu, tincidunt pulvinar velit. Morbi a erat urna. Nullam luctus ipsum nec porttitor vulputate. Aliquam erat volutpat.

Sed quis porta nunc, vitae vestibulum nibh. Donec quis felis ornare, iaculis ante et, ultricies purus. Quisque ut nibh sodales, bibendum nunc et, placerat ante. Vivamus id elit quis nisi elementum tincidunt quis eu ante. Morbi et feugiat nulla. Pellentesque ligula arcu, rhoncus at felis vitae, lacinia malesuada dolor. Aenean tincidunt, augue ultricies tempus rutrum, tellus augue iaculis felis, non mattis mi orci in justo. Duis elementum lacinia ex at rhoncus. Duis egestas suscipit commodo. Duis sollicitudin sed odio in tincidunt. Aenean iaculis id magna quis bibendum. Quisque hendrerit varius est, a sollicitudin dui molestie non. Curabitur fringilla accumsan lectus vel iaculis. Curabitur ut risus consequat est tempus hendrerit. Donec lorem orci, tincidunt non pharetra vel, tempus non libero. Vivamus eu laoreet elit.

Phasellus blandit odio quam, viverra rhoncus sapien laoreet quis. Fusce vulputate malesuada congue. Curabitur eget felis id nisi congue maximus vitae id mauris. Praesent felis libero, tincidunt nec lectus eu, pretium venenatis enim. Duis mi lectus, pellentesque a purus non, semper elementum metus. Pellentesque molestie lectus quis facilisis molestie. Aenean id viverra augue. Mauris non mi sed magna finibus aliquet id et dolor. Cras at hendrerit neque. Mauris pharetra varius feugiat.

Etiam ligula lacus, viverra vel vestibulum ornare, consectetur sed quam. Donec vehicula finibus risus nec mollis. Proin tellus arcu, consectetur sit amet porta ac, blandit vestibulum velit. Etiam ut velit at turpis bibendum tempor. Morbi at lacus nisl. Fusce ultricies ut ex id sodales. Quisque semper ligula et magna fermentum, pellentesque porta tortor facilisis. Praesent ex metus, feugiat vitae orci in, tempus mollis enim. Phasellus non justo sit amet nibh feugiat gravida. Nam sollicitudin ultrices hendrerit. Phasellus placerat dapibus ligula, ac sagittis ligula luctus eget. Morbi vitae facilisis dui. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
        </div>
        <div id="grid2-2" class="phi-x">
                <nav id="site-navigation" class="grid-navigation-2" role="navigation">
                        <button class="menu-toggle" aria-controls="menu" aria-expanded="false">
                            <?php _e( 'Grid Menu', 'moon' ); ?>
                        </button>
                        <div id="grid-menu-t"><div id="grid-menu-tr"><div id="grid-menu-td">
                            <?php wp_nav_menu( array( 'theme_location' => 'grid-menu',
                                'menu_class' => 'grid-menu sf-menu sf-vertical',
                                'container_class' => 'grid-menu-container',
                                'walker' => new moon_walker_nav_menu ) ); ?>
                        </div></div></div>
                </nav><!-- #site-navigation -->
        </div>
    </div>
    <div class="phi-x">
        <div id="grid2-3"class="one-x">
            <div class="grid-navigation-2">
                <div id="grid-menu-t"><div id="grid-menu-tr"><div id="grid-menu-td">
                        <p> this part is for debug purpose only and will be deleted later</p>
                </div></div></div>
            </div>
        </div>
        <div id="grid2-4" class="phi-x">

        </div>
    </div>
</div><!-- .grid-wrapper -->

<?php wp_footer(); ?>

<!-- initialise Superfish -->
<script>
	jQuery(document).ready(function(){
		jQuery('ul.sf-menu').superfish();
	});
</script>
</body>
</html>
