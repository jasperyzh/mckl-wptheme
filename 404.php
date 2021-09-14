<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>

<header class="page-header alignwide">
	<h1 class="page-title"><?php esc_html_e('404 Not Found', 'twentytwentyone'); ?></h1>
</header><!-- .page-header -->

<div class="error-404 not-found default-max-width">
	<div class="page-content">
		<p><?php esc_html_e('It looks like you have reached a broken link.', 'twentytwentyone'); ?></p>

		<div class="elementor-button-wrapper">
			<a href="/" class="btn btn-primary" role="button">
				Return to homepage
			</a>
		</div>
		<?php //get_search_form(); 
		?>
	</div><!-- .page-content -->
</div><!-- .error-404 -->

<?php


get_footer();
