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
		'type'           => 'scroll',
		'container'      => 'main',
		'render'         => 'game_dev_portfolio_infinite_scroll_render',
		'footer'         => false,
		'footer_widgets' => array( 'footer-top', 'footer-bottom', ),
		'wrapper'        => false
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
		if ( is_search() ) {
			get_template_part( 'template-parts/content', 'search' );
		} else if ( is_post_type_archive( 'jetpack-portfolio' ) ) {
			get_template_part( 'template-parts/content', 'portfolio-preview' );
		} else {
			get_template_part( 'template-parts/content', get_post_type() );
		}
	}
}

/**
 * Adjusts the button's class so Bulma styling takes over.
 *
 * @param string $class contact form submit button class.
 * @return string $class Bulma button classes appended.
 */
function game_dev_portfolio_contact_form_submit_button_class( string $class  ) {
	$class  .= ' button';
	return $class;
}
add_filter( 'jetpack_contact_form_submit_button_class', 'game_dev_portfolio_contact_form_submit_button_class' );

if (!function_exists ('game_dev_portfolio_contact_form_class_updater')) {
	/**
	 * Helper function to replace all tag's class within a DOM
	 * 
	 * @param string $dom base HTML DOM document
	 * @param string $tag tag to filter contrls by
	 * @param string $classes_to_append classes to append to tags
	 * @param string $classes_to_remove_pattern classes to remove from tags
	 */
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

if (!function_exists ('game_dev_portfolio_contact_form_get_left_icon')) {
	/**
	 * Helper function to create a DOM containing a small icon
	 * 
	 * @param string $dom base HTML DOM document
	 * @param string $icon a font-awesome icon, e.g. 'fas fa-envelope'
	 */
	function game_dev_portfolio_contact_form_get_left_icon( $dom, $icon ) {
		// Create an icon
		$icon_node = $dom->createElement( 'i' );
		$icon_node->setAttribute( 'class', esc_attr( $icon ) );

		// Create a span
		$span_node = $dom->createElement( 'span' );
		$span_node->setAttribute( 'class', 'icon is-small is-left' );

		// Nest the icon into the span, and return it
		$span_node->appendChild( $icon_node );
		return $span_node;
	}
}

if (!function_exists ('game_dev_portfolio_contact_form_input_updater')) {
	/**
	 * Helper function to replace all inputs within a DOM
	 * 
	 * @param string $dom base HTML DOM document
	 */
	function game_dev_portfolio_contact_form_input_updater( $dom ) {
		// Look for all inputs
		$all_nodes = $dom->getElementsByTagName( 'input' );
		foreach( $all_nodes as $input_node ) {

			// Check the type of the input
			$input_type = $input_node->attributes->getNamedItem( 'type' );
			if( $input_type && ( $input_type->value != 'radio' ) && ( $input_type->value != 'checkbox' ) ) {

				// Create a div tag
				$div_node = $dom->createElement( 'div' );

				// Set the class to the new div tag
				$classes = 'control';
				$span_node = null;
				if( $input_type->value == 'email' ) {

					// If email, append email icon
					$classes .= ' has-icons-left';
					$span_node = game_dev_portfolio_contact_form_get_left_icon( $dom, 'fas fa-envelope' );
				} else if( $input_type->value == 'url' ) {

					// If url, append globe icon
					$classes .= ' has-icons-left';
					$span_node = game_dev_portfolio_contact_form_get_left_icon( $dom, 'fas fa-globe' );
				} else if( $input_type->value == 'tel' ) {

					// If phone #, append phone icon
					$classes .= ' has-icons-left';
					$span_node = game_dev_portfolio_contact_form_get_left_icon( $dom, 'fas fa-phone' );
				} else {

					// Grab the classes from the input
					$check_class = $input_node->attributes->getNamedItem( 'class' );

					// Check if the class contains the word, "name"
					if( $check_class ) {
						if( strpos( $check_class->value, 'name') !== false ) {
							// If so, append username icon
							$classes .= ' has-icons-left';
							$span_node = game_dev_portfolio_contact_form_get_left_icon( $dom, 'fas fa-user-circle' );
						} else if( strpos( $check_class->value, 'date') !== false ) {
							// If so, append username icon
							$classes .= ' has-icons-left';
							$span_node = game_dev_portfolio_contact_form_get_left_icon( $dom, 'fas fa-calendar' );
						}
					}
				}

				// Update the div node class
				$div_node->setAttribute( 'class', esc_attr( $classes ) );

				if( ( $input_type->value == 'text' ) || ( $input_type->value == 'email' ) || ( $input_type->value == 'url' ) || ( $input_type->value == 'tel' ) ) {
					// Grab the classes from the input
					$classes = $input_node->attributes->getNamedItem( 'class' );

					// Verify the attribute exists, and append input
					// FIXME: adjust the attributes accordingly
					if( $classes ) {
						$classes->value .= ' input';
					} else {
						$input_node->setAttribute( 'class', 'input' );
					}
				}

				// Keep a reference to the parent node of this input
				$parent_node = $input_node->parentNode;

				// Replace the parent node
				$parent_node->replaceChild( $div_node, $input_node );

				// Append the input to this child
				$div_node->appendChild( $input_node );
				if( $span_node ) {
					// Also append the icon, if a corresponding one exists.
					$div_node->appendChild( $span_node );
				}
			}
		}
	}
}

if (!function_exists ('game_dev_portfolio_contact_form_textarea_updater')) {
	/**
	 * Helper function to replace all textarea within a DOM
	 * 
	 * @param string $dom base HTML DOM document
	 * @param int $num_rows default number of rows to start with
	 */
	function game_dev_portfolio_contact_form_textarea_updater( $dom, $num_rows ) {
		// Look for all inputs
		$all_nodes = $dom->getElementsByTagName( 'textarea' );

		foreach( $all_nodes as $textarea_node ) {

			// Check the rows attribute
			$textarea_rows = $textarea_node->attributes->getNamedItem( 'rows' );
			if( $textarea_rows ) {
				// Change its value
				$textarea_rows->value = esc_attr( $num_rows );
			} else {
				// Add its value
				$textarea_node->setAttribute( 'rows', esc_attr( $num_rows ) );
			}
			
			// Create a div tag
			$div_node = $dom->createElement( 'div' );
			
			// Update the div node class
			$div_node->setAttribute( 'class', 'control' );

			// Keep a reference to the parent node of this input
			$parent_node = $textarea_node->parentNode;

			// Replace the parent node
			$parent_node->replaceChild( $div_node, $textarea_node );

			// Append the input to this child
			$div_node->appendChild( $textarea_node );
		}
	}
}

if ( !function_exists ('game_dev_portfolio_contact_form_select_updater') ) {
	/**
	 * Helper function to replace all select within a DOM
	 * 
	 * @param string $dom base HTML DOM document
	 */
	function game_dev_portfolio_contact_form_select_updater( $dom ) {
		// Look for all inputs
		$all_nodes = $dom->getElementsByTagName( 'select' );

		foreach( $all_nodes as $select_node ) {

			// Create a div tag
			$div_node = $dom->createElement( 'div' );
			$div_node->setAttribute( 'class', 'control' );

			// Embed a span node in this div node
			$span_node = $dom->createElement( 'span' );
			$span_node->setAttribute( 'class', 'select' );
			$div_node->appendChild( $span_node );

			// Keep a reference to the parent node of this input
			$parent_node = $select_node->parentNode;

			// Replace the parent node
			$parent_node->replaceChild( $div_node, $select_node );

			// Append the input to this child
			$span_node->appendChild( $select_node );
		}
	}
}

if ( !function_exists ('game_dev_portfolio_contact_form_field_html') ) {
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

		// Update all the inputs
		game_dev_portfolio_contact_form_input_updater( $dom );

		// Update all the textareas
		game_dev_portfolio_contact_form_textarea_updater( $dom, 5 );

		// Update all selects
		game_dev_portfolio_contact_form_select_updater( $dom );
		return $dom->saveHTML();
	}
}
add_filter( 'grunion_contact_form_field_html', 'game_dev_portfolio_contact_form_field_html', 10, 3 );

if ( !function_exists ('game_dev_portfolio_infinite_scroll_archive_supported') ) {
	/**
	 * Force portfolio page to not support infinite scroll. It messes the masonry stuff.
	 */
	function game_dev_portfolio_infinite_scroll_archive_supported( $supported, $settings  ) {
		if( is_post_type_archive( 'jetpack-portfolio' ) ) {
			$supported = false;
		}
		return $supported;
	}
}
add_filter( 'infinite_scroll_archive_supported', 'game_dev_portfolio_infinite_scroll_archive_supported', 10, 2 );

if ( !function_exists ('game_dev_portfolio_custom_image') ) {
	/**
	 * Force portfolio page to not support infinite scroll. It messes the masonry stuff.
	 */
	function game_dev_portfolio_custom_image( $media, $post_id, $args ) {
		if ( $media ) {
			return $media;
		} elseif( has_custom_logo() ) {
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			$url = apply_filters( 'jetpack_photon_url', esc_url( $logo ) );
	 
			return array( array(
					'type'  => 'image',
					'from'  => 'custom_fallback',
					'src'   => esc_url( $url ),
					'href'  => get_permalink( $post_id ),
			) );
		} else {
			return $media;
		}
	}
}
add_filter( 'jetpack_images_get_images', 'game_dev_portfolio_infinite_scroll_archive_supported', 10, 3 );
