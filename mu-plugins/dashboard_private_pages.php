<?php
/*
Plugin Name: Add Private Pages to Dashboard
Plugin URI: http://danielwiener.com/
Description: Description
Version: 0.1
Author: Daniel Wiener
Author URI: http://danielwiener.com/ 
*/

/**
 * Copyright (c) 2011 Daniel Wiener. All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * **********************************************************************
 */
 
// function to display widget 
// from http://erisds.co.uk/wordpress/snippet-wordpress-admin-tidy-dashboard-widgets-by-role

function display_dashboard_widget()
{ 
	$widget_content =  '<h4>QuickStart Instructions</h4>';
	$widget_content .= '<ol>
	<li>Once signed into the Dashboard, navigate to <a href="/wp-admin/edit.php?post_type=exhibitions">Exhibitions</a>, <a href="/wp-admin/edit.php?post_type=faculty">Faculty</a>, <a href="/wp-admin/edit.php?post_type=electives">Electives</a>, <a href="/wp-admin/edit.php?post_type=featured_content">Featured Content</a> to add or modify content. <br>Add News and Events by using Posts. <br>Pages includes <a href="/wp-admin/post.php?post=29&action=edit">Contact</a>, e101 Prize, Students, Mission and Curriculum and other miscellaneous pages.</li>
	<li>Click the help tab at the upper right in each section of the Wordpress Admin for specific instructions.</li>
	<li>To edit the introductory text on front page go to <a href="/wp-admin/widgets.php">Appearance->Widgets</a> and edit the text in the widget called "Front Page Introduction". If the widget is closed, click the triangle to open it for editing. When you click "Save" it will automatically update.</li>
	<li>SoundCloud options are set for the user "risd-liberal-arts". All sound files for "risd-liberal-arts" will be available for the site if they are uploaded to SoundCloud. SoundCloud files can be inserted by clicking the "Add Media" button and then click "SoundCloud is Gold". On most front end pages a randomly chosen SoundCloud track from the site will be displayed in the right hand sidebar. <a href="http://wordpress.org/extend/plugins/soundcloud-is-gold/">Click for more information.</a></li>
	</ol>'; 
	$widget_content .= '<hr />';
	$widget_content  .=  '<h4>Faculty Profiles</h4>';
	$widget_content .= '<ol>';
	$widget_content .= '<li>To change your faculty profile, click on "Faculty" in the left hand menu and then click on your name.</li>
						<li>Click the help tab at the upper right corner of your page in the Wordpress Admin for more specific instructions.</li>';
	$widget_content .= '</ol>';
	$widget_content .= '<hr />';
	echo $widget_content;


  //define arguments for WP_Query()
  $qargs = array(
    'post_type'=>'page',
    'post_status'=>'private'
  );
  // perform the query
  $q = new WP_Query();
  $q->query($qargs);
  // setup the content with a list
  $widget_content = '<ul>';
 
  // execute the WP loop
  while ($q->have_posts()) : $q->the_post();
    $widget_content .= '<li><a href="'.get_permalink() .'" rel="bookmark">'. get_the_title() .'</a></li>';
	// print_r(get_permalink());
  endwhile;
  
  $widget_content .= '</ul>';
 
  // return the content you want displayed
  // return $widget_content;  
	echo $widget_content;
}

//function to setup widget
function add_dashboard_widgets()
{
  // create a dashboard widget called "private_page_menu_dashboard_widget" with the title "Private Pages Menu" and call our display function to draw it
  wp_add_dashboard_widget('private_page_menu_dashboard_widget', 'RISD English Instructions', 'display_dashboard_widget' );
}

// finally we have to hook our function into the dashboard setup using add_action
add_action('wp_dashboard_setup', 'add_dashboard_widgets');