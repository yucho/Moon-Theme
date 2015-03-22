<?php
/**
 * The front page template file.
 *
 * This is the front page template file in a WordPress theme.
 * It is used to display a main page when latest post (default) or static front
 * page is set as the front page.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Moon
 */

get_header( 'widenav' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
                    
                <div id="canvas-container">
                    <canvas id="canvas-front" class="front-canvas" width="360" height="240"></canvas>
                </div>

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					get_template_part( 'content', 'page' );
				?>

			<?php endwhile; ?>

			<?php moon_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
        </div><!-- #content -->


	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'moon' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'moon' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'moon' ), 'Moon', '<a href="http://yuchoho.com/" rel="designer">Yucho Ho</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<!-- initialize Superfish -->

<script>
	jQuery(document).ready(function(){
		jQuery('ul.sf-menu').superfish();
	});
</script>

<!-- initialize three.js animation -->
<script>
    var canvas, container;
    var scene, camera, renderer;
    var geometry, material, mesh;

    init();
    animate();

    function init() {

        scene = new THREE.Scene();
        canvas = document.getElementById("canvas-front");

        camera = new THREE.PerspectiveCamera( 75, canvas.width / canvas.height, 1, 10000 );
        camera.position.z = 1000;

        geometry = new THREE.BoxGeometry( 200, 200, 200 );
        material = new THREE.MeshBasicMaterial( { color: 0xff0000, wireframe: true } );

        mesh = new THREE.Mesh( geometry, material );
        scene.add( mesh );

        renderer = new THREE.WebGLRenderer( );
        renderer.setSize( canvas.width, canvas.height );
        renderer.domElement.id = "canvas-front";
        renderer.domElement.className = "front-canvas";

        container = document.getElementById("canvas-container");
        container.replaceChild( renderer.domElement, canvas );
        //document.body.appendChild( renderer.domElement );

    }

    function animate() {

        requestAnimationFrame( animate );

        mesh.rotation.x += 0.01;
        mesh.rotation.y += 0.02;

        renderer.render( scene, camera );

    }
</script>

</body>
</html>
