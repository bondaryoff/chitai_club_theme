<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

// wp_redirect( 'https://chitai.club/programy-chteniya/' );

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

?>
<!-- <header class="woocommerce-products-header"> -->
<?php //if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ;?>
<!-- <h1 class="woocommerce-products-header__title page-title"><?php //woocommerce_page_title(); ;?></h1> -->
<?php //endif; ;?>

<?php
// /**
//  * Hook: woocommerce_archive_description.
//  *
//  * @hooked woocommerce_taxonomy_archive_description - 10
//  * @hooked woocommerce_product_archive_description - 10
//  */
// do_action( 'woocommerce_archive_description' );
;?>
<!-- </header> -->
<?php
// if ( woocommerce_product_loop() ) {

//  /**
//   * Hook: woocommerce_before_shop_loop.
//   *
//   * @hooked woocommerce_output_all_notices - 10
//   * @hooked woocommerce_result_count - 20
//   * @hooked woocommerce_catalog_ordering - 30
//   */
//  do_action( 'woocommerce_before_shop_loop' );

//  woocommerce_product_loop_start();

//  if ( wc_get_loop_prop( 'total' ) ) {
//   while ( have_posts() ) {
//    the_post();

//    /**
//     * Hook: woocommerce_shop_loop.
//     */
//    do_action( 'woocommerce_shop_loop' );

//    wc_get_template_part( 'content', 'product' );
//   }
//  }

//  woocommerce_product_loop_end();

//  /**
//   * Hook: woocommerce_after_shop_loop.
//   *
//   * @hooked woocommerce_pagination - 10
//   */
//  do_action( 'woocommerce_after_shop_loop' );
// } else {
//  /**
//   * Hook: woocommerce_no_products_found.
//   *
//   * @hooked wc_no_products_found - 10
//   */
//  do_action( 'woocommerce_no_products_found' );
// }

// /**
//  * Hook: woocommerce_after_main_content.
//  *
//  * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
//  */
// do_action( 'woocommerce_after_main_content' );

// /**
//  * Hook: woocommerce_sidebar.
//  *
//  * @hooked woocommerce_get_sidebar - 10
//  */
// // do_action( 'woocommerce_sidebar' );
;?>
<section class="books">
	<div class="container">
		<div class="g-title g-title--1 turquoise" data-aos="title-animation">
			<h2> <span><?php woocommerce_page_title();?></span></h2>
		</div>
		<?php echo do_shortcode('[wd_asp id=2]'); ?>

		<?php //foreach ($terms as $term): ;?>
		<!-- <div class="books__descr <?php //echo $term->slug; ;?>"> -->
		<?php //echo $term->description; ;?>
		<!-- </div> -->
		<?php //endforeach;;?>
		<div class="books__wr">
			<div class="books__items">

				<?php $args  = array('post_type' => 'product', 'posts_per_page' => 1000, 'product_cat' => 'programmy-chteniya');?>
				<?php $query = new WP_Query($args);?>
				<?php if ($query->have_posts()) {while ($query->have_posts()) {$query->the_post();?>
				<?php global $post;?>



				<?php $avtor = wp_get_post_terms($post->ID, 'avtor'); ?>
				<?php $loop = wp_get_post_terms($post->ID, 'loop'); ?>
				<?php $dlitelnost = wp_get_post_terms($post->ID, 'dlitelnost'); ?>
				<?php $level = wp_get_post_terms($post->ID, 'level'); ?>

				<div class="books__item <?php foreach ($avtor as $term) {echo $term->slug;}foreach ($loop as $term) { echo ' '.$term->slug;}foreach ($dlitelnost as $term) {echo ' '.$term->slug;}foreach ($level as $term) {echo ' '.$term->slug;}?>" >
					<!-- 0data-aos="books-amin" 0data-aos-offset="-500"> -->
					<a href="<?php the_permalink();?>">
						<div class="books__img" style="background-image:url(<?php the_post_thumbnail_url();?>)"></div>
					</a>
					<div class="books__info">
						<a href="<?php the_permalink();?>">
							<h2><?php the_title();?></h2>
						</a>

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



					<div class="books__more"><a class="btn" href="<?php the_permalink();?>">Смотреть программу</a></div>
				</div>

				<?php }}?>


			</div>

			<div class="books__filter">
				<a href="" class="btn books__filter__reset">Сбросить фильтры</a>
				<br>

				
				<div class="books__filter__item">
					<?php $terms = get_terms(['taxonomy' => 'level', 'hide_empty' => false]);?>
					<h3>Сложность:</h3>
					<?php foreach ($terms as $term): ?>
					<label>
						<input type="checkbox" name="filter[]" value="<?php echo '.' . $term->slug; ?>">
						<span>
							<svg height="20" width="20" version="1.1" xmlns="http://www.w3.org/2000/svg"
								xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 360 360"
								style="enable-background:new 0 0 360 360;" xml:space="preserve">
								<path
									d="M303.118,0H56.882C25.516,0,0,25.516,0,56.882v246.236C0,334.484,25.516,360,56.882,360h246.236 C334.484,360,360,334.484,360,303.118V56.882C360,25.516,334.484,0,303.118,0z M322.078,303.118c0,10.454-8.506,18.96-18.959,18.96 H56.882c-10.454,0-18.959-8.506-18.959-18.96V56.882c0-10.454,8.506-18.959,18.959-18.959h246.236 c10.454,0,18.959,8.506,18.959,18.959V303.118z">
								</path>
								<path class="check"
									d="M249.844,106.585c-6.116,0-11.864,2.383-16.19,6.71l-84.719,84.857l-22.58-22.578c-4.323-4.324-10.071-6.706-16.185-6.706 c-6.115,0-11.863,2.382-16.187,6.705c-4.323,4.323-6.703,10.071-6.703,16.185c0,6.114,2.38,11.862,6.703,16.184l38.77,38.77 c4.323,4.324,10.071,6.706,16.186,6.706c6.112,0,11.862-2.383,16.19-6.71L266.03,145.662c8.923-8.926,8.922-23.448,0-32.374 C261.707,108.966,255.958,106.585,249.844,106.585z">
								</path>
							</svg>
							<?php echo $term->name; ?>
						</span>
					</label>
					<?php endforeach;?>
				</div>

				<div class="books__filter__item">
					<?php $terms = get_terms(['taxonomy' => 'loop', 'hide_empty' => false]);?>
					<h3>Цикл:</h3>
					<?php foreach ($terms as $term): ?>
					<label>
						<input type="checkbox" name="filter[]" value="<?php echo '.' . $term->slug; ?>">
						<span>
							<svg height="20" width="20" version="1.1" xmlns="http://www.w3.org/2000/svg"
								xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 360 360"
								style="enable-background:new 0 0 360 360;" xml:space="preserve">
								<path
									d="M303.118,0H56.882C25.516,0,0,25.516,0,56.882v246.236C0,334.484,25.516,360,56.882,360h246.236 C334.484,360,360,334.484,360,303.118V56.882C360,25.516,334.484,0,303.118,0z M322.078,303.118c0,10.454-8.506,18.96-18.959,18.96 H56.882c-10.454,0-18.959-8.506-18.959-18.96V56.882c0-10.454,8.506-18.959,18.959-18.959h246.236 c10.454,0,18.959,8.506,18.959,18.959V303.118z">
								</path>
								<path class="check"
									d="M249.844,106.585c-6.116,0-11.864,2.383-16.19,6.71l-84.719,84.857l-22.58-22.578c-4.323-4.324-10.071-6.706-16.185-6.706 c-6.115,0-11.863,2.382-16.187,6.705c-4.323,4.323-6.703,10.071-6.703,16.185c0,6.114,2.38,11.862,6.703,16.184l38.77,38.77 c4.323,4.324,10.071,6.706,16.186,6.706c6.112,0,11.862-2.383,16.19-6.71L266.03,145.662c8.923-8.926,8.922-23.448,0-32.374 C261.707,108.966,255.958,106.585,249.844,106.585z">
								</path>
							</svg>
							<?php echo $term->name; ?>
						</span>
					</label>
					<?php endforeach;?>
				</div>

				<div class="books__filter__item">
					<?php $terms = get_terms(['taxonomy' => 'avtor', 'hide_empty' => false]);?>
					<h3>Автор:</h3>
					<?php foreach ($terms as $term): ?>
					<label>
						<input type="checkbox" name="filter[]" value="<?php echo '.' . $term->slug; ?>">
						<span>
							<svg height="20" width="20" version="1.1" xmlns="http://www.w3.org/2000/svg"
								xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 360 360"
								style="enable-background:new 0 0 360 360;" xml:space="preserve">
								<path
									d="M303.118,0H56.882C25.516,0,0,25.516,0,56.882v246.236C0,334.484,25.516,360,56.882,360h246.236 C334.484,360,360,334.484,360,303.118V56.882C360,25.516,334.484,0,303.118,0z M322.078,303.118c0,10.454-8.506,18.96-18.959,18.96 H56.882c-10.454,0-18.959-8.506-18.959-18.96V56.882c0-10.454,8.506-18.959,18.959-18.959h246.236 c10.454,0,18.959,8.506,18.959,18.959V303.118z">
								</path>
								<path class="check"
									d="M249.844,106.585c-6.116,0-11.864,2.383-16.19,6.71l-84.719,84.857l-22.58-22.578c-4.323-4.324-10.071-6.706-16.185-6.706 c-6.115,0-11.863,2.382-16.187,6.705c-4.323,4.323-6.703,10.071-6.703,16.185c0,6.114,2.38,11.862,6.703,16.184l38.77,38.77 c4.323,4.324,10.071,6.706,16.186,6.706c6.112,0,11.862-2.383,16.19-6.71L266.03,145.662c8.923-8.926,8.922-23.448,0-32.374 C261.707,108.966,255.958,106.585,249.844,106.585z">
								</path>
							</svg>
							<?php echo $term->name; ?>
						</span>
					</label>
					<?php endforeach;?>
				</div>

				<!-- <div class="books__filter__item">
					<?php $terms = get_terms(['taxonomy' => 'dlitelnost', 'hide_empty' => false]);?>
					<h3>Программа:</h3>
					<?php foreach ($terms as $term): ?>
					<label>
						<input type="checkbox" name="filter[]" value="<?php echo '.' . $term->slug; ?>">
						<span>
							<svg height="20" width="20" version="1.1" xmlns="http://www.w3.org/2000/svg"
								xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 360 360"
								style="enable-background:new 0 0 360 360;" xml:space="preserve">
								<path
									d="M303.118,0H56.882C25.516,0,0,25.516,0,56.882v246.236C0,334.484,25.516,360,56.882,360h246.236 C334.484,360,360,334.484,360,303.118V56.882C360,25.516,334.484,0,303.118,0z M322.078,303.118c0,10.454-8.506,18.96-18.959,18.96 H56.882c-10.454,0-18.959-8.506-18.959-18.96V56.882c0-10.454,8.506-18.959,18.959-18.959h246.236 c10.454,0,18.959,8.506,18.959,18.959V303.118z">
								</path>
								<path class="check"
									d="M249.844,106.585c-6.116,0-11.864,2.383-16.19,6.71l-84.719,84.857l-22.58-22.578c-4.323-4.324-10.071-6.706-16.185-6.706 c-6.115,0-11.863,2.382-16.187,6.705c-4.323,4.323-6.703,10.071-6.703,16.185c0,6.114,2.38,11.862,6.703,16.184l38.77,38.77 c4.323,4.324,10.071,6.706,16.186,6.706c6.112,0,11.862-2.383,16.19-6.71L266.03,145.662c8.923-8.926,8.922-23.448,0-32.374 C261.707,108.966,255.958,106.585,249.844,106.585z">
								</path>
							</svg>
							<?php echo $term->name; ?>
						</span>
					</label>
					<?php endforeach;?>
				</div> -->


				<a href="" class="btn books__filter__reset">Сбросить фильтры</a>


			</div>
		</div>
	</div>
</section>

</div>
<?php get_footer('shop');?>