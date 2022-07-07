<?php /**
 *
 * Template Name: Библиотека
 *
 */;?>
<!-- <div class="libery__menu">
	<div class="libery__menu__bar">
		<a href="">Библиотека</a>
		<a href="">Книги</a>
		<a href="">Уровневые книги</a>
	</div>
</div> -->

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
<section class="lib container">

	<div class="g-title g-title--1 turquoise" data-aos="title-animation">
		<h2><span><?php the_title();?> </span></h2>
	</div>
	<?php if (get_field('zagolovok_spojlera')): ?>
	<div class="lib-spoiler">
		<div class="lib-spoiler__title">
			<?php echo get_field('zagolovok_spojlera'); ?>
		</div>
		<?php if (get_field('tekst_spojlera')): ?>
		<div class="lib-spoiler__body">
			<?php echo get_field('tekst_spojlera'); ?>
		</div>
		<?php endif;?>
	</div>
	<?php endif;?>


	<div class="lib-tiles">
		<div class="lib-tiles__wr">
			<?php $library_type = get_terms('library_type', ['hide_empty' => false, 'parent' => 0]);?>
			<?php //$cat_hierarchy = array(); ;;;;;;?>
			<?php //sort_terms_hierarchicaly($library_type, $cat_hierarchy); #FEB326;;;;;;?>
			<?php foreach ($library_type as $library_type_item) {?>
			<div class="lib-tiles__item" style="border-color:<?php the_field('czvet_ramki_i_teksta', $library_type_item);?>">
				<a href="<?php echo get_bloginfo('url') . '/library_type/' . $library_type_item->slug . '/'; ?>"
					style="color:<?php the_field('czvet_ramki_i_teksta', $library_type_item);?>">
					<div class="lib-tiles__img">
						<?php $img = get_field('izobrazhenie', $library_type_item);?>
						<?php echo wp_get_attachment_image($img['ID'], '300x300'); ?>
					</div>
					<h2><?php echo $library_type_item->name; ?></h2>
				</a>
			</div>
			<?php }?>
		</div>
	</div>

</section>





<?php get_footer();?>