<div class="navbar <?php echo get_theme_mod('navbar_inverse') ? 'navbar-inverse' : ''; ?> <?php echo get_theme_mod('navbar_placement'); ?>">
	<div class="navbar-inner">
		<div class="container">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<?php primus_nav_menu('primary'); ?>
		</div>
	</div>
</div>