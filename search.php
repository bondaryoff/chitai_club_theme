<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package readClub
 */

get_header();
?>






<?php if (have_posts()): ?>
<div class="search-r">
	<div class="container">
		<div class="g-title g-title--1 aos-init aos-animate" data-aos="title-animation" data-aos-offset="-800">
			<header class="page-header">
				<h1 class="page-title">
					<span>
						<?php printf(esc_html__('Результаты поиска для: %s', 'readclub'), '<span>' . get_search_query() . '</span>');?>
				</h1></span>

			</header>
		</div>

		<?php while (have_posts()): the_post();?>
		<a href="<?php the_permalink(); ?>" class="search-r__item">
			<?php the_post_thumbnail();?>
			<h2><?php the_title();?></h2>
		</a>
		<?php endwhile;?>
	</div>
</div>
<?php endif;?>
<?php
get_footer();