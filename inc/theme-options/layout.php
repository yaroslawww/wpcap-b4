<?php

WPCAP_B4_Kirki::add_section( 'wp_bp_layout', array(
    'title'          => esc_html__( 'Layout Settings', 'wpcap-b4' ),
    'panel'          => 'theme_options',
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

WPCAP_B4_Kirki::add_field( 'wpcap_b4_theme', array(
	'settings' => 'container_width',
	'label'    => esc_html__( 'Container Max Width (in px)', 'wpcap-b4' ),
	'section'  => 'wp_bp_layout',
	'type'     => 'slider',
    'default'  => 1140,
	'choices'  => array(
		'min'  => '1080',
		'max'  => '1400',
		'step' => '10',
	),
    'output' => array(
		array(
			'element'  => '.container',
			'property' => 'max-width',
			'units'    => 'px',
		),
        array(
			'element'  => '.elementor-section.elementor-section-boxed>.elementor-container',
			'property' => 'max-width',
			'units'    => 'px',
		),
	),
) );

// Header Content Width
WPCAP_B4_Kirki::add_field( 'wpcap_b4_theme', array(
	'settings' => 'header_within_container',
	'label'    => esc_html__( 'Header Content Within Container', 'wpcap-b4' ),
	'section'  => 'wp_bp_layout',
	'type'     => 'checkbox',
    'default'  => 0,
) );

// Sticky header
WPCAP_B4_Kirki::add_field( 'wpcap_b4_theme', array(
	'settings' => 'sticky_header',
	'label'    => esc_html__( 'Sticky Header', 'wpcap-b4' ),
	'section'  => 'wp_bp_layout',
	'type'     => 'checkbox',
    'default'  => 0,
    'tooltip'  => esc_html__( 'Some browsers may be outdated to support this feature.', 'wpcap-b4' ),
) );

// Default Sidebar Position
WPCAP_B4_Kirki::add_field( 'wpcap_b4_theme', array(
	'settings' => 'default_sidebar_position',
	'label'    => esc_html__( 'Default Sidebar Position', 'wpcap-b4' ),
    'tooltip'  => esc_html__( 'This can be overwritten on the particular page by using a page template.', 'wpcap-b4' ),
	'section'  => 'wp_bp_layout',
	'type'     => 'radio',
    'default'  => 'right',
    'choices'  => array(
        'right' => esc_html__( 'Right', 'wpcap-b4' ),
        'left'  => esc_html__( 'Left', 'wpcap-b4' ),
        'no'    => esc_html__( 'No Sidebar', 'wpcap-b4' ),
    )
) );

WPCAP_B4_Kirki::add_field( 'wpcap_b4_theme', array(
	'settings' => 'hide_sidebar_on_mobile',
	'label'    => esc_html__( 'Hide Sidebar On Mobile', 'wpcap-b4' ),
	'section'  => 'wp_bp_layout',
	'type'     => 'radio',
    'default'  => 'no',
    'choices' => array(
        'no'  => esc_html__( 'No.', 'wpcap-b4' ),
        'yes'  => esc_html__( 'Yes, hide sidebar on small devices.', 'wpcap-b4' ),
    ),
    'active_callback' => array(
        array(
            'setting'  => 'default_sidebar_position',
            'operator' => '!==',
            'value'    => 'no',
        ),
    ),
) );

// Blog Display
WPCAP_B4_Kirki::add_field( 'wpcap_b4_theme', array(
	'settings'    => 'default_blog_display',
	'label'       => esc_html__( 'Blog Display', 'wpcap-b4' ),
    'description' => esc_html__( 'Choose between a full post or an excerpt for the blog and archive pages.', 'wpcap-b4' ),
	'section'     => 'wp_bp_layout',
	'type'        => 'radio',
    'default'     => 'excerpt',
    'choices'     => array(
        'excerpt' => esc_html__( 'Post excerpt', 'wpcap-b4' ),
        'full'    => esc_html__( 'Full Post', 'wpcap-b4' ),
    )
) );
