<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header class="row">
			<div class="hero col-xs-12">
	      <?php get_template_part('templates/page', 'header'); ?>
			</div>
    </header>
    <div class="row">
			<?php get_template_part('templates/anchor'); ?>

			<?php if( have_rows('topics') ):

				$topics = get_field('topics');
			  $total_topics = count($topics);

				if( $total_topics > 1 ):

				?>
				<div class="content col-xs-12 col-md-9">
			<?php	else : ?>
				<div class="content col-xs-12 col-md-12">
			<?php endif; ?>
			<?php endif; ?>
				<?php

				// check if the repeater field has rows of data
				if( have_rows('topics') ): $i = 0;

				 	// loop through the rows of data
				    while ( have_rows('topics') ) : the_row(); $i++;

				        // display a sub field value
								?>
								<img class="topic__image" id="<?php echo $i; ?>" src="<?php the_sub_field('topic_image');?>" />
								<h2 class="topic__title"><?php the_sub_field('topic_title'); ?></h2>
								<p class="topic__lede"><?php the_sub_field('topic_lede'); ?></p>
								<div class="topic__content"><?php the_sub_field('topic_content'); ?></div>
								<?php

				    endwhile;

				else :

				    // no rows found

				endif;

				?>
				<?php if( get_field('service_link') ): ?>
					<a class="button--inverse" href="<?php the_field('service_link'); ?>">Learn More About <?php the_title(); ?></a>
				<?php endif; ?>
			</div>
    </div>
  </article>
<?php endwhile; ?>
