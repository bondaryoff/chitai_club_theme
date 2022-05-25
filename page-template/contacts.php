<?php 
/**
 * 
 * Template Name: Контакты
 * 
 */
?>
<?php get_header() ?>
<section class="formblock">
	<div class="container">
		<div class="formblock__wr">
		<h1><div class="g-title g-title--2"><?php the_title() ?></div></h1>
			<?php echo do_shortcode('[contact-form-7 id="508" title="ОБРАТНАЯ СВЯЗЬ"]'); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>