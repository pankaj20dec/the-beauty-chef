<?php
// Recipe Custom Post
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

// create a new taxonomy
function recipes_init() {
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