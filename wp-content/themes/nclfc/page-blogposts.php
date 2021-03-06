<?php

/**
 * Template Name: Blog Page
 */

 get_header();
 ?>

    <div id="primary" class="content-area">
      <main id="main">
        <?php if(has_post_thumbnail()) {
        $feat_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full", true);
        } ?>

        <div class="entry-header" style="background: linear-gradient(
        rgba(0, 0, 0, 0.45),
        rgba(0, 0, 0, 0.45)
        ), url(<?php echo (($feat_image[0]))?>)">

              <!-- Entry Content goes here -->
              <div class="entry-header-content">

                <h1><?php the_title(); ?></h1>
                <div>
                  <?php get_the_subtitle( $post ); ?>
                </div>
              </div>

        </div><!-- .page-header -->
      </main>

      <?php
        if ( function_exists('yoast_breadcrumb') ) {
          yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
        }
      ?>

 		<main class="site-main container">
      <?php the_content(); ?>


 			<div class="posts-container">
        <?php
            // Custom Post Query
           $args = array (
               'post_type'=> 'post',
           );

           $the_query = new WP_Query($args);

           while( $the_query->have_posts() ) : $the_query->the_post();
       ?>

          <!-- Post Content goes here -->
          <?php get_template_part( 'template-parts/content', get_post_type() ); ?>


        <?php endwhile; wp_reset_postdata(); ?>

 			</div>

 		</main><!-- #main -->
 	</div><!-- #primary -->

 <?php
 get_footer();
