<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package readClub
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container">
		<?php if ( have_posts() ) : ?>

			<div class="g-title g-title--1" data-aos="title-animation" data-aos-offset="-800">
			<h1><span> <?php single_cat_title() ?> </span></h1>
		</div>



		<?php while ( have_posts() ) : the_post(); ?>

		<a href="<?php the_permalink() ?>">
			<div class="blog__item">
				<div class="blog__img">
					<?php the_post_thumbnail() ?>
				</div>
				<div class="blog__text">
					<h2><?php the_title() ?></h2>
					<?php the_excerpt() ?>
					<b>Читать больше</b>
				</div>
			</div>
		</a>

		<?php endwhile; ?>
		<?php endif; ?>

	</div>
</main><!-- #main -->
<?php
get_footer();