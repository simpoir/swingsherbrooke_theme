<?php
/* Template Name: Home */

get_header(); ?>

<div id="central-container" class="container">
	<div class="row">
		<div id="col-main" class="col s12 m12 l6">
		<?php
			while ( have_posts() ) : the_post();
				the_content();
			endwhile;
		?>
		</div>

		<div id="col-events" class="col s12 m6 l3">
			<h4>Nos activités</h2>
			<?php dynamic_sidebar('home-col-1'); ?>
		</div>

		<div id="col-social" class="col s12 m6 l3">
			<h4>Suivez-nous</h4>
			<?php dynamic_sidebar('home-col-2'); ?>
		</div>
	</div>
	<div>
		<?php dynamic_sidebar('home-bottom'); ?>
	</div>
</div>

<?php
get_footer();
