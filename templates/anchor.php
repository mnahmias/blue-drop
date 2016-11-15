<?php use Roots\Sage\Titles; ?>

<?php

if( have_rows('topics') ):

	$i = 0;
	$topics = get_field('topics');
  $total_topics = count($topics);

	if( $total_topics > 1 ):

	?>
	<div class="anchor-links col-xs-12 col-md-3 pull-right" id="service-anchor">
		<p class="anchor-links__title">Focus Areas</p>
		<ul class="anchor-links__list">
			<?php while ( have_rows('topics') ) : the_row(); $i++; ?>
			<li class="anchor-links__list-item">
				<a class="anchor-links__link" data-scroll href="#<?php echo $i;  ?>"><?php the_sub_field('topic_title'); ?></a>
			</li>
		<?php endwhile; ?>
		</ul>
	</div>
	<?php	else :

	endif;

endif;

?>
