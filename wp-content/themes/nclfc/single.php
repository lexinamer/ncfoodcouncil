<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package NCFoodCouncil
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main container">
		<?php
		while ( have_posts() ) :
			the_post(); ?>

			<article id="post-<?php the_ID(); ?>" class="post">
				<?php nclfc_post_thumbnail(); ?>

				<div class="post-excerpt">
					<?php
					the_title( '<h2 class="entry-title">', '</h2>' );

					echo get_the_date();
					?>
				</div><!-- .entry-content -->
			</article><!-- #post-<?php the_ID(); ?> -->


			<div class="content">
				<?	the_content(); ?>
			</div>

			<?php	the_post_navigation('','Previous Story','Next Story');


		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
