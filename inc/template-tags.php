<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Game_Dev_Portfolio
 */

if ( ! function_exists( 'game_dev_portfolio_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function game_dev_portfolio_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		// if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		// 	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		// }

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			// esc_html( get_the_date() ),
			// esc_attr( get_the_modified_date( DATE_W3C ) ),
			// esc_html( get_the_modified_date() )
			esc_html( get_the_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'game-dev-portfolio' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'game_dev_portfolio_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function game_dev_portfolio_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'game-dev-portfolio' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'game_dev_portfolio_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function game_dev_portfolio_entry_footer() {
		$add_separator = false;
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'game-dev-portfolio' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
			$add_separator = true;
		}

		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'game-dev-portfolio' ) );
			if ( $categories_list ) {
				if ( $add_separator ) {
					echo ' | ';
				}
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Categories: %1$s', 'game-dev-portfolio' ) . '</span>', $categories_list ); // WPCS: XSS OK.
				$add_separator = true;
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'game-dev-portfolio' ) );
			if ( $tags_list ) {
				if ( $add_separator ) {
					echo ' | ';
				}
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged: %1$s', 'game-dev-portfolio' ) . '</span>', $tags_list ); // WPCS: XSS OK.
				$add_separator = true;
			}
		}

		if ( $add_separator && get_edit_post_link() ) {
			echo ' | ';
		}
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'game-dev-portfolio' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'game_dev_portfolio_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function game_dev_portfolio_post_thumbnail( $args = array() ) {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		$args = wp_parse_args( $args );
	
		// Filters the comment form default arguments.
		$defaults = array(
			'size'               => 'post-thumbnail',
			'class_caption'      => 'caption',
			'class_link'         => 'post-thumbnail image',
			'enable_tab_select'  => false,
			'caption_text'       => ''
		);
		$args = wp_parse_args( $args, apply_filters( 'game_dev_portfolio_post_thumbnail_defaults', $defaults ) );
	
		// Ensure that the filtered args contain all required default values.
		$args = array_merge( $defaults, $args );

		if ( is_singular() ) :
			?>

			<div class="<?php echo esc_attr( $args['class_link'] ); ?>">
				<?php
				the_post_thumbnail( $args['size'] );

				// Check if there's any caption
				if ( $args['caption_text'] ) :
				?>
					<div class="<?php echo esc_attr( $args['class_caption'] ); ?>">
						<?php echo esc_attr( $args['caption_text'] ) ?>
					</div>
				<?php endif; ?>
			</div>

		<?php else : ?>

			<a class="<?php echo esc_attr( $args['class_link'] ); ?>" href="<?php the_permalink(); ?>" aria-hidden="true" <?php if( ! $args['enable_tab_select'] ) { echo 'tabindex="-1"'; } ?>>
				<?php
				// Print the thumbnail
				the_post_thumbnail( $args['size'], array(
					'alt' => the_title_attribute( array(
						'echo' => false,
					) ),
				) );

				// Check if there's any caption
				if ( $args['caption_text'] ) :
				?>
					<div class="<?php echo esc_attr( $args['class_caption'] ); ?>">
						<?php echo esc_attr( $args['caption_text'] ) ?>
					</div>
				<?php endif; ?>
			</a>

		<?php
		endif; // End is_singular().
	}
endif;
