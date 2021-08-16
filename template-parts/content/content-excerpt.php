<?php

/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-7 order-2 order-md-0">

				<?php
				$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

				$time_string = sprintf(
					$time_string,
					esc_attr(get_the_date(DATE_W3C)),
					esc_html(get_the_date())
				);
				printf(
					'%s',
					$time_string
				);
				?>

				<?php get_template_part('template-parts/header/excerpt-header', get_post_format()); ?>

				<div class="entry-content">
					<?php get_template_part('template-parts/excerpt/excerpt', get_post_format()); ?>
				</div><!-- .entry-content -->

			</div>
			<div class="col-md-5">
				<figure class="ratio--16x9 object-fit-center shadow">
					<?php
					if (has_post_thumbnail()) {
						the_post_thumbnail('large', array('loading' => false));
					} else {
					?>
						<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2021/07/mckl-logo.jpg" alt="MCKL placeholder">
					<?php
					}
					?>
				</figure>
			</div>
		</div>
	</div>
	<!-- <footer class="entry-footer default-max-width"> -->
	<?php //twenty_twenty_one_entry_meta_footer(); 
	?>
	<!-- </footer> -->
	<!-- .entry-footer -->
	<hr>
</article><!-- #post-${ID} -->