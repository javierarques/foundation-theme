<?php

add_theme_support('menus');

register_nav_menus( array(
    'main' => 'Menú principal',
    'footer' => 'Menú del footer'
));

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