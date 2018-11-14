<?php
/**
 * Block Name: Callout
 *
 * This is the template that displays the callout block.
 */
?>

<div class="entry-info-text">
  <div class="container page-info box">
    <img src="<?php echo get_field('image') ?>"/>

    <div>
      <p class="larger"><?php echo get_field('title') ?></p>
      <h2><?php echo get_field('subtitle') ?></h2>
      <p><?php echo get_field('content') ?></p>
    </div>

  </div>
</div>
