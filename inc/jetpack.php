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


/** Helper function to replace all tag's class within a DOM */
if (!function_exists ('game_dev_portfolio_contact_form_class_updater')) {
	function game_dev_portfolio_contact_form_class_updater($dom, $tag, $classes_to_append, $classes_to_remove_pattern = '' ) {
		
		// First, go through all the nodes with that tag from the DOM
		$all_nodes = $dom->getElementsByTagName( $tag );
		foreach( $all_nodes as $node ) {

			// Check if the node has a class attribute
			if( $node->hasAttributes() ) {

				// If so, just grab the attribute
				$classes = $node->attributes->getNamedItem( 'class' );

				// Verify the attribute exists
				if( $classes ) {

					// Remove classes using regex
					if( $classes_to_remove_pattern ) {
						$classes->value = preg_replace( $classes_to_remove_pattern, '', $classes->value );
					}

					// Append classes
					if( $classes_to_append ) {
						$classes->value .= ' ' . esc_attr( $classes_to_append );
					}
				} else if( $classes_to_append ) {

					// Set classes
					$node->setAttribute( 'class', $classes_to_append );
				}
			} else if( $classes_to_append ) {

				// Append classes
				$node->setAttribute( 'class', $classes_to_append );
			}
		}
	}
}

/**
 * Take over HTML of the Jetpack Contact Form, the Bulma way.
 *
 * @param string $rendered_field Contact Form HTML output.
 * @param string $field_label Field label.
 * @param int|null $id Post ID.
 * @return string Contact Form HTML output.
 */
function game_dev_portfolio_contact_form_field_html( $rendered_field, $field_label, $post_id  ) {
	$dom = new DOMDocument();
	$dom->loadHTML( $rendered_field );

	// Update the classes on the div tags with 'field' appended
	game_dev_portfolio_contact_form_class_updater( $dom, 'div', 'field' );

	// Update the classes on the label tags with
	// 'input', 'select', 'button', 'icon', and 'textarea' removed,
	// and 'label' appended
	game_dev_portfolio_contact_form_class_updater( $dom, 'label', '', '(input|select|button|icon|textarea)' );

	// Update the classes on the span tags with 'help' appended
	game_dev_portfolio_contact_form_class_updater( $dom, 'span', 'help' );

	return $dom->saveHTML();
}
add_filter( 'grunion_contact_form_field_html', 'game_dev_portfolio_contact_form_field_html', 10, 3 );
