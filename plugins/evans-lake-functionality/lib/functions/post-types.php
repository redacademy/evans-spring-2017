<?php
/**
 * POST TYPES
 *
 * @link  http://codex.wordpress.org/Function_Reference/register_post_type
 */

// Register Custom Post Type
function register_staff_member_post_type() {
$name = 'Staff Member';
$name_low_case = 'staff member';
$name_plural = 'Staff Members';
$name_plural_low_case = 'staff members';
	$labels = array(
		'name'                  => $name_plural,
		'singular_name'         => $name,
		'menu_name'             => $name_plural,
		'name_admin_bar'        => $name_plural,
		'archives'              => $name . ' Archives',
		'attributes'            => $name . ' Attributes',
		'parent_item_colon'     => 'Parent ' . $name . ':',
		'all_items'             => 'All ' . $name_plural,
	  'add_new_item'          => 'Add New '. $name,
		'add_new'               => 'Add '. $name,
		'new_item'              => 'New '. $name,
		'edit_item'             => 'Edit '. $name,
		'update_item'           => 'Update '. $name,
		'view_item'             => 'View '. $name,
		'view_items'            => 'View ' . $name_plural,
		'search_items'          => 'Search '. $name,
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into ' . $name_low_case,
		'uploaded_to_this_item' => 'Uploaded to this '. $name_low_case,
		'items_list'            => $name_plural . ' list',
		'items_list_navigation' => $name_plural . ' list navigation',
		'filter_items_list'     => 'Filter ' . $name_plural_low_case . ' list',
	);
	$args = array(
		'label'                 => $name,
		'description'           => $name_plural . ' are staff at Evans Lake.',
		'labels'                => $labels,
		'supports'              => array( 'title', 'revisions' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-networking',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( $name_low_case, $args );
}
add_action( 'init', 'register_staff_member_post_type', 0 );