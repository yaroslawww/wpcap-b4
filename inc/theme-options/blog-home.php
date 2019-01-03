<?php

WPCAP_B4_Kirki::add_section( 'blog_home', array(
    'title'          => esc_html__( 'Blog Homepage', 'wpcap-b4' ),
    'panel'          => 'theme_options',
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

WPCAP_B4_Kirki::add_field( 'wpcap_b4_theme', array(
	'settings' => 'blog_home_title_1',
	'section'  => 'blog_home',
	'type'     => 'custom',
    'default'  => '<h2 class="wpcapb4-region-title first-region-title">' . esc_html__( 'Cover Section', 'wpcap-b4' ) . '</h2>',
) );

WPCAP_B4_Kirki::add_field( 'wpcap_b4_theme', array(
	'settings' => 'blog_display_cover_section',
	'label'    => esc_html__( 'Display Cover Section', 'wpcap-b4' ),
	'section'  => 'blog_home',
	'type'     => 'checkbox',
    'default'  => 1,
) );

WPCAP_B4_Kirki::add_field( 'wpcap_b4_theme', array(
	'settings'          => 'blog_cover_title',
	'label'             => esc_html__( 'Cover Title', 'wpcap-b4' ),
	'section'           => 'blog_home',
	'type'              => 'text',
    'sanitize_callback' => 'wp_kses_post',
) );

WPCAP_B4_Kirki::add_field( 'wpcap_b4_theme', array(
	'settings'          => 'blog_cover_lead',
	'label'             => esc_html__( 'Cover Lead Text', 'wpcap-b4' ),
	'section'           => 'blog_home',
	'type'              => 'text',
) );

WPCAP_B4_Kirki::add_field( 'wpcap_b4_theme', array(
	'settings'          => 'blog_cover_btn_text',
	'label'             => esc_html__( 'Cover Button Text', 'wpcap-b4' ),
	'section'           => 'blog_home',
	'type'              => 'text',
) );

WPCAP_B4_Kirki::add_field( 'wpcap_b4_theme', array(
	'settings'          => 'blog_cover_btn_link',
	'label'             => esc_html__( 'Cover Button Link', 'wpcap-b4' ),
	'section'           => 'blog_home',
	'type'              => 'text',
) );


WPCAP_B4_Kirki::add_field( 'wpcap_b4_theme', array(
	'settings' => 'blog_home_title_2',
	'section'  => 'blog_home',
	'type'     => 'custom',
    'default'  => '<h2 class="wpcapb4-region-title">' . esc_html__( 'Featured Posts Slider', 'wpcap-b4' ) . '</h2>',
) );

WPCAP_B4_Kirki::add_field( 'wpcap_b4_theme', array(
	'settings' => 'blog_display_posts_slider',
	'label'    => esc_html__( 'Display Posts Slider', 'wpcap-b4' ),
	'section'  => 'blog_home',
	'type'     => 'checkbox',
    'default'  => 1,
) );

WPCAP_B4_Kirki::add_field( 'wpcap_b4_theme', array(
	'settings' => 'featured_count',
	'label'    => esc_html__( 'Number of Posts In Slider', 'wpcap-b4' ),
	'section'  => 'blog_home',
	'type'     => 'number',
    'default'  => '5',
    'choices'  => array(
		'min'  => 1,
		'max'  => 10,
		'step' => 1,
	),
) );

if( class_exists( 'Kirki_Helper' ) ) {
    WPCAP_B4_Kirki::add_field( 'wpcap_b4_theme', array(
    	'settings'    => 'featured_ids',
    	'label'       => esc_html__( 'Select Posts', 'wpcap-b4' ),
    	'section'     => 'blog_home',
    	'type'        => 'select',
        'multiple'    => 10,
        'choices'     => Kirki_Helper::get_posts( array( 'posts_per_page' => 100, 'post_type' => 'post' ) ),
    ) );
}
