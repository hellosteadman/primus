<?php class Primus_Menu_Walker extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth) {
		$output .= "\n<ul class=\"dropdown-menu\">\n";
	}
	
	function start_el(&$output, $item, $depth, $args) {
		$parents = array();
		if (($locations = get_nav_menu_locations()) && isset($locations[$args->theme_location])) {
			$menu = wp_get_nav_menu_object($locations[$args->theme_location]);
			$menu_items = wp_get_nav_menu_items($menu->term_id);
			
			foreach($menu_items as $menu_item) {
				if($menu_item->menu_item_parent != 0) {
					$parents[] = $menu_item->menu_item_parent;
				}
			}
		}
		
		$dropdown = '';
		$dropdown_toggle = '';
		$caret = '';
		
		$classes = empty($item->classes) ? array() : (array)$item->classes;
		if($item->current || in_array('current-menu-ancestor', $classes)) {
			$classes[] = 'active';
		}
		
		if(in_array($item->ID, $parents)) {
			if($depth == 0) {
				$classes[] = 'dropdown';
				$dropdown_toggle = ' dropdown-toggle';
			} else {
				$classes[] = 'dropdown-submenu';
			}
		}
		
		$class_names = esc_attr(
			implode(' ',
				apply_filters(
					'nav_menu_css_class',
					array_filter($classes),
					$item
				)
			)
		);
		
		$output .= '<li id="nav-menu-item-'. $item->ID;
		$output .= '" class="' . $depth_class_names . ' ' . $class_names . '">';
		
		$attributes  = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
		$attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
		$attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
		$attributes .= ' class="menu-link ' . ($depth > 0 ? 'sub-menu-link' : 'main-menu-link');
		
		if(in_array($item->ID, $parents) && $depth == 0) {
			$attributes .= ' dropdown-toggle';
			$caret = ' <b class="caret"></b>';
		}
		
		$attributes .= '"';
		
		if(in_array($item->ID, $parents) && $depth == 0) {
			$attributes .= ' href="javascript:;" data-toggle="dropdown"';
		} else {
			$attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
		}
		
		$item_output = sprintf(
			'%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
			$args->before,
			$attributes,
			$args->link_before,
			apply_filters('the_title', $item->title, $item->ID),
			$args->link_after . $caret,
			$args->after
		);
		
		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}
} ?>