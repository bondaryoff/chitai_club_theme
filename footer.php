<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package readClub
 */

;?>

<?php if (!is_page_template('page-template/faq.php')) { ?>
<div class="faq">
	<div class="container">
		<?php if (get_field('faq_zagolovok', 'option')): ?>
		<div class="g-title g-title--1 aos-init aos-animate" data-aos="title-animation" data-aos-offset="-800">
			<h2><span><?php echo get_field('faq_zagolovok', 'option'); ?></span></h2>
		</div>
		<?php endif;?>



		<?php if (have_rows('faq_loop', 'option')): ?>
		<?php while (have_rows('faq_loop', 'option')): the_row();?>
		<div class="faq__item">
			<div class="faq__queschen"><?php the_sub_field('vopros', 'option');?></div>
			<div class="faq__answer"><?php the_sub_field('otvet', 'option');?></div>
		</div>
		<?php endwhile;?>
		<?php endif;?>
	</div>
</div>
<?php }?>
<?php wp_reset_query();?>


<?php wp_reset_postdata();?>
<footer class="footer">
	<div class="container">
		<div class="footer__wr">
			<div class="footer__logo"><img src="<?php bloginfo('template_url');?>/img/general/logo.png" alt=""></div>
			<div class="footer__links">
				<?php wp_nav_menu(['theme_location' => 'footer-menu-1']);?>
				<?php wp_nav_menu(['theme_location' => 'footer-menu-2']);?>
				<?php $current_user = wp_get_current_user();?>
				<?php if (user_can($current_user, 'administrator')) {?>
				<?php wp_nav_menu(['theme_location' => 'admin-menu']);?>
				<?php }?>
			</div>
			<div class="footer__coontacts">
				<p><a href="mailto:info@chitai.club ">info@chitai.club </a></p>
				<ul class="social">
					<?php if ( have_rows('social','option') ) : ?>
					<?php while( have_rows('social','option') ) : the_row(); ?>
					<li>
						<a href="<?php the_sub_field('ssylka'); ?>">
						<img src="<?php the_sub_field('ikonka'); ?>" alt=""></a>
					</li>
					<?php endwhile; ?>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
</footer>

<div style="display:none">
	<div id="soon" class="popup">
		<?php echo do_shortcode('[contact-form-7 id="1311" title="Без названия"]'); ?>
	</div>
	<div id="popup" class="popup">
		<?php echo do_shortcode('[contact-form-7 id="1311" title="Без названия"]'); ?>
	</div>
	<div id="thanks" class="popup">
		Ваша заявка отправлена!
	</div>
</div>
<?php wp_footer();?>

<?php //echo do_shortcode('[booki-booking id="1"]'); ?>
<?php //echo do_shortcode('[booki-list tags="tutor" heading="Find a booking" fromlabel="Check-in" tolabel="Check-out" perpage="5" fullpager="true" enablesearch="false" enableitemheading="true" displayallresultsbydefault="true"]'); ?>
</body>

</html>