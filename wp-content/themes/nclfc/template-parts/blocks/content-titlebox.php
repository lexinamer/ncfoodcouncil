<?php
/**
 * Block Name: Titlebox
 *
 * This is the template that displays the callout block.
 */
?>

<div class="entry-header-text">
  <div class="container page-info">
    <section>
      <?php
      if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
      }

      the_title( '<h1 class="entry-title">', '</h1>' ); ?>
      <p><?php echo get_field('heading_content_text') ?></p>
    </section>

    <section>
      <img src="<?php echo get_field('heading_content_image') ?>"/>
    </section>
  </div>
</div>
