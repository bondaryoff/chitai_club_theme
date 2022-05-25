<?php /**
 *
 * Template Name: Книги
 *
 */;?>



<?php get_header();?>









<section class="books">
	<div class="container">
		<div class="g-title g-title--1 turquoise" data-aos="title-animation">
			<h2> <span><?php the_title();?> </span></h2>
		</div>
		<?php echo do_shortcode('[wd_asp id=1]'); ?>

		<?php foreach ($terms as $term): ?>
		<div class="books__descr <?php echo $term->slug; ?>">
			<?php echo $term->description; ?>
		</div>
		<?php endforeach;?>
		<div class="books__wr">
			<div class="books__items">

				<?php $i     = 0;?>
				<?php $args  = array('post_type' => 'book', 'posts_per_page' => 100);?>
				<?php $query = new WP_Query($args);?>
				<?php if ($query->have_posts()) {while ($query->have_posts()) {$query->the_post();?>
				<?php global $post;?>
				<?php $age      = get_the_terms($post->ID, 'age');?>
				<?php $programm = get_the_terms($post->ID, 'programm');?>
				<?php $autor    = get_the_terms($post->ID, 'autor');?>
				<?php $i++;?>



				<div
					class="books__item <?php foreach ($age as $terms) {echo $terms->slug . ' ';}?> <?php foreach ($programm as $terms) {echo $terms->slug . ' ';}?> <?php foreach ($autor as $terms) {echo $terms->slug . ' ';}?>"
					data-aos="books-amin" data-aos-offset="-500" data-aos-delay="<?php echo $i . '00'; ?>">
					<a href="<?php the_permalink();?>">
						<div class="books__img" style="background-image:url(<?php the_post_thumbnail_url();?>)"></div>
					</a>
					<div class="books__info">
						<a href="<?php the_permalink();?>">
							<h2><?php the_title();?></h2>
						</a>

						<p><b>Возраст:</b> <?php foreach ($age as $terms) {echo $terms->name . ' ';}?></p>
						<p><b>По мотивам..:</b> <?php foreach ($programm as $terms) {echo $terms->name . ' ';}?></p>
						<p><b>Автор:</b> <?php foreach ($autor as $terms) {echo $terms->name . ' ';}?></p>
					</div>



					<div class="books__more"><a class="btn" href="<?php the_permalink();?>">Смотреть книгу</a></div>
				</div>

				<?php }}?>


			</div>

			<div class="books__filter">
				<div class="books__filter__item">
					<?php $terms = get_terms(['taxonomy' => 'age', 'hide_empty' => false]);?>
					<h3>Возраст:</h3>
					<?php foreach ($terms as $term): ?>
					<label>
						<input type="radio" name="age" value="<?php echo $term->slug; ?>">
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
					<?php $terms = get_terms(['taxonomy' => 'programm', 'hide_empty' => false]);?>
					<h3>По мотивам..:</h3>
					<?php foreach ($terms as $term): ?>
					<label>
						<input type="radio" name="programm" value="<?php echo $term->slug; ?>">
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
					<?php $terms = get_terms(['taxonomy' => 'autor', 'hide_empty' => false]);?>
					<h3>Автор:</h3>
					<?php foreach ($terms as $term): ?>
					<label>
						<input type="radio" name="autor" value="<?php echo $term->slug; ?>">
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
				<a href="" class="btn books__filter__reset">Сбросить фильтры</a>

			</div>
		</div>
	</div>
</section>

</div>

<?php get_footer();?>