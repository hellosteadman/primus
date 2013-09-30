<?php function primus_setup() {
	load_theme_textdomain('primus', get_template_directory() . '/languages');
	add_theme_support('automatic-feed-links');
	add_theme_support('post-formats', array('aside', 'image', 'link', 'quote', 'status'));
	register_nav_menu('primary', __('Primary Menu', 'primus'));
	add_theme_support('custom-background',
		array(
			'default-color' => '#f4f4f4',
		)
	);
	
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(736, 9999);
}

add_action('after_setup_theme', 'primus_setup');

function primus_scripts_styles() {
	wp_enqueue_style('primus-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '2.3.2', 'screen');
	wp_enqueue_style('primus-bootstrap-responsive', get_template_directory_uri() . '/css/bootstrap-responsive.min.css', array(), '2.3.2', 'screen');
	wp_enqueue_script('primus-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '2.3.2', 'screen');
}

function primus_include($dir) {
	foreach(glob(dirname(__FILE__) . '/' . $dir . '/*.php') as $file) {
		require_once($file);
	}
	
	foreach(glob(dirname(__FILE__) . '/' . $dir . '/*', GLOB_ONLYDIR) as $subdir) {
		primus_include($dir . '/' . basename($subdir));
	}
}

add_action('wp_enqueue_scripts', 'primus_scripts_styles');
primus_include('includes');
primus_include('classes');