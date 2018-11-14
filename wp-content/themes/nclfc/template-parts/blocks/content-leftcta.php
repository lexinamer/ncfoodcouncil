<?php
/**
 * Block Name: Leftcta
 *
 * This is the template that displays the callout block.
 */
?>

<div class="container">
  <div class="foodchamps">
    <div>
      <p class="larger"><?php echo get_field('title') ?></p>
      <h2><?php echo get_field('subtitle')?></h2>
      <p><?php echo get_field('content')?></p>
      <a href="<?php echo get_field('learn_more_url')?>" class="btn">Learn More</a>
    </div>

    <img src="<?php echo get_field('image')?>"/>
  </div>
</div>
