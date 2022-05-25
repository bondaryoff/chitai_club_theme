<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package readClub
 */

get_header();
?>
<div class="container">
	<?php while ( have_posts() ) : the_post(); ?>
	<div class="g-content">
		<div class="g-title g-title--1" data-aos="title-animation">
			<span>
				<h1><?php the_title() ?></h1>
			</span>
		</div>
		<?php the_content(); ?>
	</div>
	<?php endwhile; ?>
</div>
<?php
get_footer();
