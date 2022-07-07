<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<div id="product-<?php the_ID();?>" <?php wc_product_class('', $product);?>>

	<?php
/**
 * Hook: woocommerce_before_single_product_summary.
 *
 * @hooked woocommerce_show_product_sale_flash - 10
 * @hooked woocommerce_show_product_images - 20
 */
do_action('woocommerce_before_single_product_summary');
?>

	<div class="summary entry-summary">
		<h1 class="product_title entry-title" style="color:<?php the_field('czvet_zagolovka');?>">
			<?php the_title();?></h1>


		<div class="woocommerce-product-details__short-description">

			<ul>
				<?php $terms = wp_get_post_terms($post->ID, 'avtor');?>
				<?php foreach ($terms as $term) {?>
				<li>
					<strong>Автор:</strong>
					<?php echo $term->name; ?>
				</li>
				<?php }?>

				<?php $terms = wp_get_post_terms($post->ID, 'loop');?>
				<?php foreach ($terms as $term) {?>
				<li>
					<strong>Цикл:</strong>
					<?php echo $term->name; ?>
				</li>
				<?php }?>

				<?php $terms = wp_get_post_terms($post->ID, 'dlitelnost');?>
				<?php foreach ($terms as $term) {?>
				<li>
					<strong>Программа:</strong>
					<?php echo $term->name; ?>
				</li>
				<?php }?>


				<?php $terms = wp_get_post_terms($post->ID, 'level');?>
				<?php foreach ($terms as $term) {?>
				<li>
					<strong>Сложность чтения:</strong>
					<?php echo $term->name; ?>
				</li>
				<?php }?>
			</ul>
		</div>


		<div class="buy-options" id="buy-options">


			<div class="buy-options__item">
				<div class="buy-options__header">
					<span>Записаться на программу. Детали</span>
				</div>

				<?php //echo $current_user_id = get_current_user_id(); ?>
				<pre>
					<?php //print_r(get_user_by('id',$current_user_id)) ?>
				</pre>


				<div class="buy-options__body">
					<h4>1. Выберите ВСЕ удобные дни и уроки и мы запишем вас в ближайший сформированный класс. </h4>
					<!--  -->
					<!-- START DATE SELECT -->
					<div class="getday">
						<?php $den_nedeli = get_field('den_nedeli');?>
						<?php $i          = 1;?>
						<?php foreach ($den_nedeli as $loop) {?>
						<div class="getday__item">
							<input type="checkbox" id="<?php echo 'day_' . $i; ?>" name="day" value="<?php echo $loop['value']; ?>">
							<label for="<?php echo 'day_' . $i; ?>">
								<svg height="20" width="20" version="1.1" xmlns="http://www.w3.org/2000/svg"
									xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 360 360"
									style="enable-background:new 0 0 360 360;" xml:space="preserve">
									<path
										d="M303.118,0H56.882C25.516,0,0,25.516,0,56.882v246.236C0,334.484,25.516,360,56.882,360h246.236 C334.484,360,360,334.484,360,303.118V56.882C360,25.516,334.484,0,303.118,0z M322.078,303.118c0,10.454-8.506,18.96-18.959,18.96 H56.882c-10.454,0-18.959-8.506-18.959-18.96V56.882c0-10.454,8.506-18.959,18.959-18.959h246.236 c10.454,0,18.959,8.506,18.959,18.959V303.118z" />
									<path class="check"
										d="M249.844,106.585c-6.116,0-11.864,2.383-16.19,6.71l-84.719,84.857l-22.58-22.578c-4.323-4.324-10.071-6.706-16.185-6.706 c-6.115,0-11.863,2.382-16.187,6.705c-4.323,4.323-6.703,10.071-6.703,16.185c0,6.114,2.38,11.862,6.703,16.184l38.77,38.77 c4.323,4.324,10.071,6.706,16.186,6.706c6.112,0,11.862-2.383,16.19-6.71L266.03,145.662c8.923-8.926,8.922-23.448,0-32.374 C261.707,108.966,255.958,106.585,249.844,106.585z" />
								</svg>
								<span><?php echo $loop['label']; ?></span>
							</label>
						</div>
						<?php $i++;?>
						<?php }?>
					</div>
					<!-- END DATE SELECT -->
					<!--  -->
					<!--  -->
					<!-- START TIME SELECT -->

					<div class="gettime">
						<?php $vremya = get_field('vremya');?>
						<?php $i      = 1;?>
						<?php foreach ($vremya as $loop) {?>
						<div class="gettime__item">
							<input type="checkbox" name="vremya" id="<?php echo 'time_' . $i; ?>"
								value="<?php echo $loop['value']; ?>">
							<label for="<?php echo 'time_' . $i; ?>">
								<svg height="20" width="20" version="1.1" xmlns="http://www.w3.org/2000/svg"
									xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 360 360"
									style="enable-background:new 0 0 360 360;" xml:space="preserve">
									<path
										d="M303.118,0H56.882C25.516,0,0,25.516,0,56.882v246.236C0,334.484,25.516,360,56.882,360h246.236 C334.484,360,360,334.484,360,303.118V56.882C360,25.516,334.484,0,303.118,0z M322.078,303.118c0,10.454-8.506,18.96-18.959,18.96 H56.882c-10.454,0-18.959-8.506-18.959-18.96V56.882c0-10.454,8.506-18.959,18.959-18.959h246.236 c10.454,0,18.959,8.506,18.959,18.959V303.118z" />
									<path class="check"
										d="M249.844,106.585c-6.116,0-11.864,2.383-16.19,6.71l-84.719,84.857l-22.58-22.578c-4.323-4.324-10.071-6.706-16.185-6.706 c-6.115,0-11.863,2.382-16.187,6.705c-4.323,4.323-6.703,10.071-6.703,16.185c0,6.114,2.38,11.862,6.703,16.184l38.77,38.77 c4.323,4.324,10.071,6.706,16.186,6.706c6.112,0,11.862-2.383,16.19-6.71L266.03,145.662c8.923-8.926,8.922-23.448,0-32.374 C261.707,108.966,255.958,106.585,249.844,106.585z" />
								</svg>
								<span><?php echo $loop['label']; ?></span>
							</label>
						</div>
						<?php $i++;?>
						<?php }?>
					</div>
					<!-- START TIME SELECT -->
					<!--  -->
					<!--  -->
					<!-- START PRICE OPTION SELECT -->
					<h4>2. Выберите подписку. </h4>
					<div class="buy-options__grid" id="subs-items">
						<!--  -->
						<!-- START SUBSCRIBE LOOP -->
						<?php $podpiska = get_field('podpiska');?>
						<?php foreach ($podpiska as $podpiska) {?>
						<label>
							<input type="radio" name="subscribe" value="<?php echo $podpiska->ID; ?>,<?php echo $post->ID; ?>">
							<div class="buy-options__box">
								<span><?php echo $podpiska->post_title; ?></span>
								<?php echo $podpiska->post_content; ?>
							</div>
						</label>
						<?php }?>
						<!--  -->
						<label>
							<input type="radio" name="subscribe" value="<?php echo $post->ID; ?>">
							<div class="buy-options__box">
								<span>У меня уже есть подписка на урок</span>
							</div>
						</label>
						<!-- END NO SUBSCRIBE -->
					</div>
					<br>
					<h4>3. Выберите опцию. </h4>
					<div class="buy-options__grid2" id="book-items">
						<!--  -->
						<label>
							<?php //echo $post->ID; ?>
							<input type="radio" name="boock" value="1022,1464">
							<div class="buy-options__box">
								<span>ДА, КНИГА НУЖНА НА ВРЕМЯ ПРОГРАММЫ </span>
								- Оплата каждую неделю $6/неделя
							</div>
						</label>
						<!--  -->
						<label>
							<input type="radio" name="boock" value="">
							<div class="buy-options__box">
								<span>НЕТ, СПАСИБО, КНИГА НА ВРЕМЯ ПРОГРАММЫ НЕ НУЖНА</span>
							</div>
						</label>
						<!--  -->
						<label>
							<input type="radio" name="boock" value="">
							<div class="buy-options__box">
								<span>У меня уже есть <br> подписка накнигу</span>
							</div>
						</label>
						<!--  -->
					</div>
					<!--  -->
				</div>
			</div>

			<!-- <div class="buy-options__item">
				<div class="buy-options__header">
					<span>Библиотека</span>
				</div>
				<div class="buy-options__body">
					Пока библиотеки нет, но скоро будет.
				</div>
			</div> -->

		</div>


		<!-- <div class="single-product__price"> -->
		<?php woocommerce_template_single_price();?>
		<!-- </div> -->

		<!-- <h4>Выберите подписку. </h4> -->
		<?php woocommerce_template_single_add_to_cart();?>

		<?php woocommerce_template_single_meta();?>
		<?php
/**
 * Hook: woocommerce_single_product_summary.
 *
 * * @hooked woocommerce_template_single_title - 5
 * @hooked woocommerce_template_single_rating - 10
 * * @hooked woocommerce_template_single_price - 10
 * * @hooked woocommerce_template_single_excerpt - 20
 * * @hooked woocommerce_template_single_add_to_cart - 30
 * * @hooked woocommerce_template_single_meta - 40
 * @hooked woocommerce_template_single_sharing - 50
 * @hooked WC_Structured_Data::generate_product_data() - 60
 */
//do_action( 'woocommerce_single_product_summary' );
;?>



	</div>

	<?php
/**
 * Hook: woocommerce_after_single_product_summary.
 *
 * @hooked woocommerce_output_product_data_tabs - 10
 * @hooked woocommerce_upsell_display - 15
 * @hooked woocommerce_output_related_products - 20
 */
?>
	<?php do_action('woocommerce_after_single_product_summary'); ?>

	<div class="content single-product__content">

		<?php if (get_field('video')): ?>
		<?php $video = get_field('video');?>
		<div class="videobox">
			<a href="<?php echo $video; ?>" class="video-popup">
				<?php if (get_field('video_prevyu')): ?>
				<img src="<?php echo get_field('video_prevyu'); ?>" alt="">
				<?php endif;?>
			</a>
		</div>
		<?php endif;?>



		<?php the_field('opisanie');?>
		<div class="single-product__content__box">
			<div class="g-title g-title--2">
				<h2>Программа включает в себя:</h2>
			</div>
			<div class="content__item__wr">
				<?php $p_loop = get_field('p_loop');?>
				<?php $i      = 0;?>
				<?php foreach ($p_loop as $loop) {?>
				<?php $i++;?>
				<div class="content__item content__item-<?php echo $i; ?>">
					<style>
					.content__item-<?php echo $i;?>strong {
						color: <?php echo $loop['czvet_bloka'];
						?> !important;
					}
					</style>
					<div class="content__item__img" style="border-color:<?php echo $loop['czvet_bloka']; ?>;"><img
							src="<?php echo $loop['izobrazhenie']; ?>" alt=""></div>
					<div class="content__item__text">
						<div class="content__item__title" style="color:<?php echo $loop['czvet_bloka']; ?>;">
							<?php echo $loop['zagolovok']; ?></div>
						<?php echo $loop['tekst']; ?>
					</div>
				</div>
				<?php }?>
			</div>
		</div>
		<div class="single-product__content__box">
			<div class="g-title g-title--2">
				<h2>Прочитайте с ребенком страницу из книги или попробуйте 
					<a href="https://chitai.club/testiruem-s-uchitelem/">предварительную встречу с учителем</a>
				</h2>
			</div>
			<img width="100%" height="auto" src="<?php the_field('prochitajte_s_rebenkom');?>" alt="">
			<div id="readtest">
				<?php the_field('prochitajte_s_rebenkom_boock');?>
			</div>
		</div>
		<a href="#buy-options" class="btn scroll-to">Купить программу</a>
		<br>
		<br>
	</div>
</div>