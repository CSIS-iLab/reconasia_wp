<?php
/**
 * Reconnecting Asia Custom CSS
 *
 * @package CSIS iLab
 * @subpackage @package ReconAsia
 * @since 1.0.0
 */

/**
 * Create custom taxonomy for "Series".
 *
 *
*/
function reconasia_tax_series() {

	$labels = array(
		'name'                       => _x( 'Series', 'Taxonomy General Name', 'reconasia' ),
		'singular_name'              => _x( 'Series', 'Taxonomy Singular Name', 'reconasia' ),
		'menu_name'                  => __( 'Series', 'reconasia' ),
		'all_items'                  => __( 'All Series', 'reconasia' ),
		'parent_item'                => __( 'Parent Series', 'reconasia' ),
		'parent_item_colon'          => __( 'Parent Series:', 'reconasia' ),
		'new_item_name'              => __( 'New Series Name', 'reconasia' ),
		'add_new_item'               => __( 'Add New Series', 'reconasia' ),
		'edit_item'                  => __( 'Edit Series', 'reconasia' ),
		'update_item'                => __( 'Update Series', 'reconasia' ),
		'view_item'                  => __( 'View Series', 'reconasia' ),
		'separate_items_with_commas' => __( 'Separate series with commas', 'reconasia' ),
		'add_or_remove_items'        => __( 'Add or remove series', 'reconasia' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'reconasia' ),
		'popular_items'              => __( 'Popular Series', 'reconasia' ),
		'search_items'               => __( 'Search Series', 'reconasia' ),
		'not_found'                  => __( 'Not Found', 'reconasia' ),
		'no_terms'                   => __( 'No series', 'reconasia' ),
		'items_list'                 => __( 'Series list', 'reconasia' ),
		'items_list_navigation'      => __( 'Series list navigation', 'reconasia' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'series', array( 'post' ), $args );

}
add_action( 'init', 'reconasia_tax_series', 0 );
