<?php function primus_widgets_init() {
	register_sidebar(
		array(
			'name' => __('Main Sidebar', 'sidebar-1'),
			'id' => 'sidebar-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	
	register_sidebar(
		array(
			'name' => __('Footer A', 'primus'),
			'id' => 'footer-a',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	
	register_sidebar(
		array(
			'name' => __('Footer B', 'primus'),
			'id' => 'footer-b',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	
	register_sidebar(
		array(
			'name' => __('Footer C', 'primus'),
			'id' => 'footer-c',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	
	register_sidebar(
		array(
			'name' => __('Footer D', 'primus'),
			'id' => 'footer-d',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
}

add_action('widgets_init', 'primus_widgets_init');