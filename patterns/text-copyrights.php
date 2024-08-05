<?php
/**
 * Title: Copyrights and Links
 * Slug: game-dev-portfolio/text-copyrights
 * Categories: text, copyrights, about
 * Keywords: copyrights
 * Viewport width: 1200
 * Description: Text on copyrights.  Always displays the current year.
 */
?>

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">
	<?php
		echo sprintf(
			'© %1$s %2$s',
			date('Y'),
			esc_html( get_bloginfo('name') )
		);
	?>
</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">
	<?php
		/* Translators: About link placeholder */
		$wordpress_link = '<a href="https://wordpress.org" target="_blank" rel="noreferrer noopener">' . esc_html__( 'Wordpress', 'game-dev-portfolio' ) . '</a>';
		echo sprintf(
			/* Translators: About text placeholder */
			esc_html__( 'Powered by %1$s', 'game-dev-portfolio' ),
			$wordpress_link
		);
	?>
</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">
	<?php
		/* Translators: About link placeholder */
		$theme_link = '<a href="https://github.com/japtar10101/game-dev-portfolio" target="_blank" rel="noreferrer noopener">' . esc_html__( 'Game Dev Portfolio', 'game-dev-portfolio' ) . '</a>';
		echo sprintf(
			/* Translators: About text placeholder */
			esc_html__( 'Theme: %1$s', 'game-dev-portfolio' ),
			$theme_link
		);
	?>
</p>
<!-- /wp:paragraph -->
