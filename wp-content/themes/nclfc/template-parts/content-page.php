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

	<div class="entry-content">
		<div class="container page-content">
			<?php if( get_field('icon_list_toggle') ): ?>
					<?php if( get_field('intro_text') ): ?>
							<?php the_field('intro_text'); ?>
					<?php endif ?>

					<?php if( have_rows('icon_list') ): ?>
							<?php while ( have_rows('icon_list') ) : the_row(); ?>
								<div class="icon-list-row">
									<div class="icon-img">
										<img src="<?php the_sub_field('icon_list_image')?>"/>
									</div>

									<div class="icon-cnt">
										<?php the_sub_field('icon_list_info')?>
									</div>
								</div>
							<?php endwhile ?>
					<?php endif ?>
			<?php endif ?>

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
