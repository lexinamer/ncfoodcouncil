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
	<div class="entry-header" style="background-image: url(<?php echo (($feat_image[0]))?>)">
	</div><!-- .entry-header -->

	<div class="entry-header-text">
		<div class="container page-info">
			<section>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<p><?php echo get_field('heading_content_text') ?></p>
			</section>

			<section>
				<img src="<?php echo get_field('heading_content_image') ?>"/>
			</section>
		</div>
	</div>

	<?php if( have_rows('info_box') ): ?>
		<?php while( have_rows('info_box') ): the_row(); ?>
			<div class="entry-info-text">
				<div class="container page-info box">
					<img src="<?php echo get_sub_field('image') ?>?>"/>

					<div>
						<p class="larger"><?php echo get_sub_field('title') ?></p>
						<h2><?php echo get_sub_field('subtitle') ?></h2>
						<p><?php echo get_sub_field('content') ?></p>
					</div>

				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>

		</div>
	</div>

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
