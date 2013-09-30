<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<title><?php wp_title(''); ?></title>
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<?php if (is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply'); ?>
		<?php wp_head(); ?>
	</head>
	
	<body <?php body_class('has-' . get_theme_mod('navbar_placement')); ?> data-spy="scroll" data-target="#sidebar-1">
		<?php get_template_part('navbar'); ?>
		
		<div id="wrapper">
			<?php if(!is_front_page()) {
				get_template_part('masthead', 'inside');
			} ?>