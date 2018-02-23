<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package swingsherbrooke
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
	<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
	<?php wp_head(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<nav>
			<div class="nav-wrapper">
				<?php
				the_custom_logo();
				?>
				<a href="#" data-activates="mobile-primary-menu" class="button-collapse"><i class="material-icons">menu</i></a>

				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'container'      => nil,
						'menu_class'     => 'right hide-on-med-and-down',
					) );
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'mobile-primary-menu',
						'container'      => nil,
						'menu_class'     => 'side-nav collapsible',
					) );
				?>
			</div><!-- .nav-wrapper -->
		</nav>
		<script>$(function(){
			$(".button-collapse").sideNav();
			$(".dropdown-button").dropdown();
		})</script>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
