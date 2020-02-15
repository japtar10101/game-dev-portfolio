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
	<div class="container site-info content">
		<div class="tile is-ancestor">
			<?php dynamic_sidebar( 'footer-1' ); ?>
			<div class="tile">
				<div class="content">
					<h2>
						<?php
						/* translators: %s: CMS name, i.e. WordPress. */
						echo( esc_html__( 'Portfolio Theme by Taro Omiya', 'game-dev-portfolio' ) );
						?>
					</h2>
					<p>
						<a href="<?php echo esc_url( __( 'https://bulma.io/', 'game-dev-portfolio' ) ); ?>">
							<?php
							/* translators: %s: CMS name, i.e. WordPress. */
							printf( esc_html__( 'Styled by %s', 'game-dev-portfolio' ), 'Bulma' );
							?>
						</a>
						<br />
						<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'game-dev-portfolio' ) ); ?>">
							<?php
							/* translators: %s: CMS name, i.e. WordPress. */
							printf( esc_html__( 'Powered by %s', 'game-dev-portfolio' ), 'WordPress' );
							?>
						</a>
					</p>
					<?php wp_footer(); ?>
				</div>
			</div>
		</div>
	</div><!-- .site-info -->
</footer>
