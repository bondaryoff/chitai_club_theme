<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package readClub
 */

get_header();
?>
<div class="container">
	<?php while (have_posts()): the_post();?>
	<div class="g-content">
		<div class="g-title g-title--1" data-aos="title-animation">
			<span>
				<h1><?php the_title();?></h1>
			</span>
		</div>
		<?php the_content();?>
	</div>
	<?php endwhile;?>
	<?php if(get_field('audio_kniga')){ ?>
	<div class="lib-box-popup" id="<?php echo $post->ID; ?>">
		<audio controls>
			<source src="<?php the_field('audio_kniga');?>" type="audio/mpeg">
			Your browser does not support the audio element.
		</audio>
	</div>
	<?php } ?>

	<div class="lib-box-descr">

	

	<p><b>Автор:</b>
		<?php $avtor = get_the_terms($post->ID, 'avtor');?>
		<?php foreach ($avtor as $term): ?>
		<span><?php echo $term->name; ?></span>
		<?php endforeach;?>
	</p>
	<p><b>Сложность чтения:</b>
		<?php $complexity = get_the_terms($post->ID, 'complexity');?>
		<?php foreach ($complexity as $term): ?>
		<span><?php echo $term->name; ?></span>
		<?php endforeach;?>
	</p>
	<!-- <p>
		<b>Цикл:</b>
		<?php $loop = get_the_terms($post->ID, 'loop');?>
		<?php foreach ($loop as $term): ?>
		<span><?php echo $term->name; ?></span>
		<?php endforeach;?>
	</p> -->
	<p>
		<b>Интересно детям:</b>
		<?php $interesting_for_children = get_the_terms($post->ID, 'interesting_for_children');?>
		<?php foreach ($interesting_for_children as $term): ?>
		<span><?php echo $term->name; ?></span>
		<?php endforeach;?>
	</p>
	</div>
	<div class="lib-box__tags">
		<?php $tags = get_the_terms($post->ID, 'tags');?>
		<?php foreach ($tags as $term): ?>
		<a href="<?php echo get_bloginfo('url') . '/tags/' . $term->slug; ?>"><?php echo $term->name; ?></a>
		<?php endforeach;?>
	</div>


	<?php $parts = get_the_terms($post->ID, 'parts');?>
	<?php foreach ($parts as $term): ?>
	<?php if($term){ ?>
	<div class="lib-part">
		<h2><?php echo $term->name; ?></h2>
		<?php $args = ['post_type' => 'privetboock', 'taxonomy' => 'parts', 'orderby' => 'name', 'order' => 'ASC', 'term' => $term->slug];?>
		<?php $query  = new WP_Query($args);?>

		<?php if ($query->have_posts()): ?>
		<ul>
			<?php while ($query->have_posts()): $query->the_post();?>
			<li>
				<a href="<?php the_permalink();?>">
					<?php the_post_thumbnail('thumbnail__custom');?>
					<?php the_title();?>
				</a>
			</li>
			<?php endwhile;?>
		</ul>
		<?php endif;?>
		<?php wp_reset_query();?>
	</div>
	<?php } ?>
	<?php endforeach;?>


	<?php $loop = get_the_terms($post->ID, 'loop');?>
	<?php foreach ($loop as $term): ?>
	<?php if($term){ ?>
	<div class="lib-part">
		<h2><?php echo $term->name; ?></h2>
		<?php $args = ['post_type' => 'privetboock', 'taxonomy' => 'loop', 'orderby' => 'name', 'order' => 'ASC', 'term' => $term->slug];?>
		<?php $query  = new WP_Query($args);?>

		<?php if ($query->have_posts()): ?>
		<ul>
			<?php while ($query->have_posts()): $query->the_post();?>
			<li>
				<a href="<?php the_permalink();?>">
					<?php the_post_thumbnail('thumbnail__custom');?>
					<?php the_title();?>
				</a>
			</li>
			<?php endwhile;?>
		</ul>
		<?php endif;?>
		<?php wp_reset_query();?>
	</div>
	<?php } ?>
	<?php endforeach;?>




	<!-- <div id="video-placeholder"></div>
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
		<input id="progress-bar" type="range" style="width: 100%;">
		<div class="time-bar">
			<span id="current-time"></span>
			<span id="duration"></span>
		</div>
	</div> -->

	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
	<script src="https://www.youtube.com/iframe_api"></script>-->
	<!-- <script>
	var videoid = '<?php echo get_field('audio_kniga'); ?>';
	var endtime = '<?php echo get_field('prodolzhitelnost_audio_knigi'); ?>';
	</script>
	<script src="<?php bloginfo('template_url');?>/js/youtube.js"></script> -->


</div>

<?php
get_footer();