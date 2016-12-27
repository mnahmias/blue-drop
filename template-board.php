<?php
/**
 * Template Name: Board Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
	<div class="row">
		<div class="col-xs-12 hero">
			<?php get_template_part('templates/page', 'header'); ?>
		</div>
	</div>
	<?php $query = new WP_query( array(
   'post_type' => array('board_members'),
	 'orderby' => 'none'
    )
  );
  if ( $query->have_posts() ) { ?>
	  <div class="team">
	    <?php foreach ($query->posts as $post) { ?>
			    <div id="<?php echo $post->post_name;?>" class="team-member--board">
						<div class="team-member__wrapper">
							<a href="<?php the_permalink(); ?>">
								<div class="team-member__image">
									<img src="<?php the_field('board_member_vertical_image'); ?>" />
								</div>
							</a>
			      </div>
						<h2 style="font-size: 14px; text-align:center;"><?php the_title(); ?></h2>
					</div>
	    <?php } ?>
	    <?php wp_reset_postdata(); ?>
	    </div>
	<?php } ?>
	</div>
<?php endwhile; ?>
