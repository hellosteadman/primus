<?php function primus_icon($icon) {
	global $post;
	
	$icon = apply_filters('primus_icon', 'pencil', $post);
	echo '<i class="icon-' . $icon . '"></i>';
}

function do_primus_icon($icon, $post) {
	if(get_post_type($post) == 'page') {
		return 'page';
	}
	
	return $icon;
}

add_filter('primus_icon', 'do_primus_icon', 10, 2);