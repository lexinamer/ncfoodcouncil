<?php
/**
 * The template for displaying the footer
 * @package NCFoodCouncil
 */

?>

	</div><!-- #content -->
</div><!-- #page -->

<footer class="site-footer">
		<div class="footer footer-left">
			<ul class="footer-nav">
				<?php wp_nav_menu( array('menu' => 'menu-left', 'items_wrap' => '%3$s', 'container' => false ) ); ?>
				<?php wp_nav_menu( array('menu' => 'menu-right', 'items_wrap' => '%3$s', 'container' => false ) ); ?>
			</ul>
		</div>

		<div class="footer-container">
			<div class="footer footer-center">
				<?php dynamic_sidebar('footer-center'); ?>
			</div>

			<div class="footer footer-right">
				<?php dynamic_sidebar('footer-right'); ?>
			</div>
		</div>
</footer><!-- #colophon -->

<div class="site-info">
	Copyright 2018 <?php bloginfo('name'); ?>. All rights reserved.
</div><!-- .site-info -->

<?php wp_footer(); ?>

</body>
</html>
