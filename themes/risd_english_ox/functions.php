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
	
/**
 * Taxonomy FOR Faculty
 * Faculty Category
 */	
	 $labels = array(
    'name' => _x( 'Faculty Category', 'taxonomy general name' ),
    'singular_name' => _x( 'Faculty Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Faculty Categories' ),
    'popular_items' => __( 'Popular Faculty Categories' ),
    'all_items' => __( 'All Faculty Categories' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Faculty Category' ), 
    'update_item' => __( 'Update Faculty Category' ),
    'add_new_item' => __( 'Add Faculty Category' ),
    'new_item_name' => __( 'New Faculty Category' ),
  ); 

	register_taxonomy(
	'faculty_category',
	'faculty',
		array( 'hierarchical' => true,
		'labels' => $labels,
		'query_var' => true,
		'show_ui' => true,
		'public' => true,
		'show_in_nav_menus' => true,
		'rewrite' => array( 'slug' => 'faculty_category',
							'with_front' => false,
							'hierarchical' => 'true',
							) ) );
								
								
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
		'map_meta_cap' => true,
		'capability_type' => 'faculty',
		// 'capabilities' => array(
		// 			'edit_post'		 			=> "edit_faculty",
		// 			'read_post'		 			=> "read_faculty",
		// 			'delete_post'		 		=> "delete_faculty",
		// 			'edit_posts'		 		=> "edit_facultys",
		// 			'edit_others_posts'	 		=> "edit_others_facultys",
		// 			'publish_posts'		 		=> "publish_facultys",
		// 			'read_private_posts'	 	=> "read_private_facultys",
		// 			'delete_posts'           	=> "delete_facultys",
		// 			'delete_private_posts'   	=> "delete_private_facultys",
		// 			'delete_published_posts' 	=> "delete_published_facultys",
		// 			'delete_others_posts'    	=> "delete_others_facultys",
		// 			'edit_private_posts'    	=> "edit_private_facultys",
		// 			'edit_published_posts'   	=> "edit_published_facultys",
		// 		),
	   //'capability_type' => 'post',
	   'taxonomies' => array( 'faculty_category'),
	   'hierarchical' => false,
	   'can_export' => true,
	   'menu_position' => 5,
	   'show_in_nav_menus' => true,
		'has_archive' => true,
	   'rewrite' => true,
	   'supports' => array('title','editor','revisions', 'thumbnail', 'excerpt', 'author')
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
	
    /* BEGIN Featured Content Post Type*/ 
	$labels = array(
	   'name' => _x('Featured Content', 'post type general name'),
	   'singular_name' => _x('Featured Content', 'post type singular name'),
	   'add_new' => _x('Add New', 'featured_content'),
	   'add_new_item' => __('Add New Featured Content'),
	   'edit_item' => __('Edit Featured Content'),
	   'edit' => _x('Edit', 'featured_content'),
	   'new_item' => __('New Featured Content'),
	   'view_item' => __('View Featured Content'),
	   'search_items' => __('Search Featured Content'),
	   'not_found' =>  __('No Featured Content found'),
	   'not_found_in_trash' => __('No Featured Content found in Trash'), 
	   'view' =>  __('View Featured Content'),
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
	 register_post_type('featured_content',$args);
// 	include('r-debug.php');
// 	$dw_debug = New R_Debug;	
// $dw_debug->list_performance(true);
      	add_image_size('portrait', 175, '', false);
	  	add_image_size('portrait-thumbnail', 75, 90, true);
		add_image_size('faculty-portrait', 158, 158, true);
		
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

// ====================================================================================================================================
// = Short Title function - http://wordpress.org/support/topic/how-to-control-the-post-title-lengh - short_title('&hellip', 30) (etc) =
// ====================================================================================================================================
function short_title($after = '', $length) {
	$mytitle = get_the_title();
	if ( strlen($mytitle) > $length ) {
	$mytitle = substr($mytitle,0,$length);
	echo $mytitle . $after;
	} else {
	echo $mytitle;
	}
}

function my_plugin_help($contextual_help, $screen_id, $screen) {

	global $my_plugin_hook;
	if ($screen_id == "faculty" || $screen_id == "edit-faculty") {

		$contextual_help = file_get_contents('lib/documentation/faculty_help.php', true);
		$faculty_profile_help = file_get_contents('lib/documentation/faculty_profile_help.php', true);
	 
	 // print_r($screen_id);
   
	$screen->add_help_tab( array(
	        'id'	=> 'more_help',
	        'title'	=> __('Faculty Help'),
	        'content'	=> $contextual_help,
	    ) );
	
	$screen->add_help_tab( array(
	        'id'	=> 'my_help_tab',
	        'title'	=> __('Faculty Profile Help'),
	        'content'	=> $faculty_profile_help,
	    ) );
	

 // return $contextual_help; 
	    // $screen->set_help_sidebar(
	    //                           __('This is the content you will be adding to the sidebar for the current page. You must make sure other tabs have already been added using the "add_help_tab" function above. This sidebar will not show up unless there are tabs for the current screen')
	    //                          );
}

if ($screen_id == "page" || $screen_id == "edit-page") {

	$page_hierarchy = file_get_contents('lib/documentation/page_hierarchy.php', true);
	//$faculty_profile_help = file_get_contents('lib/documentation/faculty_profile_help.php', true);
 
 // print_r($screen_id);


$screen->add_help_tab( array(
        'id'	=> 'page_hierarchy',
        'title'	=> __('LAS Pages Help'),
        'content'	=> $page_hierarchy,
    ) );

// $screen->add_help_tab( array(
//         'id'	=> 'more_help',
//         'title'	=> __('Faculty Help'),
//         'content'	=> $contextual_help,
//     ) );

}

if ($screen_id == "electives" || $screen_id == "edit-electives") {

	$elective_help = file_get_contents('lib/documentation/elective_help.php', true);
	//$faculty_profile_help = file_get_contents('lib/documentation/faculty_profile_help.php', true);
 
 // print_r($screen_id);


$screen->add_help_tab( array(
        'id'	=> 'electives_help',
        'title'	=> __('Elective Help'),
        'content'	=> $elective_help,
    ) );

// $screen->add_help_tab( array(
//         'id'	=> 'more_help',
//         'title'	=> __('Faculty Help'),
//         'content'	=> $contextual_help,
//     ) );

}

if ($screen_id == "exhibitions" || $screen_id == "edit-exhibitions") {

	$exhibition_help = file_get_contents('lib/documentation/exhibition_help.php', true);
	//$faculty_profile_help = file_get_contents('lib/documentation/faculty_profile_help.php', true);
 
 // print_r($screen_id);


$screen->add_help_tab( array(
        'id'	=> 'exhibitions_help',
        'title'	=> __('Exhibitions Help'),
        'content'	=> $exhibition_help,
    ) );

// $screen->add_help_tab( array(
//         'id'	=> 'more_help',
//         'title'	=> __('Faculty Help'),
//         'content'	=> $contextual_help,
//     ) );

}

if ($screen_id == "featured_content" || $screen_id == "edit-featured_content") {

	$featured_content_help = file_get_contents('lib/documentation/featured_content_help.php', true);
	//$faculty_profile_help = file_get_contents('lib/documentation/faculty_profile_help.php', true);
 
 // print_r($screen_id);


$screen->add_help_tab( array(
        'id'	=> 'featured_content_help',
        'title'	=> __('Featured Content Help'),
        'content'	=> $featured_content_help,
    ) );

// $screen->add_help_tab( array(
//         'id'	=> 'more_help',
//         'title'	=> __('Faculty Help'),
//         'content'	=> $contextual_help,
//     ) );

}

if ($screen_id == "post" || $screen_id == "edit-post") {

	$las_news_help = file_get_contents('lib/documentation/las_news_help.php', true);
	//$faculty_profile_help = file_get_contents('lib/documentation/faculty_profile_help.php', true);
 
 // print_r($screen_id);


$screen->add_help_tab( array(
        'id'	=> 'las_news_help',
        'title'	=> __('LAS News and Events'),
        'content'	=> $las_news_help,
    ) );

// $screen->add_help_tab( array(
//         'id'	=> 'more_help',
//         'title'	=> __('Faculty Help'),
//         'content'	=> $contextual_help,
//     ) );

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
	add_meta_box( 'oxygen_metabox', __( 'Location', 'oxygen' ), 'oxygen_metabox', 'featured_content', 'side', 'low' );
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
	
	$dw_meta_boxes[] = array(
		'id'         => 'courses_info',
		'title'      => 'Courses Info',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
	   	'show_on' => array( 'key' => 'page-template', 'value' => array( 'courses-feed.php' ) ), //only shows on courses pages
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'ENGL 101 for Fall Semsester',
				'desc' => 'Add or modify text for the Eng-101 classes for the Fall Semsester',
				'id'   => $prefix . 'eng-101-fall',
				'type' => 'wysiwyg',
			),  
			array(
				'name' => 'ENGL 101 for Spring Semsester',
				'desc' => 'Add or modify text for the Eng-101 classes for the Spring Semsester ',
				'id'   => $prefix . 'eng-101-spring',
				'type' => 'wysiwyg',
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

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override tdw_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since RISD English 1.0
 * @uses register_sidebar
 */
function dw_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Exhibitions Summary'),
		'id' => 'exhibitions_summary',
		'description' => __( 'Add text for the summary of exhibitions. View it here -> http://risd-english.com/!/exhibitions' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
	
	register_sidebar( array(
		'name' => __( 'Front Page Introduction'),
		'id' => 'front_page_introduction',
		'description' => __( 'Add text for the introduction to LAS on the front page below the slide show. View it here -> http://risd-english.com/' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3><a href="/curriculum">',
		'after_title' => '</a></h3>',
	) );
}

add_action( 'widgets_init', 'dw_widgets_init' );

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

// Add custom taxonomies and custom post types counts to dashboard
add_action( 'right_now_content_table_end', 'my_add_counts_to_dashboard' );
function my_add_counts_to_dashboard() {
    // Custom taxonomies counts
    $taxonomies = get_taxonomies( array( '_builtin' => false ), 'objects' );
      foreach ( $taxonomies as $taxonomy ) {
          $num_terms  = wp_count_terms( $taxonomy->name );
          $num = number_format_i18n( $num_terms );
          $text = _n( $taxonomy->labels->singular_name, $taxonomy->labels->name, $num_terms );
          $associated_post_type = $taxonomy->object_type;
          if ( current_user_can( 'manage_categories' ) ) {
              $num = '<a href="edit-tags.php?taxonomy=' . $taxonomy->name . '&post_type=' . $associated_post_type[0] . '">' . $num . '</a>';
              $text = '<a href="edit-tags.php?taxonomy=' . $taxonomy->name . '&post_type=' . $associated_post_type[0] . '">' . $text . '</a>';
          }
          echo '<td class="first b b-' . $taxonomy->name . 's">' . $num . '</td>';
          echo '<td class="t ' . $taxonomy->name . 's">' . $text . '</td>';
          echo '</tr><tr>';
      }

    // Custom post types counts
    $post_types = get_post_types( array( '_builtin' => false ), 'objects' );
	$post_type_array = array('faculty', 'electives', 'exhibitions', 'featured_content' );
	ksort($post_types);
    foreach ( $post_types as $post_type ) {
		if ( in_array($post_type->name, $post_type_array)) {
	
        $num_posts = wp_count_posts( $post_type->name );
        $num = number_format_i18n( $num_posts->publish );
        $text = _n( $post_type->labels->singular_name, $post_type->labels->name, $num_posts->publish );
        if ( current_user_can( 'edit_posts' ) ) {
            $num = '<a href="edit.php?post_type=' . $post_type->name . '">' . $num . '</a>';
            $text = '<a href="edit.php?post_type=' . $post_type->name . '">' . $text . '</a>';
        }
        echo '<td class="first b b-' . $post_type->name . 's">' . $num . '</td>';
        echo '<td class="t ' . $post_type->name . 's">' . $text . '</td>';
        echo '</tr>';

        if ( $num_posts->pending > 0 ) {
            $num = number_format_i18n( $num_posts->pending );
            $text = _n( $post_type->labels->singular_name . ' pending', $post_type->labels->name . ' pending', $num_posts->pending );
            if ( current_user_can( 'edit_posts' ) ) {
                $num = '<a href="edit.php?post_status=pending&post_type=' . $post_type->name . '">' . $num . '</a>';
                $text = '<a href="edit.php?post_status=pending&post_type=' . $post_type->name . '">' . $text . '</a>';
            }
            echo '<td class="first b b-' . $post_type->name . 's">' . $num . '</td>';
            echo '<td class="t ' . $post_type->name . 's">' . $text . '</td>';
            echo '</tr>';
        }
    }
}	
}