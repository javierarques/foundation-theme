    <!-- Footer -->

    <footer>
        <div class="row">
            <?php get_sidebar('footer'); ?>
        </div>
        <div class="row">
          <div class="large-6 columns">
              <p><a href="<?php bloginfo('site_url')?>"><?php bloginfo('name'); ?></a> 
                 © Copyright <?php echo date("Y"); ?>
              </p>
          </div>

          <div class="large-6 columns">

            <?php wp_nav_menu( array(
                'theme_location' => 'footer',
                'container' => 'nav',
                'menu_class' => 'inline-list right'
            ))?>
          </div>
        </div>
    </footer><!-- End Footer -->
    
  </div>
</div>


    <script src="<?php echo get_template_directory_uri()?>/js/vendor/jquery.js"></script>
    <script src="<?php echo get_template_directory_uri()?>/js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
    
    <?php wp_footer(); ?>
  </body>
</html>