<?php
/**
 * Block Name: Imagecallout
 *
 * This is the template that displays the callout block.
 */
?>

<div class="container">
    <div class="callout" style="background-image:url('<? echo  get_field('bg')?>')">
      <img src="<?php echo get_field('image_left')?>"/>

      <div>
        <h2><?php echo get_field('title')?></h2>
        <p class="larger"><?php echo get_field('content')?></p>
      </div>

      <img src="<?php echo get_field('image_right')?>"/>
    </div>
</div>
