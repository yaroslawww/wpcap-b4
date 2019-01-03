<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package WPCAP_B4
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wpcap_b4_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( get_theme_mod( 'hide_sidebar_on_mobile', 'no' ) === 'yes' ) {
		$classes[] = 'wb-hide-mobile-sidebar';
	}

	if ( get_option( 'show_on_front' ) === 'page' && is_front_page() ) {
		$classes[] = 'wb-bp-front-page';
	}

	return $classes;
}
add_filter( 'body_class', 'wpcap_b4_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function wpcap_b4_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'wpcap_b4_pingback_header' );



/**
* Add classes to navigation buttons
*/
add_filter( 'next_posts_link_attributes', 'wpcap_b4_posts_link_attributes' );
add_filter( 'previous_posts_link_attributes', 'wpcap_b4_posts_link_attributes' );
add_filter( 'next_comments_link_attributes', 'wpcap_b4_comments_link_attributes' );
add_filter( 'previous_comments_link_attributes', 'wpcap_b4_comments_link_attributes' );

function wpcap_b4_posts_link_attributes() {
    return 'class="btn btn-outline-primary mb-4"';
}

function wpcap_b4_comments_link_attributes() {
    return 'class="btn btn-outline-primary mb-4"';
}



/**
* Return shorter excerpt
*/
function wpcap_b4_get_short_excerpt( $length = 40, $post_obj = null ) {
	global $post;
	if ( is_null( $post_obj ) ) {
		$post_obj = $post;
	}
	$length = absint( $length );
	if ( $length < 1 ) {
		$length = 40;
	}
	$source_content = $post_obj->post_content;
	if ( ! empty( $post_obj->post_excerpt ) ) {
		$source_content = $post_obj->post_excerpt;
	}
	$source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
	$trimmed_content = wp_trim_words( $source_content, $length, '...' );
	return $trimmed_content;
}


/**
* Add Help Page
*/
function wpcap_b4_add_welcome_page() {
    $_name = esc_html__( 'Theme Help' , 'wpcap-b4' );

    $theme_page = add_theme_page(
        $_name,
        $_name,
        'edit_theme_options',
        'wpcapb4-theme-help',
        'wpcap_b4_welcome_page'
    );
}
add_action( 'admin_menu', 'wpcap_b4_add_welcome_page', 1 );

function wpcap_b4_welcome_page() {
	include_once( get_template_directory() . '/inc/theme-help.php' );
}


/**
* Add admin styles
*/
function wpcap_b4_admin_style( $hook ) {
	if ( 'appearance_page_wpcapb4-theme-help' != $hook ) {
		return;
	}
	wp_enqueue_style( 'wpcap-b4-admin', get_template_directory_uri() . '/assets/css/theme-admin.css' );
}
add_action( 'admin_enqueue_scripts' , 'wpcap_b4_admin_style' );
