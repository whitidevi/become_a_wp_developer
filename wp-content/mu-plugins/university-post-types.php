<?php 


function university_post_types() {
    // event Post Type
    register_post_type('event', array(
	'show_in_rest' => true,
	'supports' => array(
	  'title',
	  'editor',
	  'excerpt',
	), // If we want to use excerpt or etc., we must bring 'title' and 'editor'.
	'rewrite' => array(
	  'slug' => 'events',
	),
	'has_archive' => true, // to load evenets in archive.php or as archive
        'public' => true,
        'labels' => array(
            'name' => 'Events',
	    'add_new_item' => 'Add New Event',
	    'edit_item' => 'Edit Event',
	    'all_items' => 'All Events',
	    'singular_name' => 'Event',
        ),
        'menu_icon' => 'dashicons-calendar',
    ));

	// program Post Type
    register_post_type('program', array(
	'public' => true,
	'show_in_rest' => true, // RestAPI - show in modern editor
	'has_archive' => true,
	'labels' => array(
	  'name' => 'Programs',
	  'add_new_item' => 'Add New Program',
	  'edit_item' => 'Edit Program',
	  'all_items' => 'All Programs',
	  'singular_name' => 'Program',
	),
	'rewrite' => array(
	  'slug' => 'programs',
	),
	'supports' => array(
	  'title',
	  'editor',
	),
	'menu_icon' => 'dashicons-awards',
    ));
}

add_action('init', 'university_post_types');
