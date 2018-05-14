<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package swingsherbrooke
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="page-footer">
		<div class="container">
			<h5 class="white-text">Contact</h5>
			<ul>
				<li><?php echo(esc_html(get_option('theme_contact_address'))) ?></li>
				<li><?php echo(esc_html(get_option('theme_contact_email'))) ?></li>
			</ul>
		</div>
		<div class="footer-copyright">
			<div class="container">
				<?php
					printf( esc_html( '© %s Swing Sherbrooke' ), date('Y') );
				?>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
