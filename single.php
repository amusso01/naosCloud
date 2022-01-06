<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package foundry
 */

get_header();
?>

	<div id="primary" class="container content-area">
		<div class="row">
			<main id="main" class="site-main sidebar">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );


			endwhile; // End of the loop.
			?>

			</main><!-- #main -->


		</div>
	</div><!-- #primary -->

<?php
get_footer();
