<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Game_Dev_Portfolio
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function game_dev_portfolio_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'game_dev_portfolio_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function game_dev_portfolio_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'game_dev_portfolio_pingback_header' );

// FIXME: look into deleting these functions
function game_dev_portfolio_form_remove_url($arg) {
	$arg['url'] = '';
	//'<i class="fas fa-user-circle"></i>'
	return $arg;
}
add_filter('comment_form_default_fields', 'game_dev_portfolio_form_remove_url');

// FIXME: look into deleting these functions
function game_dev_portfolio_comment_field_at_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'game_dev_portfolio_comment_field_at_bottom'); 
