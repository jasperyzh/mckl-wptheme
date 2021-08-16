<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
</main>

<?php
//get_template_part( 'template-parts/footer/footer-widgets' );  
?>


<!-- bootstrap sample -->
<footer id="site-footer" class="footer bg__darkblue color__invert text-center text-lg-left">

	<div class="container-fluid py-5">
		<div class="row row-cols-1 row-cols-lg-5">
			<div class="col">

				<figure class="mx-auto my-3" style="max-width: 280px;">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/logo-mckl-horizontal-white.svg" alt="Logo of MCKL">
				</figure>

			</div>

			<div class="col"></div>

			<div class="footer__information col">
				<h5 class="h6">MCKL Information</h5>
				<?php
				wp_nav_menu(
					[
						'theme_location' => 'footer',
						'items_wrap'      => '<ul id="footer-menu-list" class="%2$s mb-3">%3$s</ul>',
						'container'      => false,
						'depth'          => 1,
						'link_before'    => '<span>',
						'link_after'     => '</span>',
						'fallback_cb'    => false,
					]
				);
				?>
			</div>

			<div class="footer__quick-link col">
				<h5 class="h6">Quick Link</h5>
				<?php
				wp_nav_menu(
					[
						'theme_location' => 'quick',
						'items_wrap'      => '<ul id="quick-menu-list" class="%2$s mb-3">%3$s</ul>',
						'container'      => false,
						'depth'          => 1,
						'link_before'    => '<span>',
						'link_after'     => '</span>',
						'fallback_cb'    => false,
					]
				);
				?>
			</div>
			<div class="footer__social col">
				<h5 class="h6">Stay Social</h5>
				<?php
				wp_nav_menu(
					[
						'theme_location' => 'social',
						'items_wrap'      => '<ul id="social-menu-list" class="%2$s mb-3">%3$s</ul>',
						'container'      => false,
						'depth'          => 1,
						'link_before'    => '<span>',
						'link_after'     => '</span>',
						'fallback_cb'    => false,
					]
				);
				?>
			</div>
		</div>

		<hr class="footer__separator">

		<div class="row">
			<div class="col-12 col-md">
				<p>
					<small class="d-block">Copyright © 2021 MCKL All Rights Reserved. | Reg.No: DK144(W)</small>
				</p>
			</div>
		</div>
	</div>
</footer>

</div><!-- #site-container -->

<?php wp_footer(); ?>

</body>

</html>