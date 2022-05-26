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

	<div class="books__descr <?php //echo $term->slug; ;;;;;;;;?>">
		<?php //echo $term->description; ;;;;;;;;?>
	</div>
	<?php $args = array('post_type' => 'privetboock');?>
	<?php $query = new WP_Query($args);?>
	<div class="libery__wrapp">

		<?php if ($query->have_posts()): ?>
		<?php $i = 0;?>
		<?php while ($query->have_posts()): $query->the_post();?>
		<?php $i++;?>
		<div class="libery__item" data-aos="books-amin" data-aos-offset="-500" data-aos-delay="<?php echo $i . '00'; ?>">
			<a href="<?php the_permalink();?>">
				<div class="libery__img"><?php the_post_thumbnail(['370', '400']);?></div>
				<?php the_title();?>
			</a>
		</div>

		<?php endwhile;?>
		<?php endif;?>

		<?php wp_reset_query();?>


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


<?php get_footer();?>