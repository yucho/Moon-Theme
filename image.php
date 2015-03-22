<?php
/**
 * The template for displaying image attachments
 *
 * @package Moon
 */

// Retrieve attachment metadata.
$metadata = wp_get_attachment_metadata();

get_header();
?>
<!-- Facebook comments root -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1625715107660751&version=v2.0"; // Change app id as needed.
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

	<section id="primary" class="content-area image-attachment">
		<main id="main" class="site-main" role="main">

	<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();
	?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

					<div class="entry-meta entry-meta-single">
                                                <?php edit_post_link( __( 'Edit', 'moon' ), '<span class="edit-link">', '</span>' ); ?>
                                                
                                                <span class="full-size-link">Full size: <a href="<?php echo esc_url( wp_get_attachment_url() ); ?>"><?php echo $metadata['width']; ?> &times; <?php echo $metadata['height']; ?></a>&nbsp;</span>
                                                
                                                <span class="entry-finished-date"><time class="entry-finished-date">Finished on: <?php echo esc_html( get_post_meta( get_the_ID(), '_finisheddate', true ) ); ?></time></span>

					</div><!-- .entry-meta -->
				</header><!-- .entry-header -->

				<div class="entry-content">
                                        <?php the_content(); ?>
					<div class="entry-attachment">
						<div class="attachment attachment-moon">
							<?php moon_the_attached_image(); ?>
						</div><!-- .attachment -->
					</div><!-- .entry-attachment -->

					<?php
                                                wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'moon' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
						) );
					?>
				</div><!-- .entry-content -->
			</article><!-- #post-## -->
<?php /*
			<nav id="image-navigation" class="navigation image-navigation">
				<div class="nav-links">
				<?php //previous_image_link( false, '<div class="previous-image">' . __( 'Previous Image', 'moon' ) . '</div>' ); ?>
                                <?php //previous_image_link( false, '<div class="previous-image nav-previous"><span class="meta-nav">&larr;</span><div class="wrap-title-nav-previous"><span class="title-nav-previous">' . __( 'Previous Image', 'moon' ) . '</span></div></div>' ); ?>
                                <?php moon_adjacent_image_link( true ); ?>
				<?php //next_image_link( 'small', '<div class="next-image">' . __( 'Next Image', 'moon' ) . '</div>' ); ?>
                                <?php moon_adjacent_image_link( false ); ?>
				</div><!-- .nav-links -->
			</nav><!-- #image-navigation -->
 */?>
                        <?php moon_image_nav(); ?>

			<?php
                                // if ( fb_comments_open ) // Create this function someday.
                                // Display Facebook comments.
                                get_template_part( 'fbcomments' );

				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
