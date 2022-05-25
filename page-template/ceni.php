<?php 
/**
 * 
 * Template Name: Цены
 * 
 * */ 
?>
<?php get_header() ?>
<div class="ceni">
	<div class="container">
		<div class="g-title g-title--1" data-aos="title-animation">
			<span>
				<h1><?php the_title() ?></h1>
			</span>
		</div>
		<div class="g-content">
			<?php the_content(); ?>
		</div>
	</div>
	<?php get_template_part( 'template-parts/our-team' ) ?>
	<?php get_template_part( 'template-parts/formblock' ) ?>
</div>
</div>
<?php get_footer(); ?>