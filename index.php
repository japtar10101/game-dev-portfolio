<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Game_Dev_Portfolio
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<?php get_header(); ?>
</head>
<body <?php body_class(); ?>>
	<section id="page" class="site section">
		<div id="content" class="site-content container">
			<div class="columns">
				<nav class="column is-3">
					<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'game-dev-portfolio' ); ?></a>
					<div id="secondary" class="widget-area card menu">
						<div class="card-image">
							<figure class="site-branding image is-square">
								<?php the_custom_logo(); ?>
							</figure>
						</div>
						<div class="card-content">
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
							<?php get_sidebar(); ?>
						</div>
					</div>
				</nav>
				<div id="primary" class="content-area column">
					<main id="main" class="site-main content-area column">
						<?php
						if ( have_posts() ) :
							if ( is_home() && ! is_front_page() ) :
								?>
								<header>
									<h1 class="title page-title screen-reader-text"><?php single_post_title(); ?></h1>
								</header>
								<?php
							endif;

							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
								get_template_part( 'template-parts/content', get_post_type() );
							endwhile;

							the_posts_navigation();
						else :
							get_template_part( 'template-parts/content', 'none' );
						endif;
						?>
					</main><!-- #main -->
				</div>
			</div>
		</div>
	</section><!-- #primary -->
	<footer class="footer">
		<?php get_footer(); ?>
	</footer>
	</body>
</html>
