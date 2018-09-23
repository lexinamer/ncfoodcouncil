<?php
/**
 * Template Name: Homepage
 */

get_header();
?>
		<div class="hero" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');">

			<div class="hero-buttons">
				<?php $button = get_field('hero_button_left');
					if($button): ?>
					<a href="<?php echo $button['button_link']['url']; ?>">
						<button><?php echo $button['button_text']; ?></button>
					</a>
				<?php endif; ?>

				<?php $button = get_field('hero_button_center');
					if($button): ?>
					<a href="<?php echo $button['button_link']['url']; ?>">
						<button><?php echo $button['button_text']; ?></button>
					</a>
				<?php endif; ?>

				<?php $button = get_field('hero_button_right');
					if($button): ?>
					<a href="<?php echo $button['button_link']['url']; ?>">
						<button><?php echo $button['button_text']; ?></button>
					</a>
				<?php endif; ?>
			</div>
		</div><!-- .hero -->

		<div class="container">
			<?php $callout = get_field('callout');
					if($callout): ?>
				<div class="callout" style="background:url('<?php echo $callout['bg']['url']?>')">
					<h2><?php echo $callout['title']?></h1>
					<p><?php echo $callout['content']?></p>
				</div>
			<?php endif; ?>
		</div>

<?php
get_footer();
