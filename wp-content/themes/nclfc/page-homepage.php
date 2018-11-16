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
					<a class="btn-home" href="<?php echo $button['button_link']['url']; ?>"><?php echo $button['button_text2']; ?></a>
				<?php endif; ?>

				<?php $button = get_field('hero_button_center');
					if($button): ?>
					<a class="btn-home" href="<?php echo $button['button_link']['url']; ?>"><?php echo $button['button_text']; ?></a>
				<?php endif; ?>

				<?php $button = get_field('hero_button_right');
					if($button): ?>
					<a class="btn-home" href="<?php echo $button['button_link']['url']; ?>"><?php echo $button['button_text']; ?></a>
				<?php endif; ?>
			</div>
		</div><!-- .hero -->

		<div class="container">
			<?php $callout = get_field('callout');
					if($callout): ?>
				<div class="callout" style="background-image:url('<?php echo $callout['bg']['url']?>')">
					<img src="<?php echo $callout['image_left']?>"/>

					<div>
						<h2><?php echo $callout['title']?></h2>
						<p class="larger"><?php echo $callout['content']?></p>
					</div>

					<img src="<?php echo $callout['image_right']?>"/>
				</div>
			<?php endif; ?>

			<?php $foodchamps = get_field('food_champs');
					if($foodchamps): ?>
				<div class="foodchamps">
					<div>
						<p class="larger"><?php echo $foodchamps['title']?></p>
						<h2><?php echo $foodchamps['subtitle']?></h2>
						<p><?php echo $foodchamps['content']?></p>
						<a href="<?php echo $foodchamps['learn_more_url']['url']?>" class="btn">Learn More</a>
					</div>

					<img src="<?php echo $foodchamps['image']?>"/>
				</div>
			<?php endif; ?>
		</div>

<?php
get_footer();
