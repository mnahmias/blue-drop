<?php
/**
 * Template Name: Team Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
	<div class="container">
	<?php $query = new WP_query( array(
   'post_type' => array('team_members')
    )
  );
  if ( $query->have_posts() ) { ?>
	  <div class="team">
	    <?php foreach ($query->posts as $post) { ?>
			    <div id="<?php echo $post->post_name;?>" class="team-member">
						<div class="team-member__wrapper">
			        <div class="team-member__image" style="background-image:url('<?php the_field('team_member_image'); ?>')">
								<h3 class="team-member__name"><?php the_title(); ?></h3>
			          <p class="team-member__title"><?php the_field('team_member_title'); ?></p>
							</div>
							<div class="team-member__description">
								<?php the_field('team_member_description'); ?>
							</div>
			      </div>
					</div>
	    <?php } ?>
	    <?php wp_reset_postdata(); ?>
	    </div>
	  </div>
	<?php } ?>
	</div>
<?php endwhile; ?>
