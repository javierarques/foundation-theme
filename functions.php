<?php

add_theme_support('menus');
add_theme_support( 'post-thumbnails' );


/**
 *  Tamaños personalizados
 *
 */

add_image_size( 'slider', 970, 390, true);

register_nav_menus( array(
    'main' => 'Menú principal',
    'footer' => 'Menú del footer'
));

the_title();

/**
 * Customize the output of menus for Foundation top bar
 */

class top_bar_walker extends Walker_Nav_Menu {

    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        $element->has_children = !empty( $children_elements[$element->ID] );
        $element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';
        $element->classes[] = ( $element->has_children ) ? 'has-dropdown' : '';
        
        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
    
    function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
        $item_html = '';
        parent::start_el( $item_html, $object, $depth, $args ); 
        
        $output .= ( $depth == 0 ) ? '<li class="divider"></li>' : '';
        
        $classes = empty( $object->classes ) ? array() : (array) $object->classes;  
        
        if( in_array('label', $classes) ) {
            $output .= '<li class="divider"></li>';
            $item_html = preg_replace( '/<a[^>]*>(.*)<\/a>/iU', '<label>$1</label>', $item_html );
        }
        
    if ( in_array('divider', $classes) ) {
        $item_html = preg_replace( '/<a[^>]*>( .* )<\/a>/iU', '', $item_html );
    }
        
        $output .= $item_html;
    }
    
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= "\n<ul class=\"sub-menu dropdown\">\n";
    }
    
}
/*
 *  Navegación entre los posts
 */
function foundation_nav() {
    ?>
    <nav>
        <ul class="inline-list">
            <li class="left"><?php previous_posts_link(__('Anteriores', 'foundation')); ?></li>
            <li class="right"><?php next_posts_link( __('Siguientes', 'foundation')); ?></li>
        </ul> 
    </nav>
    <?php    
}

/*
 *  Sidebars
 */


// Sidebar columna derecha del blog
register_sidebar (
    array(
    'name'          => __('Sidebar blog', 'foundation' ),
    'id'            => 'sidebar-blog',
    'description'   => __('Sidebar de la columna derecha del blog', 'foundation'),
    'class'         => '',
    'before_widget' => '<div id="%1$s" class="widget panel %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>' )
);

// Sidebar columna derecha del blog
register_sidebar (
    array(
    'name'          => __('Sidebar footer', 'foundation' ),
    'id'            => 'sidebar-footer',
    'description'   => __('Sidebar del footer de la página', 'foundation'),
    'class'         => '',
    'before_widget' => '<div id="%1$s" class="widget large-4 columns %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>' )
);


/**
 * Tipos de posts
 **/

function my_custom_post_types() {

    // Sliders
    $args = array(
        'public' => false,
        'label'  => 'Sliders',
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'supports' => array('title','thumbnail', 'custom-fields')
    );
    register_post_type( 'slider', $args );

    // Productos
    $args = array(
        'public' => true,
        'label'  => 'Productos',
        'has_archive' => 'productos',
        'supports' => array('title','thumbnail', 'custom-fields')
    );
    register_post_type( 'producto', $args );


    // Taxonomías personalizadas

    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Familias', 'taxonomy general name' ),
        'singular_name'     => _x( 'Familia', 'taxonomy singular name' ),
        'search_items'      => __( 'Buscar Familias' ),
        'all_items'         => __( 'Todas las familias' ),
        'parent_item'       => __( 'Padre' ),
        'parent_item_colon' => __( 'Padre:' ),
        'edit_item'         => __( 'Editar familia' ),
        'update_item'       => __( 'Actualizar familia' ),
        'add_new_item'      => __( 'Añadir nueva familia' ),
        'new_item_name'     => __( 'Nueva familia' ),
        'menu_name'         => __( 'Familias' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'familia' ),
    );

    register_taxonomy( 'familia', array( 'producto' ), $args );    

    register_taxonomy( 'marca', array( 'producto' ), array('hiearchical' => true, 'label' => 'Marcas'));


}
add_action( 'init', 'my_custom_post_types' );



// Add the filter
add_filter( 'template_include', 'my_custom_template');
 
/**
 * Returns customized templates for custom taxonomies
 *
 * @param string $template
 * @return string
 */
function my_custom_template ( $template ) {
    

    if ( is_tax('familia') || is_tax('marca') ){

            $template =  TEMPLATEPATH . '/archive-producto.php';
    } 
    
    return $template;
}


/**
 * Theme styles and scripts
 */
function theme_name_scripts() {


    wp_enqueue_style( 'styles', get_stylesheet_uri());
    wp_enqueue_style( 'foundation', get_template_directory_uri() . '/css/foundation.css');
    
    if ( is_page('portfolio')) {
        wp_enqueue_style( 'galeria', get_template_directory_uri() . '/css/galeria.css');    
    }

}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );













