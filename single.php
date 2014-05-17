<?php 
/*
 * Post template
 */

get_header() ?>
<div class="row">
	<div class="column large-12">
	<?php
		if ( have_posts()) {
			while (have_posts()) {
				the_post();
				
				?>
			<article <?php post_class()?>>
				<header>
			    	<h1><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h1>
			    	<p><?php _e('Escrito por', 'foundation')?> <?php the_author_posts_link() ?> <?php the_date()?>, <?php _e('en la categoría', 'foundation')?>: <?php the_category(', ');?></p>
				</header>

			    <?php the_content(); ?>

				<?php the_tags( '<footer class="tags">Etiquetas: ', ', ', '</footer>' );?>

				<?php the_meta(); ?>
			</article>

			<hr />

			<?php comments_template();?>

			<?php
			}
		}
	?>
	</div>
</div>

<?php get_footer();?>