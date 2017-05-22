<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header class="row">
			<div class="hero col-xs-12">
	      <?php get_template_part('templates/page', 'header'); ?>
			</div>
    </header>
    <div class="row">
			<div class="content col-xs-12 col-md-12">
				<?php echo get_field('full_content'); ?>
			</div>
    </div>
  </article>
<?php endwhile; ?>