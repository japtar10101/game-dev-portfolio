<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Game_Dev_Portfolio
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<nav class="column">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'game-dev-portfolio' ); ?></a>
	<div id="secondary" class="widget-area card menu">
		<div class="card-image">
			<figure class="site-branding image is-square">
				<?php the_custom_logo(); ?>
			</figure>
		</div>
		<div class="card-content sticky">
			<p class="title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a>
			</p>
			<?php
			$game_dev_portfolio_description = get_bloginfo( 'description', 'display' );
			if ( $game_dev_portfolio_description || is_customize_preview() ) :
			?>
				<p class="site-description subtitle">
					<?php echo $game_dev_portfolio_description; /* WPCS: xss ok. */ ?>
				</p>
			<?php
			endif;
			?>
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div>
	</div>
</nav>
