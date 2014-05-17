<?php

// Destacados de la home

$destacados = new WP_Query( array('category_name' => 'post-formats', 'posts_per_page' => 3));
        
if ( $destacados->have_posts()) {
  echo '<div class="row">';
  while ( $destacados->have_posts()){
    $destacados->the_post();
    ?>
    <div class="large-4 columns">
      <?php the_post_thumbnail(); ?>
      <h4><?php the_title( );?></h4>
      <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. Eiusmod swine spare ribs reprehenderit culpa. Boudin aliqua adipisicing rump corned beef.</p>
    </div>

    <?php

  }
  echo "</div>";

}


?>