<?php
// Recipe Custom Post
/*
function recipe_post() {
	register_post_type( 'recipes',
		array(
				'labels' 			  => array(
				'name' 				  => __( 'Recipes' ),
				'singular_name'       => __( 'Recipe' ),
				'menu_name' 		  => __( 'Recipes', 'beautychef' ),
				'parent_item_colon'   => __( 'Parent Recipe', 'beautychef' ),
				'all_items'			  => __( 'All Recipes', 'beautychef' ),
				'view_item' 		  => __( 'View Recipe', 'beautychef' ),
				'add_new_item' 		  => __( 'Add New Recipe', 'beautychef' ),
				'add_new'     	 	  => __( 'Add New', 'beautychef' ),
				'edit_item'           => __( 'Edit Recipe', 'beautychef' ),
				'update_item'         => __( 'Update Recipe', 'beautychef' ),
				'search_items'        => __( 'Search Recipe', 'beautychef' ),
				'not_found'           => __( 'Not Found', 'beautychef' ),
				'not_found_in_trash'  => __( 'Not found in Trash', 'beautychef' ),
			),
			'public' 		=> true,
			'has_archive'   => true,
			'rewrite' 		=> array('slug' => 'recipes'),
			'supports'  	=> array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		)
	);
}
add_action( 'init', 'recipe_post' );
*/

// Testimonial Custom Post
function testimonial_post() {
	register_post_type( 'testimonials',
		array(
				'labels' 			  => array(
				'name' 				  => __( 'Testimonials' ),
				'singular_name'       => __( 'Testimonial' ),
				'menu_name' 		  => __( 'Testimonials', 'beautychef' ),
				'parent_item_colon'   => __( 'Parent Testimonial', 'beautychef' ),
				'all_items'			  => __( 'All Testimonial', 'beautychef' ),
				'view_item' 		  => __( 'View Testimonial', 'beautychef' ),
				'add_new_item' 		  => __( 'Add New Testimonial', 'beautychef' ),
				'add_new'     	 	  => __( 'Add New', 'beautychef' ),
				'edit_item'           => __( 'Edit Testimonial', 'beautychef' ),
				'update_item'         => __( 'Update Testimonial', 'beautychef' ),
				'search_items'        => __( 'Search Testimonial', 'beautychef' ),
				'not_found'           => __( 'Not Found', 'beautychef' ),
				'not_found_in_trash'  => __( 'Not found in Trash', 'beautychef' ),
			),
			'public' 		=> true,
			'has_archive'   => true,
			'rewrite' 		=> array('slug' => 'testimonials'),
			'supports'  	=> array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		)
	);
}
add_action( 'init', 'testimonial_post' );

// Naturopaths Custom Post
function naturopaths_post() {
	register_post_type( 'naturopaths',
		array(
				'labels' 			  => array(
				'name' 				  => __( 'Naturopaths' ),
				'singular_name'       => __( 'Naturopath' ),
				'menu_name' 		  => __( 'Naturopaths', 'beautychef' ),
				'parent_item_colon'   => __( 'Parent Naturopath', 'beautychef' ),
				'all_items'			  => __( 'All Naturopath', 'beautychef' ),
				'view_item' 		  => __( 'View Naturopath', 'beautychef' ),
				'add_new_item' 		  => __( 'Add New Naturopath', 'beautychef' ),
				'add_new'     	 	  => __( 'Add New', 'beautychef' ),
				'edit_item'           => __( 'Edit Naturopath', 'beautychef' ),
				'update_item'         => __( 'Update Naturopath', 'beautychef' ),
				'search_items'        => __( 'Search Naturopath', 'beautychef' ),
				'not_found'           => __( 'Not Found', 'beautychef' ),
				'not_found_in_trash'  => __( 'Not found in Trash', 'beautychef' ),
			),
			'public' 		=> true,
			'has_archive'   => true,
			'rewrite' 		=> array('slug' => 'naturopaths'),
			'supports'  	=> array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		)
	);
}
add_action( 'init', 'naturopaths_post' );

// Press Custom Post
function press_post() {
	register_post_type( 'press',
		array(
				'labels' 			  => array(
				'name' 				  => __( 'Press' ),
				'singular_name'       => __( 'Press' ),
				'menu_name' 		  => __( 'Press', 'beautychef' ),
				'parent_item_colon'   => __( 'Parent Press', 'beautychef' ),
				'all_items'			  => __( 'All Press', 'beautychef' ),
				'view_item' 		  => __( 'View Press', 'beautychef' ),
				'add_new_item' 		  => __( 'Add New Press', 'beautychef' ),
				'add_new'     	 	  => __( 'Add New', 'beautychef' ),
				'edit_item'           => __( 'Edit Press', 'beautychef' ),
				'update_item'         => __( 'Update Press', 'beautychef' ),
				'search_items'        => __( 'Search Press', 'beautychef' ),
				'not_found'           => __( 'Not Found', 'beautychef' ),
				'not_found_in_trash'  => __( 'Not found in Trash', 'beautychef' ),
			),
			'public' 		=> true,
			'has_archive'   => true,
			'rewrite' 		=> array('slug' => 'press'),
			'supports'  	=> array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		)
	);
}
add_action( 'init', 'press_post' );

function faq_post() {
	register_post_type( 'faqs',
		array(
				'labels' 			  => array(
				'name' 				  => __( 'Faqs' ),
				'singular_name'       => __( 'Faq' ),
				'menu_name' 		  => __( 'Faqs', 'beautychef' ),
				'parent_item_colon'   => __( 'Parent Faq', 'beautychef' ),
				'all_items'			  => __( 'All Faq', 'beautychef' ),
				'view_item' 		  => __( 'View Faq', 'beautychef' ),
				'add_new_item' 		  => __( 'Add New Faq', 'beautychef' ),
				'add_new'     	 	  => __( 'Add New', 'beautychef' ),
				'edit_item'           => __( 'Edit Faq', 'beautychef' ),
				'update_item'         => __( 'Update Faq', 'beautychef' ),
				'search_items'        => __( 'Search Faq', 'beautychef' ),
				'not_found'           => __( 'Not Found', 'beautychef' ),
				'not_found_in_trash'  => __( 'Not found in Trash', 'beautychef' ),
			),
			'public' 		=> true,
			'has_archive'   => true,
			'rewrite' 		=> array('slug' => 'faqs'),
			'supports'  	=> array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		)
	);
}
add_action( 'init', 'faq_post' );

// Stockists
function stockists_post() {
	register_post_type( 'stockists',
		array(
				'labels' 			  => array(
				'name' 				  => __( 'Stockists' ),
				'singular_name'       => __( 'Stockist' ),
				'menu_name' 		  => __( 'Stockists', 'beautychef' ),
				'parent_item_colon'   => __( 'Parent Stockist', 'beautychef' ),
				'all_items'			  => __( 'All Stockist', 'beautychef' ),
				'view_item' 		  => __( 'View Stockist', 'beautychef' ),
				'add_new_item' 		  => __( 'Add New Stockist', 'beautychef' ),
				'add_new'     	 	  => __( 'Add New', 'beautychef' ),
				'edit_item'           => __( 'Edit Stockist', 'beautychef' ),
				'update_item'         => __( 'Update Stockist', 'beautychef' ),
				'search_items'        => __( 'Search Stockist', 'beautychef' ),
				'not_found'           => __( 'Not Found', 'beautychef' ),
				'not_found_in_trash'  => __( 'Not found in Trash', 'beautychef' ),
			),
			'public' 		=> true,
			'has_archive'   => true,
			'rewrite' 		=> array('slug' => 'stockists'),
			'supports'  	=> array( 'title','excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		)
	);
}
add_action( 'init', 'stockists_post' );

// Recipe taxonomy
/*function recipes_init() {
	register_taxonomy(
		'recipes_cat',
		'recipes',
		array(
			'label' => __( 'Recipe Categories' ),
			'rewrite' => array( 'slug' => 'recipes_cat' ),
			'hierarchical' => true,
		)
	);
}
add_action( 'init', 'recipes_init' );
*/

// Press taxonomy
function press_init() {
	register_taxonomy(
		'press_cat',
		'press',
		array(
			'label' => __( 'Press Categories' ),
			'rewrite' => array( 'slug' => 'press_cat' ),
			'hierarchical' => true,
		)
	);
}
add_action( 'init', 'press_init' );

// Faq taxonomy
function faq_init() {
	register_taxonomy(
		'faq_cat',
		'faqs',
		array(
			'label' => __( 'Faq Categories' ),
			'rewrite' => array( 'slug' => 'faq_cat' ),
			'hierarchical' => true,
		)
	);
}
add_action( 'init', 'faq_init' );

// Stockists taxonomy
function stockists_init() {
	register_taxonomy(
		'stockists_cat',
		'stockists',
		array(
			'label' => __( 'Stockists Categories' ),
			'rewrite' => array( 'slug' => 'stockists_cat' ),
			'hierarchical' => true,
		)
	);
}
add_action( 'init', 'stockists_init' );