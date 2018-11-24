<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NCFoodCouncil
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main">

			<?php if(has_post_thumbnail()) {
			$feat_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full", true);
			} ?>

			<div class="entry-header" style="background: linear-gradient(
			rgba(0, 0, 0, 0.45),
			rgba(0, 0, 0, 0.45)
			), url(<?php echo (($feat_image[0]))?>)">

						<!-- Entry Content goes here -->
						<div class="entry-header-content">
							<h1><?php the_title(); ?></h1>
							<div>
								<?php get_the_subtitle( $post ); ?>
							</div>
						</div>

			</div><!-- .page-header -->
		</main>
		<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
		?>

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
