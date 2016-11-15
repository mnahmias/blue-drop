<?php
/**
 * Template Name: Team Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
	<div class="row">
		<div class="col-xs-12 hero">
			<?php get_template_part('templates/page', 'header'); ?>
		</div>
	</div>
	<?php $query = new WP_query( array(
   'post_type' => array('team_members')
    )
  );
  if ( $query->have_posts() ) { ?>
	  <div class="team">
	    <?php foreach ($query->posts as $post) { ?>
			    <div id="<?php echo $post->post_name;?>" class="team-member">
						<div class="team-member__wrapper">
							<a href="<?php the_permalink(); ?>">
								<div class="team-member__image">
									<img src="<?php the_field('team_member_image'); ?>" />
								</div>
							</a>
			      </div>
					</div>
	    <?php } ?>
	    <?php wp_reset_postdata(); ?>
	    </div>
	<?php } ?>
	</div>
<?php endwhile; ?>
