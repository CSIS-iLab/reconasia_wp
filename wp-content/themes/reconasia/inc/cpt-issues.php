<?php
/**
 * Reconnecting Asia Custom CSS
 *
 * @package CSIS iLab
 * @subpackage @package ReconAsia
 * @since 1.0.0
 */

/**
 * Create custom post type for "Issues".
 *
 *
*/
function reconasia_cpt_issues() {

	$labels = array(
		'name'                  => _x( 'Issues', 'Post Type General Name', 'reconasia' ),
		'singular_name'         => _x( 'Issue', 'Post Type Singular Name', 'reconasia' ),
		'menu_name'             => __( 'Issues', 'reconasia' ),
		'name_admin_bar'        => __( 'Issue', 'reconasia' ),
		'archives'              => __( 'Issues Archive', 'reconasia' ),
		'attributes'            => __( 'Issue Attributes', 'reconasia' ),
		'parent_item_colon'     => __( 'Parent Issue:', 'reconasia' ),
		'all_items'             => __( 'All Issues', 'reconasia' ),
		'add_new_item'          => __( 'Add New Issue', 'reconasia' ),
		'add_new'               => __( 'Add New', 'reconasia' ),
		'new_item'              => __( 'New Item', 'reconasia' ),
		'edit_item'             => __( 'Edit Item', 'reconasia' ),
		'update_item'           => __( 'Update Item', 'reconasia' ),
		'view_item'             => __( 'View Item', 'reconasia' ),
		'view_items'            => __( 'View Items', 'reconasia' ),
		'search_items'          => __( 'Search Item', 'reconasia' ),
		'not_found'             => __( 'Not found', 'reconasia' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'reconasia' ),
		'featured_image'        => __( 'Featured Image', 'reconasia' ),
		'set_featured_image'    => __( 'Set featured image', 'reconasia' ),
		'remove_featured_image' => __( 'Remove featured image', 'reconasia' ),
		'use_featured_image'    => __( 'Use as featured image', 'reconasia' ),
		'insert_into_item'      => __( 'Insert into issue', 'reconasia' ),
		'uploaded_to_this_item' => __( 'Uploaded to this issue', 'reconasia' ),
		'items_list'            => __( 'Issues list', 'reconasia' ),
		'items_list_navigation' => __( 'Issues list navigation', 'reconasia' ),
		'filter_items_list'     => __( 'Filter issues list', 'reconasia' ),
	);
	$args = array(
		'label'                 => __( 'Issue', 'reconasia' ),
		'description'           => __( 'Each post represents one issue in the Reconnecting Asiaazine.', 'reconasia' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-gallery',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'issues', $args );

}
add_action( 'init', 'reconasia_cpt_issues', 0 );
