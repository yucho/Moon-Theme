<?php
/**
 * Template Name: Golden Grid
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

        <div class="grid-wrapper">
<?php
$insert = function( $x, $y ) {
        if ( $x == 4 && $y == 3 ) {
                $str  = "<nav id=\"site-navigation\" class=\"grid-navigation\" role=\"navigation\">\n";
                $str .= "<button class=\"menu-toggle\" aria-controls=\"menu\" aria-expanded=\"false\">";
                $str .= translate( 'Primary Menu', 'moon' ) . "</button>";
                $str .= wp_nav_menu( array( 'theme_location' => 'primary', 'echo' => false ) );
                $str .= "</nav><!-- #site-navigation -->";
        }
        else if ( $x == 8 && $y == 3 ) {
                $str = "<p class=\"grid-debug\">Sample paragraph here.</p>";
        }
        else if ($x == 7 && $y == 1) {
                $str = "<ul class=\"grid-ul-debug\"><li>sample list</li><li>second item</li></ul>";
        }
        return $str;
};
?>
<?php echo moon_golden_grid(3, 3, $insert) ?>
        </div><!-- .grid-wrapper -->

<?php wp_footer(); ?>

</body>
</html>
