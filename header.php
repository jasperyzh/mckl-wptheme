<?php

/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>

	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-WKV6R6J');
	</script>
	<!-- End Google Tag Manager -->
</head>

<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WKV6R6J" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<?php wp_body_open(); ?>
	<div id="site-container" class="site-container">


		<?php
		// <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'twentytwentyone'); </a>

		//get_template_part( 'template-parts/header/site-header' ); 
		?>

		<header id="site-header" class="site-header fixed-top" role="banner">
			<nav class="navbar navbar-expand-xl navbar--max-width">
				<div class="site-logo">
					<a href="<?php echo get_site_url(); ?>">
						<div class="site-logo__wrap"><?php the_custom_logo(); ?></div>
					</a>
				</div>

				<?php if (has_nav_menu('primary')) : ?>

					<nav id="site-navigation" class="primary-navigation navbar navbar-expand-xl flex-wrap" role="navigation" aria-label="<?php esc_attr_e('Primary menu', 'twentytwentyone'); ?>">

						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-primary" aria-controls="navbar-primary" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#ffffff" class="bi bi-list" viewBox="0 0 16 16">
									<path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
								</svg>
							</span>
						</button>
						<div class="collapse navbar-collapse" id="navbar-primary">
							<?php if (has_nav_menu('primary')) : ?>
								<?php
								echo bootstrap4_custom_menu_class('primary');
								?>
							<?php endif; ?>

							<?php if (has_nav_menu('support')) : ?>

								<?php
								wp_nav_menu(
									array(
										'theme_location'  => 'support',
										'menu_class'      => 'menu-wrapper collapse navbar-collapse',
										'container_class' => 'support-menu-container d-none d-lg-block',
										'items_wrap'      => '<ul id="support-menu-list" class="%2$s">%3$s</ul>',
										'fallback_cb'     => false,
									)
								);
								?>
							<?php endif; ?>

						</div>


					</nav><!-- #site-navigation -->
				<?php endif; ?>

				<?php
				$pykett_dropdown_temporary_disabled = false;
				if (is_front_page() && $pykett_dropdown_temporary_disabled) :
				?>
					<div class="dropdown site-header__dropdown">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Kuala Lumpur Campus
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="#">Pykett Campus</a>
						</div>
					</div>

				<?php endif; ?>

			</nav>
		</header>

		<main id="main" class="site-main" role="main">


			<?php

			// page banners
			$hide_page_banner = get_field('hide_page_banner');
			if (!is_front_page() && is_page() && !$hide_page_banner || is_single() && 'programme' != get_post_type() || is_archive()) :

				if (is_archive()) {
					$term = get_queried_object();
					$image = get_field('page_banner', $term);
				} else {
					$image = get_field('page_banner');
				}
				if ($image) {
					$image_url = $image['url'];
				} else {
					$image_url = get_site_url() . '/wp-content/uploads/2021/06/pagebanner-sky.jpg';
				}

			?>
				<section id="page-banner" class="page-banner">
					<figure class="page-banner__ratio">
						<img src="<?php echo $image_url; ?>" alt="mckl page-banner">
					</figure>
				</section>
			<?php
			endif;
