<?php
/* Template name: Contacto
 *
 */

get_header() ?>
<div class="row">
	<div class="column large-8">
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

			</article>

			<hr />


			<?php
			}
		}
	?>
	</div>
	<div class="large-4 column">
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3079.6236579207216!2d-0.37331300000000006!3d39.47783!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6048ad1c6e6aef%3A0x3f3bd8ce9722b1f3!2sESAT!5e0!3m2!1sen!2ses!4v1396899823374" width="100%" height="450" frameborder="0" style="border:0"></iframe>
	</div>
</div>

<?php get_footer();?>