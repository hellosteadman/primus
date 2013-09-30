<div class="site-header page-header">
	<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('title'); ?></a></h1>
	<div class="site-description"><?php echo wpautop(get_bloginfo('description')); ?></div>
	<?php $header_image = get_header_image();
	if (!empty($header_image)) { ?>
		<a href="<?php echo esc_url(home_url('/')); ?>">
			<?php $header = get_custom_header(); ?>
			<img src="<?php echo esc_url($header_image); ?>" class="header-image" width="<?php echo $header->width; ?>" height="<?php echo $header->height; ?>" alt="" />
		</a>
	<?php } ?>
</div>