<?php function primus_page_menu() { ?>
	<div class="nav-collapse">
		<?php $menu = wp_page_menu(
			array(
				'depth' => 1,
				'echo' => false
			)
		);
		
		$li = strpos($menu, '<li');
		if($li > -1) {
			$menu = substr($menu, $li);
		}
		
		$li = strrpos($menu, '</li>');
		if($menu > -1) {
			$menu = substr($menu, 0, $li + 4);
		}
		
		echo '<ul class="nav">' . $menu . '</ul>'; ?>
	</div>
<?php }

function primus_nav_menu($theme_location) {
	wp_nav_menu(
		array(
			'theme_location' => $theme_location,
			'container_class' => 'nav-collapse',
			'menu_class' => 'nav',
			'fallback_cb' => 'primus_page_menu',
			'walker' => new Primus_Menu_Walker()
		)
	);
}

function primus_page_css_class($class, $page) {
	global $post;
	
	if($page->ID == $post->ID) {
		$class = array('active');
	} else {
		$class = array();
	}
	
	return $class;
}

add_filter('page_css_class', 'primus_page_css_class', 10, 2);