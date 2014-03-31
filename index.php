<?php
/*
 * Template name: Blog
 */
get_header();

?>

<!-- Nav Bar -->

  <div class="row">
    <div class="large-12 columns">
      <h1>Blog <small>This is my blog. It's awesome.</small></h1>
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

      <h5>Categories</h5>
      <ul class="side-nav">
        <li><a href="#">News</a></li>
        <li><a href="#">Code</a></li>
        <li><a href="#">Design</a></li>
        <li><a href="#">Fun</a></li>
        <li><a href="#">Weasels</a></li>
      </ul>

      <div class="panel">
        <h5>Featured</h5>
        <p>Pork drumstick turkey fugiat. Tri-tip elit turducken pork chop in. Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow.</p>
        <a href="#">Read More &rarr;</a>
      </div>

    </aside>

    <!-- End Sidebar -->
  </div>

  <!-- End Main Content and Sidebar -->


<?php  get_footer(); ?>