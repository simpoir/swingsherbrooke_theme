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
			<h5>Événements à venir</h3>
				<?php
					render_social_events();
				?>
		</div>

		<div id="col-events" class="col s12 m6 l3">
			<h4>Suivez-nous <img src="<?php echo (get_template_directory_uri()); ?>/img/fb_marker.png"></h4>
			<div>
				<?php
					render_last_social_post();
				?>
			</div>

			<h5>Calendrier mensuel</h3>
				<?php
					render_calendar();
				?>
		</div>
	</div>
	<div>
		<h4>Les styles de danse swing</h2>
		<div class="horiz-scroller center-align">
			<!-- TODO load from menu -->
			<div class="box-link item1"><span class="style-name">Lindy hop</span></div>
			<div class="box-link item2"><span class="style-name">Rockabilly jive</span></div>
			<div class="box-link item3"><span class="style-name">West coast swing</span></div>
			<div class="box-link item4"><span class="style-name">Jazz steps solo</span></div>
			<div class="box-link item5"><span class="style-name">Charleston</span></div>
			<div class="box-link item6"><span class="style-name">blues</span></div>
			<div class="box-link item7"><span class="style-name">balboa</span></div>
			<div class="box-link item8"><span class="style-name">collegiate shag</span></div>
		</div>
	</div>
</div>

<?php
get_footer();
