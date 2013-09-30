<?php get_header(); ?>

<div class="container" id="main-container">
	<?php if(is_front_page()) {
		get_template_part('masthead', 'page');
	} else {
		primus_breadcrumb();
	} ?>
	
	<div class="row">
		<div class="span8">
			<?php if(have_posts()) {
				while(have_posts()) {
					the_post(); ?>
					<article <?php post_class('clearfix'); ?>>
						<h2><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h2>
						<?php the_content(); ?>
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