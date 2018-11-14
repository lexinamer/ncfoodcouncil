<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NCFoodCouncil
 */

?>

<?php if(has_post_thumbnail()) {
$feat_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full", true);
} ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header" style=" background-image: url(<?php echo (($feat_image[0]))?>)">
	</div><!-- .entry-header -->



	<div class="entry-content">
		<div class="container page-content">
			<?php
			the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nclfc' ),
				'after'  => '</div>',
			) );
			?>
		</div>
	</div>

	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
