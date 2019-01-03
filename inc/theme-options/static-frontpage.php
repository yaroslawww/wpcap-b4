<?php

WPCAP_B4_Kirki::add_section( 'wp_bp_frontpage', array(
    'title'          => esc_html__( 'Static Frontpage', 'wpcap-b4' ),
    'panel'          => 'theme_options',
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

if( class_exists( 'Kirki' ) ) {
    function wpcap_b4_move_header_bg_image( $wp_customize ) {
        $wp_customize->get_control( 'header_image' )->section = 'wp_bp_frontpage';
    }
    add_action( 'customize_register', 'wpcap_b4_move_header_bg_image' );
}


WPCAP_B4_Kirki::add_field( 'wpcap_b4_theme', array(
	'settings' => 'front_cover_title',
	'label'    => esc_html__( 'Cover Title', 'wpcap-b4' ),
	'section'  => 'wp_bp_frontpage',
	'type'     => 'text',
    'default'  => get_bloginfo( 'name' ),
) );

WPCAP_B4_Kirki::add_field( 'wpcap_b4_theme', array(
	'settings' => 'front_cover_lead',
	'label'    => esc_html__( 'Cover Lead', 'wpcap-b4' ),
	'section'  => 'wp_bp_frontpage',
	'type'     => 'text',
    'default'  => get_bloginfo( 'description' ),
) );

WPCAP_B4_Kirki::add_field( 'wpcap_b4_theme', array(
	'settings' => 'front_cover_btn_text',
	'label'    => esc_html__( 'Cover Button Text', 'wpcap-b4' ),
	'section'  => 'wp_bp_frontpage',
	'type'     => 'text',
    'default'  => '',
) );

WPCAP_B4_Kirki::add_field( 'wpcap_b4_theme', array(
	'settings' => 'front_cover_btn_link',
	'label'    => esc_html__( 'Cover Button Link', 'wpcap-b4' ),
	'section'  => 'wp_bp_frontpage',
	'type'     => 'text',
    'default'  => '',
) );


WPCAP_B4_Kirki::add_field( 'wpcap_b4_theme', array(
	'settings' => 'featured_page_1',
	'label'    => esc_html__( '1st Featured Page', 'wpcap-b4' ),
	'section'  => 'wp_bp_frontpage',
	'type'     => 'dropdown-pages',
) );

WPCAP_B4_Kirki::add_field( 'wpcap_b4_theme', array(
	'settings' => 'featured_page_2',
	'label'    => esc_html__( '2nd Featured Page', 'wpcap-b4' ),
	'section'  => 'wp_bp_frontpage',
	'type'     => 'dropdown-pages',
) );

WPCAP_B4_Kirki::add_field( 'wpcap_b4_theme', array(
	'settings' => 'featured_page_3',
	'label'    => esc_html__( '3rd Featured Page', 'wpcap-b4' ),
	'section'  => 'wp_bp_frontpage',
	'type'     => 'dropdown-pages',
) );


WPCAP_B4_Kirki::add_field( 'wpcap_b4_theme', array(
	'settings' => 'show_main_content',
	'label'    => esc_html__( 'Show Main Content', 'wpcap-b4' ),
	'section'  => 'wp_bp_frontpage',
	'type'     => 'checkbox',
    'default'  => 1
) );
