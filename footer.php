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
<footer class="footer">
	<div class="site-info content has-text-centered">
		<p>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'game-dev-portfolio' ) ); ?>">
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf( esc_html__( 'Powered by %s', 'game-dev-portfolio' ), 'WordPress' );
			?>
			</a>
			<span class="sep"> | </span>
			<a href="<?php echo esc_url( __( 'https://bulma.io/', 'game-dev-portfolio' ) ); ?>">
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf( esc_html__( 'Styled by %s', 'game-dev-portfolio' ), 'Bulma' );
			?>
			</a>
			<span class="sep"> | </span>
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			echo( esc_html__( 'Theme by Taro Omiya', 'game-dev-portfolio' ) );
			?>
		</p>
		<?php wp_footer(); ?>
	</div><!-- .site-info -->
</footer>
