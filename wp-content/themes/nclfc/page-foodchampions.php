<?php
/**
 * Template Name: Food Champions Archive
 */

 get_header();
 ?>

 	<div id="primary" class="content-area">
      <?php if(has_post_thumbnail()) {
      $feat_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full", true);
      } ?>

      <div class="entry-header-archive" style="background: linear-gradient(
      rgba(0, 0, 0, 0.45),
      rgba(0, 0, 0, 0.45)
      ), url(<?php echo (($feat_image[0]))?>)">
        <?php while ( have_posts() ) : the_post(); ?>

            <!-- Page Content goes here -->
            <div class="page-content">
              <?php
                if ( function_exists('yoast_breadcrumb') ) {
                  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                }
              ?>
              <h1><?php the_title(); ?></h1>
              <div>
                <?php the_content(); ?>
              </div>
            </div>

        <?php endwhile; // End of the loop. ?>
      </div><!-- .page-header -->
    </div>

 		<main id="main" class="site-main container">
 			<div class="posts-container">
        <?php
            // Custom Post Query
           $args = array (
               'post_type'=> 'food_champion',
           );

           $the_query = new WP_Query($args);

           while( $the_query->have_posts() ) : $the_query->the_post();
       ?>

          <!-- Post Content goes here -->
          <?php get_template_part( 'template-parts/content', 'foodchamps' );?>


        <?php endwhile; wp_reset_postdata(); ?>

 			</div>

 		</main><!-- #main -->
 	</div><!-- #primary -->

 <?php
 get_footer();
