<?php

require get_template_directory() . '/inc/theme-options/class-theme-kirki.php';

WPCAP_B4_Kirki::add_config( 'wpcap_b4_theme', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

WPCAP_B4_Kirki::add_panel( 'theme_options', array(
    'priority'    => 31,
    'title'       => esc_html__( 'Theme Options', 'wpcap-b4' ),
) );

WPCAP_B4_Kirki::add_field( 'wpcap_b4_theme', array(
	'settings' => 'logo_height',
	'label'    => esc_html__( 'Logo Height (in px)', 'wpcap-b4' ),
	'section'  => 'title_tagline',
	'type'     => 'number',
	'priority' => 8,
	'default'  => 60,
    'tooltip'  => esc_html__( 'Minimum height 25px & maximum height 200px. Width will be adjusted automatically.', 'wpcap-b4' ),
    'choices'  => array(
		'min'  => 25,
		'max'  => 200,
		'step' => 1,
	),
    'output'   => array(
        array(
			'element'  => '.custom-logo',
			'property' => 'height',
			'units'    => 'px',
		),
        array(
			'element'       => '.custom-logo',
			'property'      => 'width',
            'value_pattern' => 'auto',
		)
    )
) );

// Add settings
include( get_template_directory() . '/inc/theme-options/theme-colors.php' );
include( get_template_directory() . '/inc/theme-options/typography.php' );
include( get_template_directory() . '/inc/theme-options/layout.php' );
include( get_template_directory() . '/inc/theme-options/static-frontpage.php' );
include( get_template_directory() . '/inc/theme-options/blog-home.php' );


WPCAP_B4_Kirki::add_section( 'upgrade_theme', array(
    'title'          => esc_html__( 'Get More Features', 'wpcap-b4' ),
    'panel'          => '',
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
	'priority'		 => 500
) );

WPCAP_B4_Kirki::add_field( 'wpcap_b4_theme', array(
	'settings' => 'pro_features',
	'section'  => 'upgrade_theme',
	'type'     => 'custom',
    'default'  => '<h2 class="wpcapb4-region-title first-region-title">' . esc_html__( 'Upgrade To Pro', 'wpcap-b4' ) . '</h2>
					<p>Let\'s make your website even better with the pro version of this theme.</p>
					<a class="button button-primary button-hero" href="https://webcap.com/downloads/wpcap-b4-pro/" target="_blank">Read More</a>',
) );


/**
* Styling Customizer
*/
function wpcap_b4_customizer_css()
{
	if( class_exists( 'Kirki' ) ) {
		wp_enqueue_style( 'wpcap-b4-customizer-css', get_template_directory_uri() . '/inc/theme-options/customizer.css' );
	}
}
add_action( 'customize_controls_print_styles', 'wpcap_b4_customizer_css' );
