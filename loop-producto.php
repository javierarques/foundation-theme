<article>
	<?php the_post_thumbnail();?>

	<div class="panel">
	  <h5><?php the_title();?></h5>
	  <?php if ( $precio = get_field('precio')) : ?>
	  	<h6 class="subheader"><?php echo $precio ?>€</h6>
	  <?php endif; ?>
	  
	</div>
</article>
