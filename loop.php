<?php if(have_posts()) {
	$first = true;
	while(have_posts()) {
		if(!$first) {
			echo '<hr />';
		} else {
			$first = false;
		}
		
		the_post(); ?>
		<article <?php post_class('clearfix'); ?>>
			<header>
				<div class="icon">
					<?php primus_icon('pencil'); ?>
				</div>
				
				<h2>
					<a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a>
					<?php if(get_post_type($post) == 'post') { ?>
						<small><?php the_time('jS F Y'); ?></small>
					<?php } elseif(get_post_type($post) == 'raffle') {
						if(elc_raffle_open()) { ?>
							<small>Ends <?php echo elc_time_until(elc_raffle_closes()); ?></small>
						<?php } else { ?>
							<small>Ended <?php echo elc_time_since(elc_raffle_closes()); ?></small>
						<?php }
					} ?>
				</h2>
			</header>
			
			<div class="content">
				<?php the_post_thumbnail(); ?>
				<?php the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'primus')); ?>
			</div>
			
			<footer class="well">
				<?php $show_sep = false;
				if (is_object_in_taxonomy(get_post_type(), 'category')) {
					$categories_list = get_the_category_list(__(', ', 'primus'));
					if ($categories_list) { ?>
						<span class="cat-links">
							<?php printf(__('<span class="%1$s">Posted in</span> %2$s', 'primus'), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list);
							$show_sep = true; ?>
						</span>
					<?php }
				}
				
				if (is_object_in_taxonomy(get_post_type(), 'post_tag')) {
					$tags_list = get_the_tag_list('', __(', ', 'primus'));
					if ($tags_list) {
						if ($show_sep) { ?>
							<span class="sep"> | </span>
						<?php } ?>
						<span class="tag-links">
							<?php printf(__('<span class="%1$s">Tagged</span> %2$s', 'primus'), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list);
							$show_sep = true; ?>
						</span>
					<?php }
				}
				
				if (comments_open()) {
					if ($show_sep) { ?>
						<span class="sep"> | </span>
					<?php } ?>
					<span class="comments-link"><?php comments_popup_link('<span class="leave-reply">' . __('Leave a reply', 'primus') . '</span>', __('<b>1</b> Reply', 'primus'), __('<b>%</b> Replies', 'primus')); ?></span>
				<?php }
				
				edit_post_link(__('Edit', 'primus'), ($show_sep ? ' | ' : '') . '<span class="edit-link">', '</span>'); ?>
			</footer>
		</article>
	<?php }
} else {
	get_template_part('not-found');
} ?>