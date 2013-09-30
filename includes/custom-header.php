<?php function primus_custom_header_setup() {
	$args = array(
		// Text colour and image (empty to use none).
		'default-text-color' => '333',
		'default-image' => '',
		// Set height and width, with a maximum value for the width.
		// 'height' => 658,
		'width' => 1170,
		'max-width' => 1170,
		// Support flexible height and width.
		'flex-height' => true,
		'flex-width' => false,
		// Random image rotation off by default.
		'random-default' => false,
		// Callbacks for styling the header and the admin preview.
		'wp-head-callback' => 'primus_header_style',
		'admin-head-callback' => 'primus_admin_header_style',
		'admin-preview-callback' => 'primus_admin_header_image',
	);
	add_theme_support('custom-header', $args);
}

add_action('after_setup_theme', 'primus_custom_header_setup');

function primus_header_style() {
	$text_colour = get_header_textcolor(); ?>
	<style type="text/css">
		<?php if (!display_header_text()) { ?>
			.site-title, .site-description {
				position: absolute !important;
				clip: rect(1px 1px 1px 1px);
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php } else { ?>
			.site-title a,
			.site-description {
				color: #<?php echo $text_colour; ?> !important;
			}
		<?php } ?>
	</style>
<?php }

function primus_admin_header_style() { ?>
	<style type="text/css">
		#heading {
			margin: 20px 0 30px;
			font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
			font-size: 14px;
			line-height: 20px;
			color: #333333;
		}
		
		#heading h1 {
			font-size: 38.5px;
			line-height: 40px;
			margin: 0;
			padding: 10px 10px 0 10px;
			font-family: inherit;
			font-weight: bold;
			line-height: 20px;
			color: inherit;
			text-rendering: optimizelegibility;
			display: block;
			font-size: 2em;
		}
		
		#heading h1 a { text-decoration: none;  }
		
		#heading p {
			margin: 0;
			padding: 0 10px 10px 10px;
			display: block;
		}
	</style>
<?php }

function primus_admin_header_image() { ?>
	<div id="headimg">
		<?php if (!display_header_text()) {
			$style = ' style="display:none;"';
		} else {
			$style = ' style="color:#' . get_header_textcolor() . ';"';
		} ?>
		
		<h1 class="site-title"><a <?php echo $style; ?> onclick="return false;" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
		<div class="site">
			<p <?php echo $style; ?>><?php bloginfo('description'); ?></p>
		</p>
		
		<?php $header_image = get_header_image();
		if (!empty($header_image)) { ?>
			<img src="<?php echo esc_url($header_image); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
		<?php } ?>
	</div>
<?php }