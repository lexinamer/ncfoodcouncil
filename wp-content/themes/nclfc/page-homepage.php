<?php
/**
 * Template Name: Homepage
 */

get_header();
?>
		<?php
		while ( have_posts() ) :
			the_post();

			the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nclfc' ),
				'after'  => '</div>',
			) );

		endwhile; // End of the loop.
		?>

<?php
get_footer();
