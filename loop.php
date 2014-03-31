<article <?php post_class()?>>

    <h3><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h3>
    <h6><?php _e('Escrito por', 'foundation')?> <?php the_author_posts_link() ?> <?php the_date()?></h6>

    <?php the_content(); ?>
</article>

<hr />