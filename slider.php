<?php 
/*
 *    1 - query de los sliders
 *    2 - loop - the_post_thumbnail( ... )
 */

?> 

<div class="row">
  <div class="large-12 columns">
    <ul class="example-orbit" data-orbit>
    <?php

    $slider_query = new WP_Query( array('post_type' => 'slider'));


    if ( $slider_query->have_posts()) {
      while ( $slider_query->have_posts()) {
        $slider_query->the_post();
        $enlace_id = get_post_meta( get_the_ID(), 'slide_url', true);

        echo '<li><a href="'. get_permalink( $enlace_id ).'">'. get_the_post_thumbnail( get_the_ID(), 'slider').'</a></li>';
      }

    }

    ?>
    </ul>
  </div>
</div>
    