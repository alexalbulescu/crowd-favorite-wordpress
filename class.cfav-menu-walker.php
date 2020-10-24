<?php

/**
 * Walker for custom menus that excludes adding links for "#" urls set on menu custom links.
 */
class CFav_Menu_Walker extends Walker_Nav_Menu {

    function start_el(&$output, $item, $depth=0, $args=null, $id=0) { 
        $object = $item->object;
    	$type = $item->type;
    	$title = $item->title;
    	$description = $item->description;
        $permalink = $item->url;
        
        $output .= "<li class='" .  implode(" ", $item->classes) . "'>";
        
        //Add SPAN if no Permalink
        if( $permalink && $permalink != '#' ) {
            $output .= '<a href="' . $permalink . '">';
        } else {
            $output .= '<span>';
        }

        $output .= $title;

        if( $description != '' && $depth == 0 ) {
            $output .= '<small class="description">' . $description . '</small>';
        }

        if( $permalink && $permalink != '#' ) {
            $output .= '</a>';
        } else {
            $output .= '</span>';
        }
       
    }

}