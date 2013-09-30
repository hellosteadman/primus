<div class="span4 sidebar-container" role="complementary">
	<div id="sidebar-1">
		<?php if (!dynamic_sidebar('sidebar-1')) { ?>
			<div class="row">
				<aside id="archives" class="widget span2">
					<h3 class="widget-title"><?php _e('Archives', 'primus'); ?></h3>
					<ul class="unstyled">
						<?php wp_get_archives(
							array('type' => 'monthly')
						); ?>
					</ul>
				</aside>
				
				<aside id="meta" class="widget span2">
					<h3 class="widget-title"><?php _e('Meta', 'primus'); ?></h3>
					<ul class="unstyled">
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>
			</div>
		<?php } ?>
	</div>
</div>