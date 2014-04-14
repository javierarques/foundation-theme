<?php
/*
 * Template name: Blog
 */
get_header();

?>

<!-- Nav Bar -->

  <div class="row">
    <div class="large-12 columns">
      <?php if ( is_category()) :?>
        <h1><?php single_cat_title();?> <small><?php _e('Entradas en la categoría', 'foundation')?></small></h1>
        <?php
          // Show an optional term description.
          $term_description = term_description();
          if ( ! empty( $term_description ) ) :
            printf( '<div class="taxonomy-description">%s</div>', $term_description );
          endif;
        ?>
      <?php elseif( is_tag()) : ?>
        <h1><?php single_tag_title();?> <small><?php _e('Entradas en la etiqueta', 'foundation')?></small></h1>
        <?php
          // Show an optional term description.
          $term_description = term_description();
          if ( ! empty( $term_description ) ) :
            printf( '<div class="taxonomy-description">%s</div>', $term_description );
          endif;
        ?>

      <?php elseif( is_author()) : ?>

        <h1>
          <?php
            /*
             * Queue the first post, that way we know what author
             * we're dealing with (if that is the case).
             *
             * We reset this later so we can run the loop properly
             * with a call to rewind_posts().
             */
            the_post();

            printf( __( '%s <small>entradas del autor</small>', 'foundation' ), get_the_author() );
          ?>
        </h1>
        <?php if ( get_the_author_meta( 'description' ) ) : ?>
        <div class="author-description"><?php the_author_meta( 'description' ); ?></div>
        <?php endif; ?>        

      <?php else : ?>
        <h1>Blog <small>This is my blog. It's awesome.</small></h1>
      <?php endif;?>

      
      <hr />
    </div>
  </div>

  <!-- End Nav -->


  <!-- Main Page Content and Sidebar -->

  <div class="row">

    <!-- Main Blog Content -->
    <div class="large-9 columns" role="content">
        
        <?php 
            /*
             * The Loop
             */
            if (have_posts()){
                
                // Loop
                while ( have_posts()) {
                    the_post();
                    get_template_part('loop');
                }
                
                // Navigation
                foundation_nav();
                
            } else { 
                // Nothing found
                get_template_part('empty');
            }
            
         
            
            ?>

    </div>

    <!-- End Main Content -->

    <!-- Sidebar -->
    <aside class="large-3 columns">
        <?php get_sidebar(); ?>
    </aside>
    <!-- End Sidebar -->


  </div>

  <!-- End Main Content and Sidebar -->


<?php  get_footer(); ?>