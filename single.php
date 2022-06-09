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
	<?php while ( have_posts() ) : the_post(); ?>
	<div class="g-content">
		<div class="g-title g-title--1" data-aos="title-animation">
			<span>
				<h1><?php the_title() ?></h1>
			</span>
		</div>
		<?php the_content(); ?>
	</div>
	<?php endwhile; ?>
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
		<input id="progress-bar" type="range" style="width: 100%;">
		<div class="time-bar">
			<span id="current-time"></span>
			<span id="duration"></span>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
	<script src="https://www.youtube.com/iframe_api"></script>
	<script>
	var videoid = '<?php echo get_field('audio_kniga') ?>';
	var endtime = '<?php echo get_field('prodolzhitelnost_audio_knigi') ?>';
	</script>
	<script src="<?php bloginfo('template_url') ?>/js/youtube.js"></script>

	<script>

	</script>

</div>

<?php
get_footer();