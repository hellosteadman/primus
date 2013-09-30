<?php function primus_customise_register($wp_customize) {
	$wp_customize->add_setting(
		'navbar_inverse', array(
			'default' => false,
			'transport' => 'refresh'
		)
	);
	
	$wp_customize->add_setting(
		'navbar_placement', array(
			'default' => 'navbar-static-top',
			'transport' => 'refresh'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'navbar_inverse',
			array(
				'label' => __('Inverst colour', 'primus'),
				'section' => 'nav',
				'setting' => 'navbar_inverse',
				'type' => 'checkbox'
			)
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'navbar_placement',
			array(
				'label' => __('Placement', 'primus'),
				'section' => 'nav',
				'setting' => 'navbar_placement',
				'type' => 'select',
				'choices' => array(
					'navbar-static-top' => 'Top of page',
					'navbar-fixed-top' => 'Fixed to top of window',
					'navbar-fixed-bottom' => 'Fixed to bottom of window'
				)
			)
		)
	);
}

function primus_customise_css() { ?>
	<style>
		<!-- Customised CSS -->
	</style>
<?php }

add_action('customize_register', 'primus_customise_register');
add_action('wp_head', 'primus_customise_css');