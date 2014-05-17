<?php 
/*
  Template name: Home;
*/

get_header();

?>
  <div class="row">
    <div class="large-12 columns">
      <h1>Orbit template</h1>
    </div>
  </div>

<!-- First Band (Slider) -->

  <?php get_template_part('slider'); ?>

<hr/>

 

<?php get_template_part('news');?>
    
<!-- Call to Action Panel -->
<div class="row">
    <div class="large-12 columns">
    
      <div class="panel">
        <h4>Get in touch!</h4>
            
        <div class="row">
          <div class="large-9 columns">
            <p>We'd love to hear from you, you attractive person you.</p>
          </div>
          <div class="large-3 columns">
            <a href="#" class="radius button right">Contact Us</a>
          </div>
        </div>
      </div>
      
    </div>
  </div>

<?php get_footer(); ?>