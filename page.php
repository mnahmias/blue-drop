<?php while (have_posts()) : the_post(); ?>
	<div class="row">
		<div class="col-xs-12 hero">
			<?php get_template_part('templates/page', 'header'); ?>
		</div>
	</div>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
