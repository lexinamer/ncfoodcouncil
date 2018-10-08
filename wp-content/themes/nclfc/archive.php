<?php
// /**
//  * The template for displaying archive pages
//  *
//  * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
//  *
//  * @package NCFoodCouncil
//  */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main container">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				post_type_archive_title('<h1 class="page-title">', '</h1>');
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<div class="posts-container">
				<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
