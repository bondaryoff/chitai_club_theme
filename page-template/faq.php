<?php

/**
 * Template Name: FAQ
 */
;?>



<?php get_header();?>

<div class="faq">
	<div class="container">
		<?php if ( get_field('faq_zagolovok', 'option') ) : ?>
		<div class="g-title g-title--1 aos-init aos-animate" data-aos="title-animation" data-aos-offset="-800">
			<h2><span><?php echo get_field('faq_zagolovok', 'option'); ?></span></h2>
		</div>
		<?php endif; ?>



		<?php if ( have_rows('faq_loop','option') ) : ?>
		<?php while( have_rows('faq_loop','option') ) : the_row(); ?>
		<div class="faq__item">
			<div class="faq__queschen"><?php the_sub_field('vopros','option'); ?></div>
			<div class="faq__answer"><?php the_sub_field('otvet','option'); ?></div>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>

<?php get_footer();?>