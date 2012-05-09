<?php
/**
 * @package RISD English (Hybrid and Oxygen)
 * @subpackage Functions
 * @version 0.2.2
 * @author Daniel Wiener
 * @link http://devpress.com
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 */

add_theme_support( 'theme-layouts', array( '2c-l', '2c-r' ) );   //deal with this later, if necessary OR DELETE! 

add_action('init', 'dw_custom_init');
function dw_custom_init() 
{  
   /* BEGIN Exhibition Post Type*/ 
  $labels = array(
    'name' => _x('Exhibitions', 'post type general name'),
    'singular_name' => _x('Exhibition', 'post type singular name'),
    'add_new' => _x('Add New', 'exhibitions'),
    'add_new_item' => __('Add New Exhibition'),
    'edit_item' => __('Edit Exhibition'),
    'edit' => _x('Edit', 'exhibitions'),
    'new_item' => __('New Exhibition'),
    'view_item' => __('View Exhibition'),
    'search_items' => __('Search Exhibitions'),
    'not_found' =>  __('No Exhibitions found'),
    'not_found_in_trash' => __('No Exhibitions found in Trash'), 
    'view' =>  __('View Exhibition'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'query_var' => true, 
    'capability_type' => 'post',
   /* 'taxonomies' => array( 'post_tag', 'category'), */
    'hierarchical' => false,
    'can_export' => true,
    'menu_position' => 5,
    'show_in_nav_menus' => true,
	'has_archive' => true,
    'rewrite' => true,
    'supports' => array('title','editor','thumbnail','excerpt','comments','revisions')
  ); 
  register_post_type('exhibitions',$args);

    /* BEGIN Faculty Post Type*/ 
	$labels = array(
	   'name' => _x('Faculty', 'post type general name'),
	   'singular_name' => _x('Faculty', 'post type singular name'),
	   'add_new' => _x('Add New', 'faculty'),
	   'add_new_item' => __('Add New Faculty'),
	   'edit_item' => __('Edit Faculty'),
	   'edit' => _x('Edit', 'faculty'),
	   'new_item' => __('New Faculty'),
	   'view_item' => __('View Faculty'),
	   'search_items' => __('Search Faculty'),
	   'not_found' =>  __('No Faculty found'),
	   'not_found_in_trash' => __('No Faculty found in Trash'), 
	   'view' =>  __('View Faculty'),
	   'parent_item_colon' => ''
	 );
	 $args = array(
	   'labels' => $labels,
	   'public' => true,
	   'publicly_queryable' => true,
	   'show_ui' => true, 
	   'query_var' => true, 
	   'capability_type' => 'post',
	  /* 'taxonomies' => array( 'post_tag', 'category'), */
	   'hierarchical' => false,
	   'can_export' => true,
	   'menu_position' => 5,
	   'show_in_nav_menus' => true,
		'has_archive' => true,
	   'rewrite' => true,
	   'supports' => array('title','editor','revisions')
	 ); 
	 register_post_type('faculty',$args);


}

/* End Aside Post Type*/