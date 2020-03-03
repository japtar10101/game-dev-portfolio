<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Game_Dev_Portfolio
 */

?>
<footer id="footer" class="footer has-text-centered">
	<?php if ( is_active_sidebar( 'footer-top' ) ) : ?>
		<!-- Footer Top row -->
		<div class="container content">
				<div id="footer-top-row" class="tile is-ancestor">
					<?php dynamic_sidebar( 'footer-top' ); ?>
				</div>
		</div>
	<?php endif; ?>

	<!-- Footer Info -->
	<div class="site-info container content">
		<p>
			<?php
			$copyright_text = get_theme_mod( 'game-dev-portfolio-footer-copyright', '&copy; [Year]' );
			if( $copyright_text ) {
				// Print the copyright below
				echo str_ireplace(
					'[Year]',
					date('Y'),
					esc_html__( $copyright_text, 'game-dev-portfolio' )
				);
				echo '<br />';
			}
			if( get_theme_mod( 'game-dev-portfolio-footer-display-wordpress', true ) ) {
				// Print powered by wordpress below
				/* translators: %s: CMS name, i.e. WordPress. */
				printf(
					esc_html__( 'Proudly powered by %s', 'game-dev-portfolio' ),
					get_game_dev_portfolio_link('Wordpress', 'https://wordpress.org/')
				);
				echo '<br />';
			}
			if( get_theme_mod( 'game-dev-portfolio-footer-display-theme', true ) ) {
				// Print theme by Taro below
				/* translators: %s: Theme name, i.e. Game Dev Portfolio. */
				printf(
					esc_html__( 'Theme: %s by %s', 'game-dev-portfolio' ),
					get_game_dev_portfolio_link('Game Dev Portfolio', 'https://github.com/japtar10101/game-dev-portfolio'),
					get_game_dev_portfolio_link('Taro Omiya', 'https://www.taroomiya.com/')
				);
				echo '<br />';
			}
			if( get_theme_mod( 'game-dev-portfolio-footer-display-styling', true ) ) {
				// Print stylings below
				/* translators: %s: CSS library name, i.e. Bulma. */
				printf(
					esc_html__( 'Styled by %s', 'game-dev-portfolio' ),
					get_game_dev_portfolio_link('Bulma', 'https://bulma.io/')
				);
				echo '<br />';
			}
			if( get_theme_mod( 'game-dev-portfolio-footer-display-icons', true ) ) {
				// Print icons below
				/* translators: %s: Icon library name, i.e. Bulma. */
				printf(
					esc_html__( 'Icons by %s', 'game-dev-portfolio' ),
					get_game_dev_portfolio_link('FontAwesome', 'https://fontawesome.com/')
				);
			}
			?>
		</p>
	</div><!-- .site-info -->

	<?php if ( is_active_sidebar( 'footer-bottom' ) ) : ?>
		<!-- Footer Bottom row -->
		<div class="container content">
				<div id="footer-bottom-row" class="tile is-ancestor">
					<?php dynamic_sidebar( 'footer-bottom' ); ?>
				</div>
		</div>
	<?php endif; ?>
</footer>

<!-- Wordpress Footer -->
<?php wp_footer(); ?>

<script type="text/javascript">
	( function( $ ) {

		// Construct a new masonry object.
		var $mosaic = $( '.mosaic' ).masonry({
			itemSelector: '.button',
			columnWidth: '.button',
			percentPosition: true,
			transitionDuration: '0s',
			// isAnimated: !Modernizr.csstransitions
		});

		// 0 = ready to run layout,
		// 1 = currently laying out,
		// 2 = currently laying out, have more items on queue
		// var loadState = 0;

		// Create a function to update the layout with new items (or not)
		var updateLayout = function( $newAppendedItems = false ) {

			// Check whether the argument is empty
			// console.log( 'updateLayout: newAppendedItems ' + $newAppendedItems); 
			if ( $newAppendedItems ) {

				// Collect the new buttons
				$mosaic.masonry( 'appended', $newAppendedItems );
			}

			// HACK: forcing loading for now, disregarding what the load state is
			$mosaic.masonry( 'layout' );

			// Check the load state
			// if ( loadState < 1 ) {

			// 	// Run the layout
			// 	loadState = 1;
			// 	// $mosaic.masonry( 'layout' );
			// } else {

			// 	// Change the state to queue the next layout
			// 	loadState = 2;
			// }
		};

		// layout Masonry after entries are loaded from Jetpack infinite scroll
		var currentPageRequest = 1;
		$( document.body ).on( 'post-load', function () {

			// Update page request number
			currentPageRequest += 1;

			// Append all the buttons, then run the layout
			// console.log( 'Called updateLayout from post-load'); 
			updateLayout( $( '.from-page-' + currentPageRequest ) );
		} );

		// layout Masonry after lazy image loading
		$( '.jetpack-lazy-image' ).on( 'load', function() {
			// Run the layout
			// console.log( 'Called updateLayout from jetpack-lazy-image' ); 
			updateLayout();
		});

		// Bind to the mosaic's layout complete event
		// $mosaic.on( 'layoutComplete', function() {

		// 	// console.log( 'On layoutComplete: state ' + loadState);
		// 	if( loadState > 1 ) {
		// 		// Run the layout again
		// 		loadState = 1;
		// 		$mosaic.masonry( 'layout' );
		// 	} else {
		// 		// Indicate the layout is complete
		// 		loadState = 0;
		// 	}
		// } );

		// Update the layout
		updateLayout();
	} )( jQuery );
</script>
