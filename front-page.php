<?php while (have_posts()) : the_post(); ?>
	<div class="row">
		<div class="col-xs-12 hero--home">
			<?php get_template_part('templates/page', 'header'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 full-width">
			<img class="full-width__image" src="<?php the_field('hero_image'); ?>" />
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 content--large--gray">
			<h2 class=""><?php the_field('section_1_title'); ?></h2>
			<p><?php the_field('section_1_content'); ?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 content--large">
			<h2><?php the_field('section_2_title'); ?></h2>
			<p><?php the_field('section_2_content'); ?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 full-width">
			<img class="full-width__image" src="<?php the_field('footer_image'); ?>" />
		</div>
	</div>
<?php endwhile; ?>
