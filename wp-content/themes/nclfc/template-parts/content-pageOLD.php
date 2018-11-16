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

	<div class="entry-header">

		<!-- Featured image header -->
		<div class="featured-image" style="background-image: url(<?php echo (($feat_image[0]))?>)">
		</div>

		<div class="titlebox">
			<section class="titlebox-text">
					<!-- Adding breadcrumbs -->
					<?php if ( function_exists('yoast_breadcrumb') ) {
							yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
					} ?>

					<!-- Page title -->
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			<!-- If landing page template -->
			<?php if ( is_page_template('page-landing.php') ): ?>
							<!-- Display titebox ACF text -->
							<?php if( get_field('titlebox_text') ): ?>
								<p><?php echo the_field('titlebox_text'); ?></p>
							<?php endif; ?>
				</section> <!-- Close titlebox-text section -->

				<!-- Display titebox ACF image -->
				<?php if( get_field('titlebox_image') ): ?>
					<section class="titlebox-image">
						<img src="<?php echo get_field('titlebox_image') ?>"/>
					</section>
				<?php endif; ?> <!-- Endif for titlebox -->

				<?php else: ?>
				</section> <!-- Close titlebox-text section -->
			<?php endif ?> <!-- Endif for landing template -->

		</div> <!-- Close titlebox div -->
	</div> <!-- Close entry header -->

	<!-- If infobox ACF exists -->
	<?php
	$infobox = get_field('yellow_info_box');
	if( $infobox ): ?>
		<div class="entry-infobox">
			<div class="infobox-image">
				<img src="<?php echo $infobox['infobox_image'] ?>?>"/>
			</div>

			<div class="infobox-text">
				<p class="larger"><?php echo $infobox['infobox_title'] ?></p>
				<h2><?php echo $infobox['infobox_subtitle'] ?></h2>
				<p><?php echo $infobox['infobox_content'] ?></p>
			</div>
		</div>
	<?php endif; ?> <!-- Endif for acf infobox -->

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
