<?php
/**
 * Template Name: Services Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
	<div class="container">
	<?php $query = new WP_query( array(
   'post_type' => array('services')
    )
  );
  if ( $query->have_posts() ) { ?>
	  <div class="gallery" id="services_gallery">
			<div class="gallery-sizer"></div>
	    <?php foreach ($query->posts as $post) { ?>
			    <div id="<?php echo $post->post_name;?>" class="gallery-item">
			      <div class="gallery-item__container">
			        <div class="gallery-item__image" style="background-image:url('<?php the_field('service_image'); ?>')"></div>
			        <div class="gallery-item__content">
			          <h3 class="gallery-item__title"><?php the_title(); ?></h3>
			          <p class="gallery-item__desc"><?php the_field('intro_content'); ?></p>
			          <a class="gallery-item__button" href="#">Read More</a>
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
