<?php /**
 * Template Name: One column
 * Description: A single-column template
**/
get_header(); ?>

<div class="container" id="main-container">
	<?php if(is_front_page()) {
		get_template_part('masthead', 'page');
	} else {
		primus_breadcrumb();
	} ?>
	
	<?php if(have_posts()) {
		while(have_posts()) {
			the_post(); ?>
			<article <?php post_class('clearfix'); ?>>
				<h2><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h2>
				<?php the_content(); ?>
			</article>
			<hr />
		<?php }
	} else {
		get_template_part('not-found');
	} ?>
</div> <!-- /container -->
<?php get_footer(); ?>