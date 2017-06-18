<?php
/**
 * TAXONOMIES
 *
 * @link  http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

// Add your custom taxonomies here...
// Register Custom Taxonomy
function register_staff_type_taxonomy() {
  $name_up_plur = 'Staff Types';
  $name_up_sing = 'Staff Type';
  $name_low_plur = 'staff types';
  $name_low_sing = 'staff type';
  $name_low_reg = 'stafftype';
	$name_custom_post_type = 'staffmember';

	$labels = array(
		'name'                       => $name_up_plur,
		'singular_name'              => $name_up_sing,
		'menu_name'                  => $name_up_sing,
		'all_items'                  => 'All ' . $name_up_plur,
		'parent_item'                => 'Parent ' . $name_up_sing,
		'parent_item_colon'          => 'Parent ' . $name_up_sing . ':',
		'new_item_name'              => 'New ' . $name_up_sing . 'Type Name',
		'add_new_item'               => 'Add New ' . $name_up_sing,
		'edit_item'                  => 'Edit ' . $name_up_sing,
		'update_item'                => 'Update ' . $name_up_sing,
		'view_item'                  => 'View ' . $name_up_sing,
		'separate_items_with_commas' => 'Separate ' . $name_low_plur . ' with commas',
		'add_or_remove_items'        => 'Add or remove ' . $name_low_plur,
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular ' . $name_up_plur,
		'search_items'               => 'Search '. $name_up_plur,
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No ' . $name_low_plur,
		'items_list'                 => $name_up_plur . 'list',
		'items_list_navigation'      => $name_up_plur . 'list navigation',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( $name_low_reg, array( $name_custom_post_type ), $args );
}
add_action( 'init', 'register_staff_type_taxonomy', 0 );

function register_activity_type_taxonomy() {
  $name_up_plur = 'Activity Types';
  $name_up_sing = 'Activity Type';
  $name_low_plur = 'activity types';
  $name_low_sing = 'activity type';
  $name_low_reg = 'activitytype';
	$name_custom_post_type = 'activity';


	$labels = array(
		'name'                       => $name_up_plur,
		'singular_name'              => $name_up_sing,
		'menu_name'                  => $name_up_sing,
		'all_items'                  => 'All ' . $name_up_plur,
		'parent_item'                => 'Parent ' . $name_up_sing,
		'parent_item_colon'          => 'Parent ' . $name_up_sing . ':',
		'new_item_name'              => 'New ' . $name_up_sing . 'Type Name',
		'add_new_item'               => 'Add New ' . $name_up_sing,
		'edit_item'                  => 'Edit ' . $name_up_sing,
		'update_item'                => 'Update ' . $name_up_sing,
		'view_item'                  => 'View ' . $name_up_sing,
		'separate_items_with_commas' => 'Separate ' . $name_low_plur . ' with commas',
		'add_or_remove_items'        => 'Add or remove ' . $name_low_plur,
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular ' . $name_up_plur,
		'search_items'               => 'Search '. $name_up_plur,
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No ' . $name_low_plur,
		'items_list'                 => $name_up_plur . 'list',
		'items_list_navigation'      => $name_up_plur . 'list navigation',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( $name_low_reg, array( $name_custom_post_type ), $args );

}
add_action( 'init', 'register_activity_type_taxonomy', 0 );