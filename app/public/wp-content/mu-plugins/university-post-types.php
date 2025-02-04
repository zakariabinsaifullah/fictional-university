<?php
function university_post_types() {
	// Event Post Type..
	register_post_type('event', array(
		'supports' => array('title', 'editor', 'excerpt'),
		'has_archive' => true,
		'rewrite' => array('slug' => 'events'),
		'public' => true,
		'labels' => array(
			'name' => 'Events',
			'add_new_item' => 'Add New Event',
			'edit_item' => "Edit Event",
			'all_items' => "All Events",
			'singular_name' => 'Event'
		),
		'menu_icon' => 'dashicons-calendar'
	));

	// Program Post Type.. 
	register_post_type('program', array(
		'supports' => array('title', 'editor'),
		'has_archive' => true,
		'rewrite' => array('slug' => 'programs'),
		'public' => true,
		'labels' => array(
			'name' => 'Programs',
			'add_new_item' => 'Add New Program',
			'edit_item' => "Edit Program",
			'all_items' => "All Programs",
			'singular_name' => 'Program'
		),
		'menu_icon' => 'dashicons-awards'
	));

	// Professor Post Type..
	register_post_type('professor', array(
		'supports' => array('title', 'editor', 'thumbnail'),
		'public' => true,
		'labels' => array(
			'name' => 'Professors',
			'add_new_item' => 'Add New Professor',
			'edit_item' => "Edit Professor",
			'all_items' => "All Professors",
			'singular_name' => 'Professor'
		),
		'menu_icon' => 'dashicons-welcome-learn-more'
	));

	// Campus Post Type..
		register_post_type('campus', array(
		'supports' => array('title', 'editor', 'excerpt'),
		'has_archive' => true,
		'rewrite' => array('slug' => 'campuses'),
		'public' => true,
		'labels' => array(
			'name' => 'Campus',
			'add_new_item' => 'Add New Campus',
			'edit_item' => "Edit Campus",
			'all_items' => "All Campuses",
			'singular_name' => 'Campus'
		),
		'menu_icon' => 'dashicons-location-alt'
	));
}
add_action('init', 'university_post_types');
