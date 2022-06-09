<!-- <div class="libery__menu">
	<div class="libery__menu__bar">
		<a href="">Библиотека</a>
		<a href="">Книги</a>
		<a href="">Уровневые книги</a>
	</div>
</div> -->

<?php get_header();?>


<div class="container">
	<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
		<?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
	</div>

</div>



<?php $termID = get_queried_object()->term_id ?>

<?php $termchildren = get_term_children( $termID, 'library_type' ); ?>

<?php if($termchildren){ ?>
<section class="libery">
	<div class="container">
		<div class="g-title g-title--1 turquoise" data-aos="title-animation">
			<h2><span><?php single_term_title();?> </span></h2>
		</div>
	</div>

	<div class="library-type">
		<div class="container">
			<div class="library-type__wr">
				<?php foreach ($termchildren as $library_type_item) {?>
				<div class="library-type__item">
					<a href="<?php echo get_bloginfo('url') . '/library_type/' . get_term($library_type_item)->slug . '/'; ?>"
						style="color:<?php the_field('czvet_ramki_i_teksta', $library_type_item);?>">
						<div class="library-type__img"
							style="border-color:<?php the_field('czvet_ramki_i_teksta', get_term($library_type_item));?>">
							<?php $img = get_field('izobrazhenie', get_term($library_type_item));?>
							<?php echo wp_get_attachment_image($img['ID'], 'medium'); ?>
						</div>
						<h2><?php echo get_term($library_type_item)->name;?></h2>
					</a>
				</div>
				<?php }?>
			</div>
		</div>
	</div>
</section>
<?php } else { ?>

<div class="container">
	<div class="g-title g-title--1 turquoise" data-aos="title-animation">
		<h2><span><?php single_term_title();?> </span></h2>
	</div>
	<?php echo do_shortcode('[wd_asp id=4]'); ?>
	<?php if ( get_field('zagolovok_spojlera',get_queried_object()) ) : ?>
	<div class="library__spoiler">
		<div class="library__spoiler__title">
			<?php echo get_field('zagolovok_spojlera',get_queried_object()); ?>
		</div>
		<?php if ( get_field('tekst_spojlera',get_queried_object()) ) : ?>
		<div class="library__spoiler__body">
			<?php echo get_field('tekst_spojlera',get_queried_object()); ?>
		</div>
		<?php endif; ?>
	</div>
	<?php endif; ?>



	<div class="books__wr">
		<div class="books__items">




			<?php $args = array('post_type' => 'privetboock');?>
			<?php $query = new WP_Query($args);?>
			<div class="libery__row">

				<?php if ($query->have_posts()): ?>
				<?php $i = 0;?>
				<?php while ($query->have_posts()): $query->the_post();?>
				<?php $i++;?>
				<section class="libery__box" data-aos="books-amin" data-aos-offset="-500"
					data-aos-delay="<?php echo $i . '00'; ?>">
					<div class="libery__box__img">
						<?php the_post_thumbnail(['200', '999',true]);?>
					</div>
					<div class="libery__box__info">
						<div class="libery__box__text">
							<h2><?php the_title();?></h2>
							<p><b>Автор:</b>
								<?php $avtor = get_the_terms( $post->ID, 'avtor' ) ?>
								<?php foreach ($avtor as $term): ?>
								<span><?php echo $term->name; ?></span>
								<?php endforeach ?>
							</p>
							<p><b>Сложность чтения:</b>
								<?php $complexity = get_the_terms( $post->ID, 'complexity' ) ?>
								<?php foreach ($complexity as $term): ?>
								<span><?php echo $term->name; ?></span>
								<?php endforeach ?>
							</p>
							<p>
								<b>Цикл:</b>
								<?php $loop = get_the_terms( $post->ID, 'loop' ) ?>
								<?php foreach ($loop as $term): ?>
								<span><?php echo $term->name; ?></span>
								<?php endforeach ?>
							</p>
							<p>
								<b>Интересно детям:</b>
								<?php $interesting_for_children = get_the_terms( $post->ID, 'interesting_for_children' ) ?>
								<?php foreach ($interesting_for_children as $term): ?>
								<span><?php echo $term->name; ?></span>
								<?php endforeach ?>
							</p>
							<div class="libery__excerpt">
								<?php the_excerpt(); ?>
							</div>
						</div>

						<div class="libery__box__btns">
							<?php if ( get_field('audio_kniga') ) : ?>
							<a href="<?php the_field('audio_kniga'); ?>" class="libery__btn audio_kniga">Аудио книга</a>
							<?php else: ?>
							<div class="libery__btn disable">Аудио книга</div>
							<?php endif; ?>
							<!--  -->
							<?php if ( get_field('videoobzor') ) : ?>
							<a href="<?php the_field('videoobzor'); ?>" class="libery__btn videoobzor">Видеообзор</a>
							<?php else: ?>
							<div class="libery__btn disable">Видеообзор</div>
							<?php endif; ?>


							<a href="<?php the_permalink(); ?>" class="libery__btn more">Читать книгу</a>
						</div>

					</div>
					<div id="video-placeholder"></div>
					<div>
						<div class="btn-bar">
							<button id="play" class="start btn">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36">
									<path fill="#FFF" d="M8 7l22 11L8 29z" />
								</svg>
							</button>
							<button id="pause" class="pause btn">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36">
									<path fill="#FFF" d="M20 7h5v22h-5zm-9 0h5v22h-5z" />
								</svg>
							</button>
						</div>
						<!-- <input id="progress-bar" type="range" style="width: 100%;">
						<div class="time-bar">
							<span id="current-time"></span>
							<span id="duration"></span>
						</div> -->
					</div>
					<script>
					// var videoid = '<?php echo get_field('audio_kniga') ?>';
					// var endtime = '<?php echo get_field('prodolzhitelnost_audio_knigi') ?>';
					</script>
				</section>

				<?php endwhile;?>
				<?php endif;?>

				<?php wp_reset_query();?>


			</div>



		</div>

		<div class="books__filter">
			<a href="" class="btn books__filter__reset">Сбросить фильтры</a>
			<br>
			<div class="books__filter__item">
				<?php $terms = get_terms(['taxonomy' => 'complexity', 'hide_empty' => false]);?>
				<h3>Сложность:</h3>
				<?php foreach ($terms as $term): ?>
				<label>
					<input type="checkbox" name="filter[]" value="<?php echo $term->slug; ?>">
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
				<?php $terms = get_terms(['taxonomy' => 'interesting_for_children', 'hide_empty' => false]);?>
				<h3>Интеоесно детям:</h3>
				<?php foreach ($terms as $term): ?>
				<label>
					<input type="checkbox" name="filter[]" value="<?php echo $term->slug; ?>">
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
					<input type="checkbox" name="filter[]" value="<?php echo $term->slug; ?>">
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
				<?php $terms = get_terms(['taxonomy' => 'product_cat', 'hide_empty' => false]);?>
				<h3>Сложность:</h3>
				<?php foreach ($terms as $term): ?>
				<label>
					<input type="checkbox" name="filter[]" value="<?php echo $term->slug; ?>">
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
<?php } ?>
<?php //$age      = get_the_terms($post->ID, 'age');;;;;;;;?>
<?php //$programm = get_the_terms($post->ID, 'programm');;;;;;;;?>
<?php //$autor    = get_the_terms($post->ID, 'autor');;;;;;;;?>


<!-- <div
			class="libery__item <?php //foreach ($age as $terms) {echo $terms->slug . ' ';};;;;;;;?> <?php //foreach ($programm as $terms) {echo $terms->slug . ' ';};;;;;;;?> <?php //foreach ($autor as $terms) {echo $terms->slug . ' ';};;;;;;;?>"
			data-aos="books-amin" data-aos-offset="-500" data-aos-delay="<?php //echo $i . '00'; ;;;;;;;?>"> -->
<!-- <a href="<?php //the_permalink();;;;;;;;?>">
				<div class="libery__img"><?php //the_post_thumbnail(['370', '400']);;;;;;;;?></div>
			</a> -->
<!-- <div class=""> -->
<!-- <a href="<?php //the_permalink();;;;;;;;?>">
					<h2><?php //the_title();;;;;;;;?></h2>
				</a> -->

<!-- <p><b>Возраст:</b> <?php //foreach ($age as $terms) {echo $terms->name . ' ';};;;;;;;?></p> -->
<!-- <p><b>По мотивам..:</b> <?php //foreach ($programm as $terms) {echo $terms->name . ' ';};;;;;;;?></p> -->
<!-- <p><b>Автор:</b> <?php //foreach ($autor as $terms) {echo $terms->name . ' ';};;;;;;;?></p> -->
<!-- </div> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script src="https://www.youtube.com/iframe_api"></script>
<script src="<?php bloginfo('template_url') ?>/js/youtube.js"></script>
<?php get_footer();?>