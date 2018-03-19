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

		<nav id="main-nav">
			<div class="nav-wrapper container">
				<a href="<?php echo(get_bloginfo('url')); ?>" class="brand-logo"><img src="<?php echo(get_header_image()); ?>" alt="<?php echo(get_bloginfo('title')); ?>"></a>
				<a href="#" data-activates="mobile-nav" class="button-collapse">
					<i class="material-icons">menu</i>
				</a>
				<?php
					// desktop navigation
					wp_nav_menu( array(
						'theme_location'  => 'menu-1',
						'container'       => 'ul',
						'walker'          => new NavMenuWalker(),
						'menu_class'      => 'right hide-on-med-and-down',
						'menu_id'         => 'top-nav',
					) );
				?>

				<ul class="side-nav" id="mobile-nav">
					<li><div class="user-view"><a href="#!">Logo</a></div></li>
					<li>
						<?php
							// mobile navigation
							wp_nav_menu( array(
								'theme_location'  => 'menu-1',
								'container'       => 'ul',
								'walker'          => new MobileNavPanelWalker(),
								'menu_class'      => 'collapsible',
							) );
						?>
					</li>
				</ul>

			</div>
		</nav>
		<script>$(function(){
			$(".button-collapse").sideNav();
		})</script>

	</header><!-- #masthead -->

	<div id="content" class="site-content">

