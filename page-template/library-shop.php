<?php /**
 *
 * Template Name: Библиотека-магазин
 *
 */;?>

<div class="libery__menu">
	<div class="libery__menu__bar">
		<a href="">Библиотека</a>
		<a href="">Книги</a>
		<a href="">Уровневые книги</a>
	</div>
</div>

<?php get_header();?>
<section class="libery">
	<div class="container">
		<div class="g-title g-title--1 turquoise" data-aos="title-animation">
			<h2><span><?php the_title();?> </span></h2>
		</div>

		<?php echo do_shortcode('[wd_asp id=4]'); ?>
		<?php foreach ($terms as $term): ?>
		<div class="books__descr <?php echo $term->slug; ?>">
			<?php echo $term->description; ?>
		</div>
		<?php endforeach;?>
		<div class="libery__wrapp">

			<?php $i     = 0;?>
			<?php $args  = array('post_type' => 'privetboock', 'posts_per_page' => 100);?>
			<?php $query = new WP_Query($args);?>
			<?php if ($query->have_posts()) {while ($query->have_posts()) {$query->the_post();?>
			<?php global $post;?>
			<?php $age      = get_the_terms($post->ID, 'age');?>
			<?php $programm = get_the_terms($post->ID, 'programm');?>
			<?php $autor    = get_the_terms($post->ID, 'autor');?>
			<?php $i++;?>

			<div
				class="libery__item <?php foreach ($age as $terms) {echo $terms->slug . ' ';}?> <?php foreach ($programm as $terms) {echo $terms->slug . ' ';}?> <?php foreach ($autor as $terms) {echo $terms->slug . ' ';}?>"
				data-aos="books-amin" data-aos-offset="-500" data-aos-delay="<?php echo $i . '00'; ?>">
				<a href="<?php the_permalink();?>">
					<div class="libery__img"><?php the_post_thumbnail(['370','400']);?></div>
				</a>
				<div class="">
					<a href="<?php the_permalink();?>">
						<h2><?php the_title();?></h2>
					</a>

					<!-- <p><b>Возраст:</b> <?php foreach ($age as $terms) {echo $terms->name . ' ';}?></p> -->
					<!-- <p><b>По мотивам..:</b> <?php foreach ($programm as $terms) {echo $terms->name . ' ';}?></p> -->
					<!-- <p><b>Автор:</b> <?php foreach ($autor as $terms) {echo $terms->name . ' ';}?></p> -->
				</div>

				<div class="libery__more"><a class="btn" href="<?php the_permalink();?>">Смотреть книгу</a></div>
			</div>
			<?php }}?>
		</div>
	</div>
	</div>
</section>

</div>

<?php get_footer();?>