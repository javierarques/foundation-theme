<?php
  /*
  Template name: Store
  */
  get_header();
?>

<div class="row">
  <div class="large-12 columns">
    <h1>Store template</h1>
    <hr>
  </div>
</div>

<div class="row">
  <div class="large-12 columns">


    <div class="row">
      <!-- Side Bar -->

      <div class="large-4 small-12 columns">
        <div class="panel">
          <h4>Familias</h4>
          <ul class="side-nav">
            <?php wp_list_categories(array('taxonomy' => 'familia', 'title_li' => ''));?>  
          </ul>
          
          <h4>Marcas</h4>
          <ul class="side-nav">
            <?php wp_list_categories(array('taxonomy' => 'marca', 'title_li' => ''));?>  
          </ul>
          
        </div>

      </div><!-- End Side Bar -->
      <!-- Thumbnails -->

      <div class="large-8 columns">

        <ul class="small-block-grid-2 large-block-grid-3">
        <?php 
            /*
             * The Loop
             */

            if (have_posts()){
                
                // Loop
                while ( have_posts()) {
                    the_post();
                    echo '<li>';
                    get_template_part('loop', 'producto');
                    echo '</li>';
                }
                
                // Navigation
                foundation_nav();
                
            } else { 
                // Nothing found
                get_template_part('empty');
            }
            
            ?>
        </ul>

        </div>
      </div>
    </div>

<?php get_footer();?>
