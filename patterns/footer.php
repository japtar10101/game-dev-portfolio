<?php
/**
 * Title: Footer, 1 column
 * Slug: game-dev-portfolio/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: A Bulma-styled footer section with 1 column.
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group footer">
	<!-- wp:group {"align":"wide"} -->
	<div class="wp-block-group alignwide">
		<!-- wp:paragraph {"align":"center","fontSize":"small","style":{"spacing":{"margin":{"top":"0"}}}} -->
		<p class="has-contrast-2-color has-text-color has-link-color has-small-font-size has-text-centered" style="margin-block-start:0;">
		<?php
			$starting_year = '2008';
			$author_name = 'Taro Omiya';
			echo sprintf(
				/* Translators: © 2008 - 2024 Taro Omiya */
				esc_html__( '&copy; %1$s - %2$s %3$s', 'game-dev-portfolio' ),
				$starting_year, date('Y'), $author_name
			);
			?>
		</p>
		<!-- /wp:paragraph -->
		<!-- wp:paragraph {"align":"center","fontSize":"small","style":{"spacing":{"margin":{"top":"0"}}}} -->
		<p class="has-contrast-2-color has-text-color has-link-color has-small-font-size has-text-centered" style="margin-block-start:0;">
		<?php
			/* Translators: WordPress link. */
			$wordpress_link = '<a href="' . esc_url( __( 'https://wordpress.org', 'game-dev-portfolio' ) ) . '" rel="nofollow">WordPress</a>';
			echo sprintf(
				/* Translators: Designed with WordPress */
				esc_html__( 'Designed with %1$s', 'game-dev-portfolio' ),
				$wordpress_link
			);
			?>
		</p>
		<!-- /wp:paragraph -->
		<!-- wp:paragraph {"align":"center","fontSize":"small","style":{"spacing":{"margin":{"top":"0"}}}} -->
		<p class="has-contrast-2-color has-text-color has-link-color has-small-font-size has-text-centered" style="margin-block-start:0;">
		<?php
			/* Translators: Game Dev Portfolio theme link. */
			$theme_link = '<a href="' . esc_url( __( 'https://github.com/japtar10101/game-dev-portfolio', 'game-dev-portfolio' ) ) . '" rel="nofollow">Game Dev Portfolio</a>';
			/* Translators: Taro Omiya link. */
			$author_link = '<a href="' . esc_url( __( 'https://taroomiya.com', 'game-dev-portfolio' ) ) . '" rel="nofollow">Taro Omiya</a>';
			echo sprintf(
				/* Translators: Designed with WordPress */
				esc_html__( 'Theme: %1$s by %2$s', 'game-dev-portfolio' ),
				$theme_link, $author_link
			);
			?>
		</p>
		<!-- /wp:paragraph -->
		<!-- wp:paragraph {"align":"center","fontSize":"small","style":{"spacing":{"margin":{"top":"0"}}}} -->
		<p class="has-contrast-2-color has-text-color has-link-color has-small-font-size has-text-centered" style="margin-block-start:0;">
		<?php
			/* Translators: Bulma link. */
			$bulma_link = '<a href="' . esc_url( __( 'https://bulma.io', 'game-dev-portfolio' ) ) . '" rel="nofollow">Bulma</a>';
			echo sprintf(
				/* Translators: Styled by Bulma */
				esc_html__( 'Styled by %1$s', 'game-dev-portfolio' ),
				$bulma_link
			);
			?>
		</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
