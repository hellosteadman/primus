<?php function primus_breadcrumb() {
	do_action('primus_breadcrumb');
}

function do_primus_breadcrumb() {
	$items = array();
	if(!is_front_page()) {
		$items[] = array(
			'url' => home_url('/'),
			'title' => __('Home', 'primus')
		);
	}
	
	if(is_archive() || is_single() || is_page()) {
		$post_type = get_post_type(get_the_ID());
		if($post_type != 'page') {
			$post_type_obj = get_post_type_object($post_type);
			if($post_type == 'post') {
				$title = __('Blog', 'primus');
			} else {
				$title = $post_type_obj->labels->name;
			}
			
			$items[] = array(
				'url' => get_post_type_archive_link($post_type),
				'title' => $title
			);
		}
		
		if(is_single() || is_page()) {
			$ancestors = array_reverse(
				get_post_ancestors(get_the_ID())
			);
			
			foreach($ancestors as $ancestor) {
				$items[] = array(
					'url' => get_permalink($ancestor),
					'title' => get_the_title($ancestor)
				);
			}
			
			$items[] = array(
				'url' => get_permalink(),
				'title' => get_the_title()
			);
		}
	} ?>
	<ul class="breadcrumb">
		<?php foreach($items as $i => $item) { ?>
			<li>
				<?php if($i < count($items) - 1) { ?>
					<a href="<?php echo esc_url($item['url']); ?>"><?php echo htmlentities($item['title']); ?></a>
					<span class="divider">&gt;</span>
				<?php } else {
					echo htmlentities($item['title']);
				} ?>
			</li>
		<?php } ?>
	</ul>
<?php }

add_action('primus_breadcrumb', 'do_primus_breadcrumb');