<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

$description = get_the_archive_description();
$term = get_queried_object();
$highlight_post = get_field('highlight_post', $term);
// print_r($highlight_post);
// echo get_the_post_thumbnail($highlight_post->ID, 'medium');
// print_r($term->slug);

// Remove category, tag, name etc from name of archives
function mckl_archive_title($title)
{
	if (is_category()) {
		$title = single_cat_title('', false);
	} elseif (is_tag()) {
		$title = single_tag_title('', false);
	} elseif (is_author()) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif (is_post_type_archive()) {
		$title = post_type_archive_title('', false);
	} elseif (is_tax()) {
		$title = single_term_title('', false);
	}

	return $title;
}
add_filter('get_the_archive_title', 'mckl_archive_title');
?>

<?php if (have_posts()) : ?>

	<header class="page-header alignwide">
		<?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
		<?php if ($description) : ?>
			<div class="archive-description"><?php echo wp_kses_post(wpautop($description)); ?></div>
		<?php endif; ?>
	</header><!-- .page-header -->

	<!-- highlight post -->
	<?php

	// highlight title
	switch ($term->slug) {
		case "events":
			$highlight_title = "Highlighted Event";
			break;
		case "news":
			$highlight_title = "Latest News";
			break;
		default:
			$highlight_title = "Latest";
	}

	if ($highlight_post) :

	?>
		<div class="container">
			<div class="card mb-3 shadow">
				<div class="row no-gutters">
					<div class="col-md-6">
						<figure class="w-100 h-100 ratio--16x9 object-fit-center">
							<?php
							$thumb = get_the_post_thumbnail($highlight_post->ID, 'medium');
							if ($thumb) {
								// the_post_thumbnail($highlight_post->ID, 'full', array('loading' => false));
								echo $thumb;
							} else {

							?>
								<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2021/07/mckl-logo.jpg" alt="MCKL placeholder">
							<?php
							}
							?>
						</figure>
					</div>
					<div class="col-md-6">
						<div class="card-body bg__blue color__invert h-100 p-md-5">
							<h4 class="color__orange"><?php echo $highlight_title; ?></h4>
							<a href="<?php the_permalink($highlight_post->ID); ?>">
								<h5 class="card-title"><?php echo $highlight_post->post_title; ?></h5>
							</a>
							<?php if ($highlight_post->post_excerpt) : ?>
								<p class="card-text"><?php echo $highlight_post->post_excerpt; ?></p>
							<?php endif; ?>
							<a class="font-weight-bold" href="<?php the_permalink($highlight_post->ID); ?>">Read More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php while (have_posts()) : ?>
		<?php the_post(); ?>
		<?php if (!empty($highlight_post->ID) && $highlight_post->ID == get_the_ID()) {
			continue;
		} ?>
		<?php get_template_part('template-parts/content/content', get_theme_mod('display_excerpt_or_full_post', 'excerpt')); ?>
	<?php endwhile; ?>

	<?php twenty_twenty_one_the_posts_navigation(); ?>


<?php else : ?>
	<?php get_template_part('template-parts/content/content-none'); ?>
<?php endif; ?>

<?php get_footer(); ?>