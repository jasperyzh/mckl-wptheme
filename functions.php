<?php

/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

if (SITECOOKIEPATH != COOKIEPATH) {
	setcookie(TEST_COOKIE, 'WP Cookie check', 0, SITECOOKIEPATH, COOKIE_DOMAIN);
}

/**
 * Calculate classes for the main <html> element.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_the_html_classes()
{
	$classes = apply_filters('twentytwentyone_html_classes', '');
	if (!$classes) {
		return;
	}
	echo 'class="' . esc_attr($classes) . '"';
}



// Custom template tags for the theme.
require get_template_directory() . '/inc/template-tags.php';

// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// SVG Icons class.
require get_template_directory() . '/classes/class-twenty-twenty-one-svg-icons.php';


/**
 * enqueue dist
 */
add_action('wp_enqueue_scripts', 'wp_enqueue');
function wp_enqueue()
{
	$themecsspath = get_stylesheet_directory() . '/dist/css/app.css';
	$themejspath = get_stylesheet_directory() . '/dist/js/app.js';

	if (WP_DEBUG) {
		$url = "http://localhost:8086/mckl/wp-content/themes/mckl";
		wp_enqueue_script('vue', $url . '/dist/js/app.js', array('jquery'), '', false);
	} else {
		$url = get_stylesheet_directory_uri();
		wp_enqueue_script('vue', $url . '/dist/js/app.js', array('jquery'), filemtime($themejspath), false);
		wp_enqueue_style('vue', $url . '/dist/css/app.css', array(), filemtime($themecsspath), false);
	}



	wp_localize_script('jquery', 'secret', array(
		'siteUrl' => get_site_url(),
		'ajaxUrl' => admin_url('admin-ajax.php'),
		'restUrl' => esc_url_raw(rest_url()),
		'stylesheetUrl' => get_stylesheet_directory_uri(),
		'stylesheetDirectory' => get_stylesheet_directory(),

		// get page_id
		'is_front_page' => is_front_page(),
		'pageId' => get_the_ID(),

		'mckl_url' => get_site_url(1),
		'mcpykett_url' => get_site_url(1, "/pykett"),

		// get term_id
		'termId' => (!empty(get_queried_object())) ? get_queried_object()->term_id : "",

		// multisite
		'currentBlogId' => get_current_blog_id()
	));
}


/**
 * register nav menu
 */
register_nav_menus(
	array(
		'primary' => esc_html__('Primary menu', 'mckltheme'),
		'support' => esc_html__('Support menu', 'mckltheme'),
		'footer'  => __('Secondary menu', 'mckltheme'),
		'quick'  => __('Quick menu', 'mckltheme'),
		'social'  => __('Social menu', 'mckltheme'),
	)
);

/**
 * theme support
 */
add_theme_support('title-tag');

add_theme_support('post-thumbnails', [
	'post',
	'page',
	'programme'
]);

add_theme_support('custom-logo', [
	'height'               => 512,
	'width'                => 512,
	'flex-height'          => true,
	'flex-width'           => true,
	'header-text'          => array('site-title', 'site-description'),
	'unlink-homepage-logo' => true,
]);

add_theme_support('widgets');


require get_template_directory() . '/inc/mckl-menu-primary.php';

require get_template_directory() . '/inc/mckl-restapi.php';

require get_template_directory() . '/inc/mckl-cpt-programme.php';

require get_template_directory() . '/inc/snippet-bootstrap-pagination.php';


// add widgets

// register Foo_Widget widget
// function register_foo_widget() {
//     register_widget( 'Foo_Widget' );
// }
// add_action( 'widgets_init', 'register_foo_widget' );

add_action('widgets_init', 'register_sidebars_mckl');
function register_sidebars_mckl()
{
	register_sidebar(
		array(
			'id'            => 'footer__logo',
			'name'          => __('Footer Logo Area'),
			'description'   => __('A widget area for Footer Logo.'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'footer__copy',
			'name'          => __('Footer Copy Area'),
			'description'   => __('A widget area for Footer Copy.'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			// 'before_title'  => '<h3 class="widget-title">',
			// 'after_title'   => '</h3>',
		)
	);
}
