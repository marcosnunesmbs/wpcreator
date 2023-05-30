<?php
function wpcreator_%SINGULAR_NAME%_init() {
	$labels = array(
		'name'                  => _x( '%PLURAL_NAME%', 'Post type general name', 'textdomain' ),
		'singular_name'         => _x( '%SINGULAR_NAME%', 'Post type singular name', 'textdomain' ),
		'menu_name'             => _x( '%MENU_NAME%', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar'        => _x( '%SINGULAR_NAME%', 'Add New on Toolbar', 'textdomain' ),
		'add_new'               => __( 'Add New', 'textdomain' ),
		'add_new_item'          => __( 'Add New %SINGULAR_NAME%', 'textdomain' ),
		'new_item'              => __( 'New %SINGULAR_NAME%', 'textdomain' ),
		'edit_item'             => __( 'Edit %SINGULAR_NAME%', 'textdomain' ),
		'view_item'             => __( 'View %SINGULAR_NAME%', 'textdomain' ),
		'all_items'             => __( 'All %PLURAL_NAME%', 'textdomain' ),
		'search_items'          => __( 'Search %PLURAL_NAME%', 'textdomain' ),
		'parent_item_colon'     => __( 'Parent %PLURAL_NAME%:', 'textdomain' ),
		'not_found'             => __( 'No books found.', 'textdomain' ),
		'not_found_in_trash'    => __( 'No books found in Trash.', 'textdomain' ),
		'featured_image'        => _x( '%SINGULAR_NAME% Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( '%SINGULAR_NAME% archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( '%PLURAL_NAME% list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( '%PLURAL_NAME% list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => '%SLUG%' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array(%SUPPORTS%),
	);

	register_post_type( 'book', $args );
}

add_action( 'init', 'wpcreator_%SINGULAR_NAME%_init' );