<?php
function customizer_repeater_register($wp_customize)
{

	// require_once(get_template_directory() . '/customizer-repeater/class/customizer-repeater-control.php');
	get_template_part('customizer-repeater/class/customizer-repeater', 'control');
	
	$wp_customize->add_setting('devm_nunu_repeater', array(
		'sanitize_callback' => 'customizer_repeater_sanitize'
	));
	$wp_customize->add_control(new Customizer_Repeater($wp_customize, 'devm_nunu_repeater', array(
		'label'   => esc_html__('Social Settings', 'newseqo'),
		'section' => 'devm_repeater_section',
		'priority' => 1,
		'customizer_repeater_icon_control' => true,
		'customizer_repeater_title_control' => true,

		'customizer_repeater_link_control' => true,

	)));
}
add_action('customize_register', 'customizer_repeater_register');
