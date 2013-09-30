<?php get_header(); ?>

<div class="container" id="main-container">
	<?php primus_breadcrumb(); ?>
	
	<div class="row">
		<div class="span8">
			<?php if(have_posts()) {
				while(have_posts()) {
					the_post(); ?>
					<article <?php post_class('clearfix'); ?>>
						<header>
							<div class="icon">
								<?php primus_icon('pencil'); ?>
							</div>
				
							<h2>
								<a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a>
							</h2>
						</header>
			
						<div class="content">
							<?php the_post_thumbnail(); ?>
							<?php the_content(); ?>
						</div>
			
						<footer class="well">
							Posted on <?php the_time('jS F Y'); ?>
							by <a href="<?php the_author_link(); ?>"><?php the_author(); ?></a>
							<?php $show_sep = false;
							if (is_object_in_taxonomy(get_post_type(), 'category')) {
								$categories_list = get_the_category_list(__(', ', 'primus'));
								if ($categories_list) { ?>
									<span class="cat-links">
										<?php printf(__('<span class="%1$s">in</span> %2$s', 'primus'), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list);
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
				
							edit_post_link(__('Edit', 'primus'), ($show_sep ? ' | ' : '') . '<span class="edit-link">', '</span>'); ?>
						</footer>
					</article>
				<?php }
			} else {
				get_template_part('not-found');
			} ?>
		</div> <!-- /span8 -->
		<?php get_sidebar(); ?>
	</div> <!-- /row> -->
</div> <!-- /container -->
<?php get_footer(); ?>