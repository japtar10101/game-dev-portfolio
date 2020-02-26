<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package Game_Dev_Portfolio
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 * See: https://jetpack.com/support/content-options/
 */
function game_dev_portfolio_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'game_dev_portfolio_infinite_scroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Add theme support for Content Options.
	add_theme_support( 'jetpack-content-options', array(
		'post-details'    => array(
			'stylesheet' => 'game-dev-portfolio-style',
			'date'       => '.posted-on',
			'categories' => '.cat-links',
			'tags'       => '.tags-links',
			'author'     => '.byline',
			'comment'    => '.comments-link',
		),
		'featured-images' => array(
			'archive'    => true,
			'post'       => true,
			'page'       => true,
		),
	) );
}
add_action( 'after_setup_theme', 'game_dev_portfolio_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function game_dev_portfolio_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
			get_template_part( 'template-parts/content', 'search' );
		else :
			get_template_part( 'template-parts/content', get_post_type() );
		endif;
	}
}

/**
 * Adjusts the button's class so Bulma styling takes over.
 *
 * @param string $class contact form submit button class.
 * @return string $class Bulma button classes appended.
 */
function game_dev_portfolio_contact_form_submit_button_class( string $class  ) {
	$class  .= ' button is-link is-outlined';
	return $class;
}
add_filter( 'jetpack_contact_form_submit_button_class', 'game_dev_portfolio_contact_form_submit_button_class' );

/**
 * Take over HTML of the Jetpack Contact Form, the Bulma way.
 *
 * @param string $rendered_field Contact Form HTML output.
 * @param string $field_label Field label.
 * @param int|null $id Post ID.
 * @return string $r Contact Form HTML output.
 */
function game_dev_portfolio_contact_form_field_html( $rendered_field, $field_label, $post_id  ) {
	// $rendered_field  = '<p class="notification">Mua, ha, ha, I took over!</p>' . $rendered_field;
	return $rendered_field;
}
add_filter( 'grunion_contact_form_field_html', 'game_dev_portfolio_contact_form_field_html', 10, 3 );
