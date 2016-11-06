<?php use Roots\Sage\Titles; ?>

<div class="hero m-header scene_element scene_element--fadein" style="background-image:url('<?php the_field('hero_image'); ?>')">
	<div class="hero__title"><?php the_title(); ?></div>
	<div class="hero__lede"><?php the_field('hero_lede'); ?></div>
</div>
