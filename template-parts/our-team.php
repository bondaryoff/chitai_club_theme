<section class="teamblock">
	<div class="our-team">
		<div class="container">
			<div class="g-title g-title--1" data-aos="title-animation" data-aos-offset="-800">
				<span><?php the_field('our-team-zagolovok','option') ?></span></div>
			<div class="our-team__wr">

				<?php if ( have_rows('our-team-loop','option') ) : ?>
				<?php while( have_rows('our-team-loop','option') ) : the_row(); ?>

				<div class="our-team__item" data-aos="team-anim" data-aos-offset="-800">
					<div class="our-team__photo">
						<span style="background-image:url(<?php the_sub_field('izobrazhenie'); ?>)"></span>
					</div>
					<div class="our-team__text">
						<div class="our-team__info">
							<h2><?php the_sub_field('zagolovok'); ?></h2>
						</div>
						<div class="our-team__description"><?php the_sub_field('opisanie'); ?></div>
					</div>
				</div>

				<?php endwhile; ?>
				<?php endif; ?>

			</div>
		</div>
	</div>
</section>