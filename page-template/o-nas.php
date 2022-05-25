<?php 
/**
 * 
 * Template Name: О нас
 * 
 * */ 
?>
<?php get_header() ?>
<div class="o-nas">
	<div class="container">
		<div class="o-nas__block">
			<div class="o-nas__item">
				<div class="o-nas__title g-title g-title--1" data-aos="title-animation">
					<span>
						<h1><?php the_title() ?></h1>
					</span>
				</div>
				<div class="o-nas__text"> <?php the_field('tekst') ?> </div>
			</div>
			<?php if ( have_rows('repeater') ) : ?>
			<?php while( have_rows('repeater') ) : the_row(); ?>
			<div class="o-nas__item">
				<div class="o-nas__title g-title g-title--2" data-aos="title-animation">
					<span>
						<h2><?php the_sub_field('zagolovok'); ?></h2>
					</span>
				</div>
				<div class="o-nas__text">
					<?php the_sub_field('tekst'); ?>
				</div>
			</div>

			<?php endwhile; ?>
			<?php endif; ?>

		</div>


	</div>
	<?php get_template_part( 'template-parts/our-team' ) ?>
	<?php get_template_part( 'template-parts/formblock' ) ?>
</div>
</div>
<?php get_footer(); ?>