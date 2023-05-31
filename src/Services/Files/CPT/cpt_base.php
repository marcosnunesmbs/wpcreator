<?php
function wpcreator___SINGULAR_NAME___init() {
	$labels = array(
		'name'                  => _x( '__PLURAL_NAME__', 'Post type general name', '__TEXTDOMAIN__' ),
		'singular_name'         => _x( '__SINGULAR_NAME__', 'Post type singular name', '__TEXTDOMAIN__' ),
		'menu_name'             => _x( '__MENU_NAME__', 'Admin Menu text', '__TEXTDOMAIN__' ),
		'name_admin_bar'        => _x( '__SINGULAR_NAME__', 'Add New on Toolbar', '__TEXTDOMAIN__' ),
		'add_new'               => __( 'Add New', '__TEXTDOMAIN__' ),
		'add_new_item'          => __( 'Add New __SINGULAR_NAME__', '__TEXTDOMAIN__' ),
		'new_item'              => __( 'New __SINGULAR_NAME__', '__TEXTDOMAIN__' ),
		'edit_item'             => __( 'Edit __SINGULAR_NAME__', '__TEXTDOMAIN__' ),
		'view_item'             => __( 'View __SINGULAR_NAME__', '__TEXTDOMAIN__' ),
		'all_items'             => __( 'All __PLURAL_NAME__', '__TEXTDOMAIN__' ),
		'search_items'          => __( 'Search __PLURAL_NAME__', '__TEXTDOMAIN__' ),
		'parent_item_colon'     => __( 'Parent __PLURAL_NAME__:', '__TEXTDOMAIN__' ),
		'not_found'             => __( 'No __PLURAL_NAME__ found.', '__TEXTDOMAIN__' ),
		'not_found_in_trash'    => __( 'No __PLURAL_NAME__ found in Trash.', '__TEXTDOMAIN__' ),
		'featured_image'        => _x( '__SINGULAR_NAME__ Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', '__TEXTDOMAIN__' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', '__TEXTDOMAIN__' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', '__TEXTDOMAIN__' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', '__TEXTDOMAIN__' ),
		'archives'              => _x( '__SINGULAR_NAME__ archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', '__TEXTDOMAIN__' ),
		'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', '__TEXTDOMAIN__' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', '__TEXTDOMAIN__' ),
		'filter_items_list'     => _x( 'Filter __PLURAL_NAME__ list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', '__TEXTDOMAIN__' ),
		'items_list_navigation' => _x( '__PLURAL_NAME__ list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', '__TEXTDOMAIN__' ),
		'items_list'            => _x( '__PLURAL_NAME__ list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', '__TEXTDOMAIN__' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => '__SLUG__' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array(__SUPPORTS__),
	);

	register_post_type( 'book', $args );
}

add_action( 'init', 'wpcreator___SINGULAR_NAME___init' );