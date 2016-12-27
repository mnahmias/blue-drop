<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
		<header class="row">
			<div class="hero col-xs-12">
	      <?php get_template_part('templates/page', 'header'); ?>
			</div>
    </header>
		<div class="row">
	    <div class="content col-xs-12 col-md-9">
				<?php the_field('board_member_description'); ?>
	    </div>
			<div class="team-member__vertical-image col-xs-12 col-md-3">
				<img src="<?php the_field('board_member_vertical_image')?>" />
			</div>
		</div>
  </article>
<?php endwhile; ?>
