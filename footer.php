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
	<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
		<div class="container site-info content">
			<div class="tile is-ancestor">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div>
		</div><!-- .site-info -->
	<?php endif; ?>
	<div class="content">
		<p>
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf(
				esc_html__( 'Proudly powered by %s', 'game-dev-portfolio' ),
				get_game_dev_portfolio_link('Wordpress', 'https://wordpress.org/')
			);
			echo '<br />';

			/* translators: %s: Theme name, i.e. Game Dev Portfolio. */
			printf(
				esc_html__( 'Theme: %s by %s', 'game-dev-portfolio' ),
				get_game_dev_portfolio_link('Game Dev Portfolio', 'https://github.com/japtar10101/game-dev-portfolio'),
				get_game_dev_portfolio_link('Taro Omiya', 'https://www.taroomiya.com/')
			);
			echo '<br />';

			/* translators: %s: CSS library name, i.e. Bulma. */
			printf(
				esc_html__( 'Styled by %s', 'game-dev-portfolio' ),
				get_game_dev_portfolio_link('Bulma', 'https://bulma.io/')
			);
			echo '<br />';

			/* translators: %s: Icon library name, i.e. Bulma. */
			printf(
				esc_html__( 'Icons by %s', 'game-dev-portfolio' ),
				get_game_dev_portfolio_link('FontAwesome', 'https://fontawesome.com/')
			);
			?>
		</p>
	</div>
	<?php wp_footer(); ?>
</footer>
