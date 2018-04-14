<?php
/**
 * swingsherbrooke functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package swingsherbrooke
 */

if ( ! function_exists( 'swingsherbrooke_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function swingsherbrooke_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on swingsherbrooke, use a find and replace
		 * to change 'swingsherbrooke' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'swingsherbrooke', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'swingsherbrooke' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'swingsherbrooke_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'swingsherbrooke_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function swingsherbrooke_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'swingsherbrooke_content_width', 640 );
}
add_action( 'after_setup_theme', 'swingsherbrooke_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function swingsherbrooke_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'swingsherbrooke' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'swingsherbrooke' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'swingsherbrooke_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function swingsherbrooke_scripts() {
	//wp_enqueue_style( 'materialize-css', get_template_directory_uri() . '/materialize.css', array(), false, 'screen,projection');
	wp_enqueue_style( 'swingsherbrooke-style', get_stylesheet_uri(), array(), false, 'screen,projection');

	wp_enqueue_script( 'swingsherbrooke-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'swingsherbrooke-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	//wp_enqueue_script('jquery', "//code.jquery.com/jquery-3.2.1.min.js");
	wp_enqueue_script('materialize-js', get_template_directory_uri() . "/js/materialize.min.js");
}
add_action( 'wp_enqueue_scripts', 'swingsherbrooke_scripts' );

/**
 * Side menu walkers are here.
 */
require get_template_directory() . '/inc/menu-walkers.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


/* settings */
function add_theme_menu_item() {
	add_menu_page("Options du thème", "Options du thème", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");

function theme_settings_page() {
?>
	<div class="wrap">
	<h1>Theme Panel</h1>
	<form method="post" action="options.php">
<?php
	settings_fields("section");
	do_settings_sections("theme-options");
	submit_button(); 
?>
	</form>
	</div>
<?php
}

function display_facebook_element() {
?>
	<div>Permet de faire des requêtes à la page facebook depuis le thème. Voir la documentation du <a href="https://developers.facebook.com/tools/explorer/356293074798347">graph API</a></div>
	<input type="text" name="facebook_app_token" id="facebook_app_token" value="<?php echo get_option('facebook_app_token'); ?>" />
<?php
}

function display_theme_panel_fields() {
	add_settings_section("section", "All Settings", null, "theme-options");

	add_settings_field("facebook_app_token", "Facebook app token (suitable for graph api queries)", "display_facebook_element", "theme-options", "section");

	register_setting("section", "facebook_app_token");
}

add_action("admin_init", "display_theme_panel_fields");



/* custom rendering components */
function render_last_social_post() {
	setlocale(LC_ALL, "fr_CA.utf-8");
	$graph_url = 'https://graph.facebook.com/v2.12/swingsherbrooke/posts?fields=full_picture%2Ccreated_time%2Cmessage%2Clink%2Cupdated_time&limit=1&access_token='. get_option('facebook_app_token');
	$events = json_decode(file_get_contents($graph_url), true);
	foreach ($events["data"] as $event) {

		echo '<a href="'. esc_url($event["link"]) .'"><div class="card">';
		echo '<div class="card-content">'. esc_html($event["message"]) .'</div>';
		echo '<div class="card-image"><img src="'. esc_url($event["full_picture"]) .'"></div>';
		echo '</div></a>';

		// limited to 1, so max 1 elem, but break anyway
		break;
	}
}

function render_social_events() {
	setlocale(LC_ALL, "fr_CA.utf-8");
	$now = new DateTime();
	$graph_url = 'https://graph.facebook.com/v2.12/swingsherbrooke/events?fields=name,start_time,description,cover&limit=3&access_token='. get_option('facebook_app_token');
	$events = json_decode(file_get_contents($graph_url), true);

	$evt_count = 0;
	foreach ($events["data"] as $event) {
		$evt_count++;
		$d = new DateTime($event["start_time"]);

		echo '<div class="card">';
		echo '<div class="card-image"><img src="'. esc_url($event["cover"]["source"]) .'"></div>';


		echo '<div class="card-content">';
		echo '<span class="card-title activator"><b>'.strftime("%d %b %Y", $d->getTimestamp());
		echo '</b><i class="material-icons right">more_vert</i>';
		echo '<br>'.esc_html($event["name"]).'</span>';
		echo '</div><div class="card-reveal">';
		echo '<span class="card-title">'.strftime("%Y-%b-%d", $d->getTimestamp());
		echo '<i class="material-icons right">close</i>';
		echo '<br>'.esc_html($event["name"]).'</span>';
		echo esc_html($event["description"]);
		echo '</div>';
		echo '</div>';

		if ($now < $d && $evt_count==1) {
			// display at most 1 past event if nothing else
			break;
		}
	}
}

function render_calendar() {
	$days_in_month = date('t');
	$month = date_create(date("Y-m-01"));
	$dow_offset = date_format($month, "w");
	$dow = 0;
?>
	<table class="simple-calendar">
		<thead>
		<tr>
		<th>D</th><th>L</th><th>M</th><th>M</th><th>J</th><th>V</th><th>S</th>
		</tr>
		</thead>
		<tbody>
		<tr>
<?php
	for ($i=0; $i<$dow_offset; $i++) {
		echo '<td></td>';
		$dow++;
	}
	for ($i=1; $i<=$days_in_month; $i++) {
		if ($i == date('j')) {
			echo '<td><b>'. $i .'</b></td>';
		} else {
			echo '<td>'. $i .'</td>';
		}
		$dow++;
		if ($dow % 7 == 0) {
			echo '</tr><tr>';
		}
	}
?>
		</tr>
		</tbody>
	</table>
<?php
}

