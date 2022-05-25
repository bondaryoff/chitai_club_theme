<?php /**
 *
 * Template Name: Главная
 *
 */;?>



<?php get_header();?>

<div class="promo-block">
	<div class="container">
		<div class="promo-block__inn">
			<?php if (have_rows('slajder')): ?>
			<?php while (have_rows('slajder')): the_row();?>

			<div class="promo-block__item" style="background-image: url(<?php the_sub_field('izobrazhenie');?>);">
				<div class="promo-block__title">
					<h1><?php the_sub_field('slogan');?></h1>
				</div>
			</div>

			<?php endwhile;?>
			<?php endif;?>

		</div>

		<div class="promo-block__dots"></div>

	</div>
	<div class="promo-block__bottom"> </div>
</div>

<?php if (get_field('zagolovok')): ?>
<div class="anons">
	<div class="container">
		<div class="g-title g-title--1 green" data-aos="title-animation" data-aos-offset="-800">
			<h2><span><?php echo get_field('zagolovok'); ?></span></h2>
		</div>
		<div class="row">
			<?php $loop = get_field('loop');?>
			<?php foreach ($loop as $loop) {?>
				<?php $modal = $loop['modalnoe_okno']; ?>

			<a class="anons__item <?php if($modal){echo ' modal-open';}?>" href="<?php echo $loop['ssylka']; ?>"
				style="background-color:<?php echo $loop['czvet_fona']; ?>">

				<?php if ($loop['tekst_bejdzha']): ?>
				<div class="anons__badge badge-open" style="background-color:<?php echo $loop['czvet_bejdzha']; ?>">
					<?php echo $loop['tekst_bejdzha']; ?></div>
				<?php endif;?>

				<?php if ($loop['izobrazhenie']): ?>
				<div class="anons__img"><img src="<?php echo $loop['izobrazhenie']; ?>" alt=""></div>
				<?php endif;?>

				<?php if ($loop['zagolovok']): ?>
				<h2><?php echo $loop['zagolovok']; ?></h2>
				<?php endif;?>


				<?php if ($loop['opisanie']): ?>
				<div class="anons__text"><?php echo $loop['opisanie']; ?></div>
				<?php endif;?>

				<?php if ($loop['tekst_knopki']): ?>
				<div class="btn"><?php echo $loop['tekst_knopki']; ?></div>
				<?php endif;?>

			</a>

			<?php }?>

		</div>
	</div>
</div>
<?php endif;?>

<section class="how-works" id="how-works">
	<div class="container">
		<div class="g-title g-title--1 pink" data-aos="title-animation" data-aos-offset="-800">
			<h2><span> <?php the_field('kak_eto_rabotaet_zagolovok');?> </span></h2>
		</div>
		<div class="how-works__wr">
			<?php if (have_rows('kak_eto_rabotaet')): ?>
			<?php $i = 0;?>
			<?php while (have_rows('kak_eto_rabotaet')): the_row();?>
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

<section class="select-as">
	<div class="container">
		<div class="g-title g-title--1" data-aos="title-animation" data-aos-offset="-800">
			<h2><span> <?php the_field('vy_poluchaete_zagolovok');?> </span></h2>
		</div>
		<div class="select-as__wr">

			<?php if (have_rows('vy_poluchaete')): ?>
			<?php $i = 0;?>
			<?php while (have_rows('vy_poluchaete')): the_row();?>
			<?php $i++;?>

			<div class="select-as__item select-as__item--<?php echo $i; ?>" data-aos="select-as-anim" data-aos-offset="-800"
				data-aos-delay="<?php echo $i . '00'; ?>">
				<div class="select-as__img">
					<div class="select-as__imgs">
						<img src="<?php the_sub_field('izobrazhenie');?>" alt="">
					</div>
				</div>
				<strong><?php the_sub_field('zagolovok');?></strong>
				<p><?php the_sub_field('tekst');?></p>
			</div>

			<?php endwhile;?>
			<?php endif;?>

		</div>
	</div>
</section>

<section class="programs">
	<div class="container">
		<div class="g-title g-title--1 turquoise" data-aos="title-animation" data-aos-offset="-800">
			<h2><span>Программы чтения </span></h2>
		</div>
		<div class="programs__wr">

			<?php $args  = array('post_type' => 'product', 'posts_per_page' => 9, 'product_cat' => 'programmy-chteniya');?>
			<?php $query = new WP_Query($args);?>
			<?php $i     = 0;?>
			<?php if ($query->have_posts()) {while ($query->have_posts()) {$query->the_post();?>
			<?php $i++;?>

			<div class="programs__item" data-aos="programs-amin" data-aos-offset="-800">
				<a href="<?php the_permalink();?>">
					<div class="programs__img" style="background-image:url(<?php the_post_thumbnail_url();?>)"></div>
				</a>
				<div class="programs__info">
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
				<div class="programs__more"><a class="btn" href="<?php the_permalink();?>">Больше</a></div>
			</div>

			<?php }}?>

		</div>
		<div class="programs__all">
			<a class="btn" href="<?php bloginfo('url');?>/programmy-chteniya/">Все программы</a>
		</div>
	</div>
</section>

<section class="testblock">
	<div class="container">
		<div class="testblock__wr">
			<div data-aos="fade-up" data-aos-offset="-800"><a class="btn" href="https://chitai.club/testiruem-s-uchitelem/">ТЕСТИРОВАНИЕ С УЧИТЕЛЕМ</a></div>
			<p data-aos="fade-up" data-aos-offset="-800">Если вы не уверены какой уровень подойдет вашему ребенку, вы можете
				назначить бесплатный звонок-тест с учителем <a href="https://chitai.club/testiruem-s-uchitelem/">здесь</a></p>
		</div>
	</div>
</section>

<?php get_template_part('template-parts/our-team');?>

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
<?php get_template_part('template-parts/formblock');?>
</div>

<?php get_footer();?>