		</div> <!-- /#wrapper -->
		
		<footer id="footer">
			<div class="container">
				<div class="row">
					<div class="span3" id="footer-a">
						<?php if (!dynamic_sidebar('footer-a')) { ?>
							<aside id="archives" class="widget span2">
								<h3 class="widget-title"><?php _e('Archives', 'primus'); ?></h3>
								<ul class="unstyled">
									<?php wp_get_archives(
										array('type' => 'monthly')
									); ?>
								</ul>
							</aside>
						<?php } ?>
					</div>
					
					<div class="span3" id="footer-c">
						<?php if (!dynamic_sidebar('footer-c')) { ?>
							<aside id="archives" class="widget span2">
								<h3 class="widget-title"><?php _e('Categories', 'primus'); ?></h3>
								<ul class="unstyled">
									<?php wp_list_categories(
										array(
											'title_li' => null,
											'depth' => 1
										)
									); ?>
								</ul>
							</aside>
						<?php } ?>
					</div>
					
					<div class="span3" id="footer-d">
						<?php if (!dynamic_sidebar('footer-d')) { ?>
							<aside id="meta" class="widget span2">
								<h3 class="widget-title"><?php _e('Pages', 'primus'); ?></h3>
								<ul class="unstyled">
									<?php wp_list_pages(
										array(
											'title_li' => null,
											'depth' => 1
										)
									); ?>
								</ul>
							</aside>
						<?php } ?>
					</div>
					
					<div class="span3" id="footer-b">
						<?php if (!dynamic_sidebar('footer-b')) { ?>
							<aside id="meta" class="widget span2">
								<h3 class="widget-title"><?php _e('Meta', 'primus'); ?></h3>
								<ul class="unstyled">
									<?php wp_register(); ?>
									<li><?php wp_loginout(); ?></li>
									<?php wp_meta(); ?>
								</ul>
							</aside>
						<?php } ?>
					</div>
				</div>
				
				<p>
					<?php echo sprintf(
						__('&copy; %d %s', 'primus'),
						date('Y'),
						sprintf('<a href="%s">%s</a>', esc_url(home_url('/')), get_bloginfo('title'))
					); ?> |
					
					<?php echo sprintf(
						__('Powered by %s and %s', 'primus'),
						'<a href="http://wordpress.org/">WordPress</a>',
						'<a href="http://wordpress.org/themes/primus/">Primus</a>'
					); ?>
				</p>
			</div>
		</footer>
		
		<script src="<?php echo get_template_directory_uri(); ?>/js/functions.js"></script>
		<?php wp_footer(); ?>
	</body>
</html>