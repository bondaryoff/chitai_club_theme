<?php

/**
 * Template Name: Лендинг
 */
;?>



<?php get_header();?>

<div class="lp">
	<!-- lp-header -->
	<?php if (get_field('bl1title')): ?>
	<div class="lp-header__wr">
		<div class="container">
			<div class="lp-header">
				<h1><?php echo get_field('bl1title'); ?></h1>
				<?php if (get_field('bl1_btn_text')): ?>
				<a href="#buy" class="box scroll-to"><?php echo get_field('bl1_btn_text'); ?></a>
				<?php endif;?>
			</div>
		</div>
	</div>
	<?php endif;?>
	<!-- lp-header -->
	<!-- lp-block1 -->

	<div class="lp-block1__wr">
		<div class="lp-block1">
			<div class="container">
				<div class="lp-block1__items">
					<?php if (get_field('bl2_title_1')): ?>
					<h2><?php echo get_field('bl2_title_1'); ?></h2>
					<?php endif;?>
					<?php if (get_field('bl2_title_2')): ?>
					<h2><?php echo get_field('bl2_title_2'); ?></h2>
					<?php endif;?>

				</div>
				<div class="lp-block1__items">
					<?php if (have_rows('bl2_loop_1')): ?>

					<?php while (have_rows('bl2_loop_1')): the_row();?>
					<div class="lp-block1__item">
						<div class="lp-block1__img">
							<img src="<?php the_sub_field('ikonka');?>" alt="">
						</div>
						<p><?php the_sub_field('tekst');?></p>
					</div>

					<?php endwhile;?>

					<?php endif;?>

				</div>

				<?php if (get_field('bl2_btn_text')): ?>
				<a href="#buy" class="btn scroll-to"><?php echo get_field('bl2_btn_text'); ?></a>
				<?php endif;?>

			</div>
		</div>
	</div>
	<!-- lp-block1 -->
	<!-- lp-block2 -->
	<div class="lp-block2__wr">
		<div class="container">
			<?php if (get_field('bl3_title')): ?>
			<div class="g-title g-title--1 aos-init aos-animate" data-aos="title-animation" data-aos-offset="-800">
				<h2><span><?php echo get_field('bl3_title'); ?></span></h2>
			</div>

			<?php endif;?>


			<div class="lp-block2">
				<div class="lp-block2__tiles">
					<?php if (have_rows('bl3_loop')): ?>

					<?php while (have_rows('bl3_loop')): the_row();?>

					<div class="lp-block2__tile">
						<picture>
							<img src="<?php the_sub_field('izobrazhenie');?>" alt="">
						</picture>
						<h3><?php the_sub_field('zagolovok');?></h3>
						<p><?php the_sub_field('tekst');?></p>
					</div>



					<?php endwhile;?>

					<?php endif;?>


				</div>
			</div>
		</div>
	</div>
	<!-- lp-block2 -->
	<!-- lp-block3 -->
	<div class="lp-block3__wr">
		<div class="container">
			<div class="g-title g-title--1 aos-init aos-animate" data-aos="title-animation" data-aos-offset="-800">
				<h2><span>В коробке вы найдете...</span></h2>
			</div>
			<div class="lp-block3">
				<div class="lp-block3__box">

					<img src="<?php bloginfo('template_url');?>/img/content/lpbox.png" alt="">
				</div>
				<div class="lp-block3__inn">
					<div class="lp-block3__item">
						<span>
							<picture>
								<img src="<?php bloginfo('template_url');?>/img/content/lpbox1.jpg" alt="">
							</picture>
						</span>
						<p>Книги из программы</p>
					</div>
					<div class="lp-block3__item">
						<span>
							<picture>
								<img src="<?php bloginfo('template_url');?>/img/content/lpbox2.jpg" alt="">
							</picture>
						</span>
						<p>Адресная этикетка для возврата книг.</p>
					</div>
					<div class="lp-block3__item">
						<span>
							<picture>
								<img src="<?php bloginfo('template_url');?>/img/content/lpbox3.jpg" alt="">
							</picture>
						</span>
						<p>Стирающаяся ручка</p>
					</div>
					<div class="lp-block3__item">
						<span>
							<picture>
								<img src="<?php bloginfo('template_url');?>/img/content/lpbox4.jpg" alt="">
							</picture>
						</span>
						<p>Тетрадка-заготовка для авторского продолжения книги. </p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- lp-block3 -->
	<!-- lp-block4 -->
	<div class="lp-block4__wr">
		<div class="container">

			<div class="lp-block4">
				<div class="lp-block4__item">
					<strong>Вы можете прочитать первые страницы книг уровней и сами определить какой уровень вам подходит и какой
						цикл книг по душе. </strong>
					<picture>
						<img src="<?php bloginfo('template_url');?>/img/content/lpb.jpg" alt="">
					</picture>
					<a href="#buy" class="btn scroll-to">Прочитать пример книг</a>

				</div>
				<div class="lp-block4__or">ИЛИ</div>
				<div class="lp-block4__item lp-block4__item1">
					<strong>Вы можете назначить бесплатную онлайн встречу с учителем, где учитель посоветует какой уровень вам
						подходит, а также ответит на Ваши вопросы по программе </strong>
					<picture>
						<img src="<?php bloginfo('template_url');?>/img/content/lpp.jpg" alt="">
					</picture>
					<a href="" class="btn">Назначить онлайн встречу с учителем</a>
				</div>

			</div>
		</div>
	</div>
	<!-- lp-block4 -->
	<!-- how-works -->
	<section class="how-works" id="how-works">
		<div class="container">
			<div class="g-title g-title--1 pink" data-aos="title-animation" data-aos-offset="-800">
				<h2><span> <?php the_field('kak_eto_rabotaet_zagolovok', 22);?> </span></h2>
			</div>
			<div class="how-works__wr">
				<?php if (have_rows('kak_eto_rabotaet', 22)): ?>
				<?php $i = 0;?>
				<?php while (have_rows('kak_eto_rabotaet', 22)): the_row();?>
				<?php $i++;?>
				<div class="how-works__item how-works__item--<?php echo $i; ?>" data-aos="how-works-anim" data-aos-offset="-800"
					data-aos-delay="<?php echo $i . '00'; ?>">
					<div class="how-works__img">
						<div class="how-works__number"><?php echo $i; ?></div>
						<div class="how-works__imgs"><img src="<?php the_sub_field('izobrazhenie');?>" alt="">
						</div>
					</div><?php the_sub_field('tekst');?>
				</div>
				<?php endwhile;?>
				<?php endif;?>



			</div>
		</div>
	</section>
	<!-- how-works -->
	<!-- lp-block5 -->
	<div class="lp-block5__wr" id="block8">
		<div class="container">
			<div class="g-title g-title--1 aos-init aos-animate" data-aos="title-animation" data-aos-offset="-800">
				<h2><span>Выберите программу...</span></h2>
			</div>
			<div class="lp-block5">
				<div class="lp-block5__items">
					<a href="" class="lp-block5__item">
						<h3>1 уровень</h3>
						<div class="lp-block5__img">
							<img src="<?php bloginfo('template_url');?>/img/content/p1.png" alt="">
						</div>
					</a>
					<a href="" class="lp-block5__item">
						<h3>2 уровень</h3>
						<div class="lp-block5__img">
							<img src="<?php bloginfo('template_url');?>/img/content/2level.jpg" alt="">
						</div>
					</a>
					<a href="" class="lp-block5__item">
						<h3>3 уровень</h3>
						<div class="lp-block5__img">
							<img src="<?php bloginfo('template_url');?>/img/content/p3.png" alt="">
						</div>
					</a>
				</div>
				<div class="lp-block5__text">
					<p>Все еще не уверены в уровне...</p>
					<a href="" class="btn">Назначить онлайн встречу с учителем</a>
					<p>Чтобы определить уровень чтения с учителем...</p>
				</div>
			</div>
		</div>
	</div>


	<div class="lp-block6__wr">
		<div class="container">
			<div class="g-title g-title--1 aos-init aos-animate" data-aos="title-animation" data-aos-offset="-800">
				<h2><span>Участие в клубе</span></h2>
			</div>
			<div class="lp-block6">

				<div class="lp-block6__items">


					<?php $args  = array('post_type' => 'product', 'posts_per_page' => 1000, 'product_cat' => 'podpiska');?>
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
								<ins><?php echo get_field('czena_nedelya'); ?></ins>
								<?php endif;?>

								<?php if (get_field('staraya_czena_nedelya')): ?>
								<del><?php echo get_field('staraya_czena_nedelya'); ?></del>
								<?php endif;?>
							</div>
							<?php if (get_field('ekonomiya_nedelya')): ?>
							<div class="lp-block6__ekonomy">
								<?php echo get_field('ekonomiya_nedelya'); ?>
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

						<div class="lp-block6__footer">
							<?php //woocommerce_template_single_add_to_cart();;?>
							<form class="cart" action="<?php the_permalink();?>" method="post" enctype="multipart/form-data">
								<button type="submit" name="add-to-cart" value="<?php echo $post->ID; ?>"
									class="btn single_add_to_cart_button button alt"><?php the_field('nazvanie_knopki');?></button>

							</form>
						</div>

					</div>

					<?php }}?>
				</div>
			</div>
		</div>
	</div>
	<!-- lp-block5 -->



	<?php if ( get_field('comm_zagolovok', 'option') ) : ?>
	<div class="lp-rew">
		<div class="g-title g-title--1 aos-init aos-animate" data-aos="title-animation" data-aos-offset="-800">
			<h2><span><?php echo get_field('comm_zagolovok', 'option'); ?></span></h2>
		</div>
		<div class="lp-rew__wr">

			<?php if ( have_rows('comm_loop','option') ) : ?>
				<?php while( have_rows('comm_loop','option') ) : the_row(); ?>

				<div class="lp-rew__slide">
				<div class="lp-rew__item">
					<p><?php the_sub_field('tekst','option'); ?></p>
					<div class="lp-rew__info">
						<div class="lp-rew__av">
							<img src="<?php the_sub_field('avatar','option'); ?>" alt="">
						</div>
						<div class="lp-rew__name"><?php the_sub_field('imya','option'); ?></div>
						<div class="lp-rew__date"><?php the_sub_field('data','option'); ?></div>
					</div>
				</div>
			</div>
			
					
			
				<?php endwhile; ?>
			<?php endif; ?>


		</div>
	</div>

	<?php endif; ?>





	<?php wp_reset_postdata();?>



	<div class="tabs" id="buy">
		<div class="container">
			<div class="tabs__nav">
				<a class="active" href="#class_rent_book">Урок + Аренда книги</a>
				<a href="#class">Урок</a>
				<a href="#rent_book">Аренда книги</a>
			</div>
		</div>
	</div>
	<div class="tabs__body">

		<div class="lp-block7__wr open" id="class_rent_book">
			<?php if (get_field('buy_1')): ?>
			<div class="lp-block7__descr">
				<div class="container">
					<?php echo get_field('buy_1'); ?>
				</div>
			</div>
			<?php endif;?>

			<?php $terms = get_terms(['taxonomy' => ['loop'], 'orderby' => 'name', 'order' => 'ASC', 'hide_empty' => true]);?>
			<?php foreach ($terms as $term) {?>
			<div class="lp-block7__box">
				<div class="container">

					<div class="g-title g-title--1 aos-init aos-animate" data-aos="title-animation" data-aos-offset="-800">
						<h2><span>Цикл: <?php echo $term->name; ?></span></h2>
					</div>

					<div class="lp-block7">

						<?php $args  = ['post_type' => 'product', 'loop' => $term->slug, 'orderby' => 'menu_order'];?>
						<?php $query = new WP_Query($args);?>
						<?php $i     = 0;?>
						<?php while ($query->have_posts()): $query->the_post();?>
						<?php global $product;?>
						<?php if ($i == 0) {?>

						<div class="lp-block7__first">
							<a href="<?php the_permalink();?>">
								<?php the_post_thumbnail();?>
							</a>
						</div>

						<?php }?>
						<?php $i++;?>
						<?php endwhile;?>


						<div class="lp-block7__other">
							<div class="lp-block7__items">
								<?php $args  = ['post_type' => 'product', 'loop' => $term->slug];?>
								<?php $query = new WP_Query($args);?>
								<?php $i     = 0;?>
								<?php while ($query->have_posts()): $query->the_post();?>
								<?php if ($i > 0) {?>

								<div class="lp-block7__item">
									<a href="<?php the_permalink();?>">
										<?php the_post_thumbnail();?>
									</a>
								</div>

								<?php }?>
								<?php $i++;?>
								<?php endwhile;?>
							</div>
							<div class="lp-block7__buy">
								<?php $i = 0;?>
								<?php while ($query->have_posts()): $query->the_post();?>
								<?php global $product;?>
								<?php if ($i == 0) {?>
								<h4>Определи уровень чтения - <a href="<?php the_permalink();?>#readtest">Прочитай пробную страницу</a>
								</h4>
								<?php if (get_field('zalog')): ?>
								<?php $zalog = get_field('zalog');?>
								<?php endif;?>

								<div class="buy-options__grid">
									<?php $podpiska = get_field('podpiska');?>
									<?php foreach ($podpiska as $podpiska) {?>

									<label>
										<input type="radio" name="subscribe"
											value="<?php echo $post->ID; ?>,<?php echo $podpiska->ID; ?>,<?php echo $zalog[0]; ?>">
										<div class="buy-options__box">
											<span><?php echo $podpiska->post_title; ?></span>
											<?php echo $podpiska->post_content; ?>
										</div>
									</label>
									<?php }?>
								</div>



								<?php woocommerce_template_single_add_to_cart();?>
								<?php }?>
								<?php $i++;?>
								<?php endwhile;?>
							</div>
						</div>

						<?php wp_reset_query();?>


					</div>
				</div>
			</div>
			<?php }?>
		</div>

		<div class="lp-block7__wr" id="class">
			<?php if (get_field('buy_2')): ?>
			<div class="lp-block7__descr">
				<div class="container">
					<?php echo get_field('buy_2'); ?>
				</div>
			</div>
			<?php endif;?>
			<?php $terms = get_terms(['taxonomy' => ['loop'], 'orderby' => 'name', 'order' => 'ASC', 'hide_empty' => true]);?>
			<?php foreach ($terms as $term) {?>
			<div class="lp-block7__box">
				<div class="container">
					<div class="g-title g-title--1 aos-init aos-animate" data-aos="title-animation" data-aos-offset="-800">
						<h2><span>Цикл: <?php echo $term->name; ?></span></h2>
					</div>

					<div class="lp-block7">

						<?php $args  = ['post_type' => 'product', 'loop' => $term->slug, 'orderby' => 'menu_order'];?>
						<?php $query = new WP_Query($args);?>
						<?php $i     = 0;?>
						<?php while ($query->have_posts()): $query->the_post();?>
						<?php global $product;?>
						<?php if ($i == 0) {?>

						<div class="lp-block7__first">
							<a href="<?php the_permalink();?>">
								<?php the_post_thumbnail();?>
							</a>
						</div>

						<?php }?>
						<?php $i++;?>
						<?php endwhile;?>


						<div class="lp-block7__other">
							<div class="lp-block7__items">
								<?php $args  = ['post_type' => 'product', 'loop' => $term->slug];?>
								<?php $query = new WP_Query($args);?>
								<?php $i     = 0;?>

								<?php while ($query->have_posts()): $query->the_post();?>
								<?php if ($i > 0) {?>

								<div class="lp-block7__item">
									<a href="<?php the_permalink();?>">
										<?php the_post_thumbnail();?>
									</a>
								</div>

								<?php }?>
								<?php $i++;?>
								<?php endwhile;?>
							</div>
							<div class="lp-block7__buy">
								<?php $i = 0;?>
								<?php while ($query->have_posts()): $query->the_post();?>
								<?php global $product;?>
								<?php if ($i == 0) {?>
								<h4>Определи уровень чтения - <a href="<?php the_permalink();?>#readtest">Прочитай пробную страницу</a>
								</h4>
								<?php if (get_field('zalog')): ?>
								<?php $zalog = get_field('zalog');?>
								<?php endif;?>


								<div class="buy-options__grid">
									<?php $podpiska = get_field('podpiska');?>
									<?php foreach ($podpiska as $podpiska) {?>
									<label>
										<input type="radio" name="subscribe" value="<?php echo $post->ID; ?>,<?php echo $podpiska->ID; ?>">
										<div class="buy-options__box">
											<span><?php echo $podpiska->post_title; ?></span> <?php echo $podpiska->post_content; ?>
										</div>
									</label>
									<?php }?>
								</div>


								<?php woocommerce_template_single_add_to_cart();?>
								<?php }?>
								<?php $i++;?>
								<?php endwhile;?>
							</div>
						</div>

						<?php wp_reset_query();?>


					</div>
				</div>
			</div>
			<?php }?>
		</div>

		<div class="lp-block7__wr" id="rent_book">
			<?php if (get_field('buy_3')): ?>
			<div class="lp-block7__descr">
				<div class="container">
					<?php echo get_field('buy_3'); ?>
				</div>
			</div>
			<?php endif;?>
			<?php $terms = get_terms(['taxonomy' => ['loop'], 'orderby' => 'name', 'order' => 'ASC', 'hide_empty' => true]);?>
			<?php foreach ($terms as $term) {?>
			<div class="lp-block7__box">
				<div class="container">
					<div class="g-title g-title--1 aos-init aos-animate" data-aos="title-animation" data-aos-offset="-800">
						<h2><span>Цикл: <?php echo $term->name; ?></span></h2>
					</div>

					<div class="lp-block7">

						<?php $args  = ['post_type' => 'product', 'loop' => $term->slug, 'orderby' => 'menu_order'];?>
						<?php $query = new WP_Query($args);?>
						<?php $i     = 0;?>
						<?php while ($query->have_posts()): $query->the_post();?>
						<?php global $product;?>
						<?php if ($i == 0) {?>

						<div class="lp-block7__first">
							<a href="<?php the_permalink();?>">
								<?php the_post_thumbnail();?>
							</a>
						</div>

						<?php }?>
						<?php $i++;?>
						<?php endwhile;?>


						<div class="lp-block7__other">
							<div class="lp-block7__items">
								<?php $args  = ['post_type' => 'product', 'loop' => $term->slug];?>
								<?php $query = new WP_Query($args);?>
								<?php $i     = 0;?>
								<?php while ($query->have_posts()): $query->the_post();?>
								<?php if ($i > 0) {?>

								<div class="lp-block7__item">
									<a href="<?php the_permalink();?>">
										<?php the_post_thumbnail();?>
									</a>
								</div>

								<?php }?>
								<?php $i++;?>
								<?php endwhile;?>
							</div>
							<div class="lp-block7__buy">
								<?php $i = 0;?>
								<?php while ($query->have_posts()): $query->the_post();?>
								<?php global $product;?>
								<?php if ($i == 0) {?>
								<h4>Определи уровень чтения - <a href="<?php the_permalink();?>#readtest">Прочитай пробную страницу</a>
								</h4>
								<?php if (get_field('zalog')): ?>
								<?php $zalog = get_field('zalog');?>
								<?php endif;?>
								<div class="buy-options__item ">
									<div class="buy-options__grid">
										<?php $abonement = get_field('abonement');?>
										<?php foreach ($abonement as $abonement) {?>
										<label>
											<input type="radio" name="subscribe"
												value="<?php echo $post->ID; ?>,<?php echo $abonement->ID; ?>,<?php echo $zalog[0]; ?>">
											<div class="buy-options__box">
												<span><?php echo $abonement->post_title; ?></span><?php echo $abonement->post_content; ?>
											</div>
										</label>
										<?php }?>
									</div>
								</div>
								<?php woocommerce_template_single_add_to_cart();?>
								<?php }?>
								<?php $i++;?>
								<?php endwhile;?>
							</div>
						</div>

						<?php wp_reset_query();?>


					</div>
				</div>
			</div>
			<?php }?>
		</div>

	</div>
</div>

<?php get_footer();?>