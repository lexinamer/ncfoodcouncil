<?php
/**
 * Block Name: Homepagecta
 *
 * This is the template that displays the callout block.
 */
?>

<div class="hero" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');">

  <div class="hero-buttons">
    <?php $button = get_field('hero_button_left');
      if($button): ?>
      <a class="btn-home" href="<?php echo $button['button_link']['url']; ?>"><?php echo $button['button_text']; ?></a>
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
