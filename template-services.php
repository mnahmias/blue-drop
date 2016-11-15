<?php
/**
 * Template Name: Services Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
	<div class="row">
		<div class="col-xs-12 hero">
			<?php get_template_part('templates/page', 'header'); ?>
		</div>
	<?php $query = new WP_query( array(
   'post_type' => array('services')
    )
  );
  if ( $query->have_posts() ) { ?>
	  <div class="gallery" id="services_gallery">
	    <?php foreach ($query->posts as $post) { ?>
			    <div id="<?php echo $post->post_name;?>" class="gallery-item">
			      <div class="gallery-item__container">
			        <div class="gallery-item__image" style="background-image:url('<?php the_field('hero_image'); ?>')"></div>
			        <div class="gallery-item__content">
			          <h3 class="gallery-item__title"><?php the_title(); ?></h3>
			          <p class="gallery-item__desc"><?php the_field('teaser'); ?></p>
			          <a class="gallery-item__button" href="<?php the_permalink(); ?>">Read More</a>
								<div class="gallery-item__full-text"><?php the_field('full_content'); ?></div>
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
