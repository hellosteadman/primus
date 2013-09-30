<?php get_header(); ?>

<div class="container" id="main-container">
	<?php get_template_part('masthead', 'blog'); ?>
	
	<div class="row">
		<div class="span8">
			<?php get_template_part('loop', get_post_type()); ?>
		</div> <!-- /span8 -->
		<?php get_sidebar(); ?>
	</div> <!-- /row> -->
</div> <!-- /container -->

<?php get_footer(); ?>