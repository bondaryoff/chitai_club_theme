<?php

/**
 * Template Name: Подписки
 */
;?>

<?php get_header();?>
<div class="lp">
	<div class="lp-block6__wr">
		<div class="container">

			<?php $loop = get_field('loop');?>
			<?php foreach ($loop as $loop) {?>

			
			<div class="g-title g-title--1 aos-init aos-animate" data-aos="title-animation" data-aos-offset="-800">
				<h2><span><?php echo $loop['zagolovok']; ?></span></h2>
			</div>

			<div class="subscribe__text">
				<?php echo $loop['opisanie']; ?>
			</div>


			<div class="lp-block6">
				<div class="lp-block6__items">
					<?php $item = $loop['item'];?>
					<?php foreach ($item as $item) {?>


					<?php $args  = array('post_type' => 'product', 'posts_per_page' => 1000, 'product_cat' => 'podpiska', 'p' => $item);?>
					<?php $query = new WP_Query($args);?>
					<?php if ($query->have_posts()) {while ($query->have_posts()) {$query->the_post();?>
					<?php global $post;?>

					<div class="lp-block6__item">
						<div class="lp-block6__head">
							<?php the_title();?> <br>
							<?php the_field('zagolovok_lending');?>
						</div>
						<div class="lp-block6__body">
							<div class="price">
								<?php if (get_field('czena_nedelya')): ?>
								<ins>
									$<?php echo get_field('czena_nedelya'); ?> / <?php the_field('period_podpiski');?>
								</ins>
								<?php endif;?>

								<?php if (get_field('staraya_czena_nedelya')): ?>
								<del>
									$<?php echo get_field('staraya_czena_nedelya'); ?> / <?php the_field('period_podpiski');?>
								</del>
								<?php endif;?>
							</div>
							<?php if (get_field('ekonomiya_nedelya')): ?>
							<div class="lp-block6__ekonomy">
								<span>Экономия</span>
								$<?php echo get_field('ekonomiya_nedelya'); ?> / <?php the_field('period_podpiski');?>
							</div>
							<?php endif;?>
							<?php if (get_field('opisanie_oplaty')): ?>
							<div class="lp-block6__description">
								<?php echo get_field('opisanie_oplaty'); ?>
							</div>
							<?php endif;?>

							<!-- <p><?php //woocommerce_template_single_price();;;?></p> -->
							<!-- <div class="lp-block6__days"><?php //the_field('kolichestvo_dnej_lending');;;?></div> -->

						</div>
						<!-- <div class="lp-block6__footer"> -->
						<?php //woocommerce_template_single_add_to_cart();;?>
						<!-- </div> -->
						<?php //the_content();;;?>
						<div class="lp-block6__footer">

							<form class="cart" action="https://chitai.club/?product=<?php echo $post->post_name; ?>" method="post"
								enctype="multipart/form-data">

								<!-- <div class="quantity">
									<label class="screen-reader-text" for="quantity_6131aa087af2e"><?php the_title();?></label>
									<input type="number" id="quantity_6131aa087af2e" class="input-text qty text" step="1" min="1" max=""
										name="quantity" value="1" title="Кол-во" size="4" placeholder="" inputmode="numeric">
								</div> -->

								<button type="submit" name="add-to-cart" value="<?php echo $post->ID; ?>"
									class="btn single_add_to_cart_button button alt"><?php echo get_field('nazvanie_knopki'); ?></button>

							</form>


						</div>
					</div>

					<?php }}?>
					<?php }?>


				</div>
			</div>
			<br><br><br>

			<?php }?>

		</div>
	</div>
</div>

<style>
.quantity {
	display: none;
}
</style>
<?php get_footer();?>


