<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="<?php bloginfo('charset');?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php wp_title(); ?></title>
    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/foundation.css" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri() ?>"/>
    <script src="<?php echo get_template_directory_uri() ?>/js/vendor/modernizr.js"></script>
    
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" type="image/x-icon">
    
    <?php wp_head(); ?>
  </head>
  <body <?php body_class();?>>     

      
    <header id="header">
        <div class="row">
            <!-- Navigation -->
            <nav class="top-bar" data-topbar>
                <ul class="title-area">
                    <li class="name">
                        <h1><a href="<?php echo site_url()?>"><?php bloginfo('name')?></a></h1>
                    </li>
                    <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
                </ul>

                <section class="top-bar-section">
                
                <?php wp_nav_menu( array(
                    'theme_location' => 'main',
                    'container' => false,
                    'menu_class' =>  'right',
                    'walker' => new top_bar_walker()                   
                    )); ?>
                
                </section>

            </nav><!-- End Top Bar -->
            <!-- End Navigation -->  
        </div>
    </header>      
