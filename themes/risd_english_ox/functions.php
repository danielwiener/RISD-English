<?php
/**
 * @package RISD English (Hybrid and Oxygen)
 * @subpackage Functions
 * @version 0.2.2
 * @author Daniel Wiener
 * @link http://devpress.com
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 */

// add_theme_support( 'theme-layouts', array( '2c-l', '2c-r' ) );   //deal with this later, if necessary OR DELETE! 


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
    'supports' => array('title','editor','thumbnail','excerpt','comments','revisions', 'custom-fields')
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
	   'supports' => array('title','editor','revisions', 'thumbnail', 'excerpt')
	 ); 
	 register_post_type('faculty',$args);  
	
    /* BEGIN Electives Post Type*/ 
	$labels = array(
	   'name' => _x('Electives', 'post type general name'),
	   'singular_name' => _x('Elective', 'post type singular name'),
	   'add_new' => _x('Add New', 'electives'),
	   'add_new_item' => __('Add New Elective'),
	   'edit_item' => __('Edit Elective'),
	   'edit' => _x('Edit', 'electives'),
	   'new_item' => __('New Elective'),
	   'view_item' => __('View Elective'),
	   'search_items' => __('Search Electives'),
	   'not_found' =>  __('No Electives found'),
	   'not_found_in_trash' => __('No Electives found in Trash'), 
	   'view' =>  __('View Elective'),
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
	   'supports' => array('title','editor','revisions', 'excerpt', 'thumbnail')
	 ); 
	 register_post_type('electives',$args);
// 	include('r-debug.php');
// 	$dw_debug = New R_Debug;	
// $dw_debug->list_performance(true);
      	add_image_size('portrait', 175, '', false);
	  	add_image_size('portrait-thumbnail', 75, 90, true);
		add_image_size('faculty-portrait', 200, 200, true);
		
		/* Filter the sidebar widgets. */
			add_filter( 'sidebars_widgets', 'dw_disable_sidebars' );
}



/******************************************************************************
* @Author: Boutros AbiChedid
* @Date:   June 20, 2011
* @Websites: http://bacsoftwareconsulting.com/ ; http://blueoliveonline.com/
* @Description: Preserves HTML formating to the automatically generated Excerpt.
* Also Code modifies the default excerpt_length and excerpt_more filters.
* @Tested: Up to WordPress version 3.1.3
*******************************************************************************/
function custom_wp_trim_excerpt($text) {
$raw_excerpt = $text;
if ( '' == $text ) {
    //Retrieve the post content.
    $text = get_the_content('');
 
    //Delete all shortcode tags from the content.
    $text = strip_shortcodes( $text );
 
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
 
    $allowed_tags = '<p>,<strong>,<a>,<em>,<br>'; /*** MODIFY THIS. Add the allowed HTML tags separated by a comma.***/
    $text = strip_tags($text, $allowed_tags);
 
    $excerpt_word_count = 55; /*** MODIFY THIS. change the excerpt word count to any integer you like.***/
    $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count);
 
    $excerpt_end = '[...]'; /*** MODIFY THIS. change the excerpt endind to something else.***/
    $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);
 
    $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
    if ( count($words) > $excerpt_length ) {
        array_pop($words);
        $text = implode(' ', $words);
        $text = $text . $excerpt_more;
    } else {
        $text = implode(' ', $words);
    }
}
return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'custom_wp_trim_excerpt');


/**
 * Disables sidebars if viewing a XXX.
 *
 */
function dw_disable_sidebars( $sidebars_widgets ) {
	
	global $wp_query;
	$dw_template = '';
	//http://themehybrid.com/support/topic/how-to-filter-based-on-the-post-template
	// this is a pain in the neck. It would be easier to make different footers for different templates, if I keep needing to do this I will make different footers.

		if ( is_singular( 'post' ) ) {

			$post_id = $wp_query->get_queried_object_id();

			$dw_template = get_post_meta( $post_id, '_wp_post_template', true );

			}
	
	    if ( is_post_type_archive( 'faculty' )  || 'post-template-2c.php' == $dw_template || is_page_template('page-template-2c.php') ) {
		    $sidebars_widgets['primary'] = false;
			$sidebars_widgets['secondary'] = false;
	    }

	return $sidebars_widgets;
}


function my_plugin_help($contextual_help, $screen_id, $screen) {

	global $my_plugin_hook;
	if ($screen_id == "faculty" || $screen_id == "edit-faculty") {

		$contextual_help = file_get_contents('lib/documentation/faculty_help.php', true);
	 
	 // print_r($screen_id);
   
	
	$screen->add_help_tab( array(
	        'id'	=> 'my_help_tab',
	        'title'	=> __('My Help Tab'),
	        'content'	=> '<p>' . __( 'Descriptive content that will show in My Help Tab-body goes here.' ) . '</p>',
	    ) );
	
	$screen->add_help_tab( array(
	        'id'	=> 'more_help',
	        'title'	=> __('More Help'),
	        'content'	=> $contextual_help,
	    ) );
 // return $contextual_help; 
	    $screen->set_help_sidebar(
	                              __('This is the content you will be adding to the sidebar for the current page. You must make sure other tabs have already been added using the "add_help_tab" function above. This sidebar will not show up unless there are tabs for the current screen')
	                             );
}
}

add_filter('contextual_help', 'my_plugin_help', 10, 3);

/* End Post Types*/ 

/**
 * Metaboxes
 *
 */
add_action( 'add_meta_boxes', 'dw_create_metabox' );

function dw_create_metabox() {
    add_meta_box( 'oxygen_metabox', __( 'Location', 'oxygen' ), 'oxygen_metabox', 'electives', 'side', 'low' ); 
    add_meta_box( 'oxygen_metabox', __( 'Location', 'oxygen' ), 'oxygen_metabox', 'faculty', 'side', 'low' );
	add_meta_box( 'oxygen_metabox', __( 'Location', 'oxygen' ), 'oxygen_metabox', 'exhibitions', 'side', 'low' );
}

/**
 * Include and setup custom metaboxes and fields.
 *
 * @category RISD English 1.0
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'dw_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function dw_metaboxes( array $dw_meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_dw_';

	$dw_meta_boxes[] = array(
		'id'         => 'faculty_info',
		'title'      => 'Faculty Info',
		'pages'      => array( 'faculty', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
	   	// 'show_on' => array( 'key' => 'page-template', 'value' => array( 'page-feed.php', 'page-upcoming-exhibitions.php' ) ), //only shows on artwork pages, maybe figure out how to do parent page - Sculpture
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'First Name',
				'desc' => 'Please, add your first name. To order Faculty alphabetically by last name, enter your last name as the Title, above. Do not add your first name in the title.',
				'id'   => $prefix . 'first_name',
				'type' => 'text',
			),
			array(
				'name' => 'More Information',
				'desc' => 'Keeping this here, temporarily because I will need it',
				'id'   => $prefix . 'faculty_more_info',
				'type' => 'text',
			),  		
		),
	);
	
	$dw_meta_boxes[] = array(
		'id'         => 'optional_info',
		'title'      => 'Optional Info',
		'pages'      => array( 'post', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
	   	// 'show_on' => array( 'key' => 'page-template', 'value' => array( 'page-feed.php', 'page-upcoming-exhibitions.php' ) ), //only shows on artwork pages, maybe figure out how to do parent page - Sculpture
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'External Url',
				'desc' => 'If the News item has little text and points to an external URL, please add the url here. ON the News and Events table of contents page the featured image and title will then be linked to the external url, e.g. Red by Karen Carr. REQUIRED: Include http:// ',
				'id'   => $prefix . 'external_url',
				'type' => 'text',
			),  		
		),
	);


	// Add other metaboxes as needed

	return $dw_meta_boxes;
}    


add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'lib/metabox/init.php';

}
  
 add_shortcode( 'entry-updated', 'dw_entry_updated_shortcode' );

/**
 * Displays the updated date of an individual post. From the hybrid short code for published date
 *
 * @since 0.2.2
 * @access public
 * @param array $attr
 * @return string
 */
function dw_entry_updated_shortcode( $attr ) {
	$attr = shortcode_atts( array( 'before' => '', 'after' => '', 'format' => get_option( 'date_format' ) ), $attr );

	$published = '<abbr class="published" title="' . sprintf( get_the_modified_date( esc_attr__( 'l, F jS, Y', 'hybrid-core' ) ) ) . '">' . sprintf( get_the_modified_date( $attr['format'] ) ) . '</abbr>';
	return $attr['before'] . $published . $attr['after'];
}

// =====================================================================
// = another row of buttons for Visual Editor, add styles as necessary =
// =====================================================================

function add_more_buttons($buttons) {
 $buttons[] = 'hr';
 $buttons[] = 'del';
 $buttons[] = 'sub';
 $buttons[] = 'sup';
 $buttons[] = 'fontselect';
 $buttons[] = 'fontsizeselect';
 $buttons[] = 'cleanup';
 $buttons[] = 'styleselect';
 return $buttons;
}
add_filter("mce_buttons_3", "add_more_buttons");