<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NCFoodCouncil
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'nclfc' ); ?></a>

	<header>
		<div class="site-header">
			<nav class="main-navigation">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-left',
					'menu_id'        => 'primary-menu-left',
				) );
				?>
			</nav><!-- #site-navigation -->


			<div class="site-branding">
				<?php
				the_custom_logo();
			 	?>
			</div><!-- .site-branding -->

			<nav class="main-navigation">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-right',
					'menu_id'        => 'primary-menu-right',
				) );
				?>
			</nav>
		</div>

		<nav id="site-navigation" class="main-navigation mobile">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">Menu &#9776;</button>
			<ul>
				<?php wp_nav_menu( array('menu' => 'menu-left', 'items_wrap' => '%3$s', 'container' => false ) ); ?>
				<?php wp_nav_menu( array('menu' => 'menu-right', 'items_wrap' => '%3$s', 'container' => false ) ); ?>
			</ul>
		</nav><!-- #site-navigation -->
	</header>

	<div id="content" class="site-content">
