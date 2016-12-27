<?php use Roots\Sage\Titles; ?>
<h1 class="hero__title"><?php the_title(); ?></h1>
<?php if( get_field('hero_lede') ): ?>
	<p class="hero__lede"><?php the_field('hero_lede'); ?></p>
<?php endif; ?>
<?php if( get_field('team_member_title') ): ?>
	<p class="hero__lede"><?php the_field('team_member_title'); ?></p>
<?php endif; ?>
<?php if( get_field('board_member_title') ): ?>
	<p class="hero__lede"><?php the_field('board_member_title'); ?></p>
<?php endif; ?>
