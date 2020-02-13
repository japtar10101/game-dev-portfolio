<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Game_Dev_Portfolio
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_header(); ?>
<body <?php body_class(); ?>>
	<section class="site section">
		<div id="content" class="site-content container">
				<!-- Start columns here -->
				<div class="columns">

					<!-- Left column (sidebar) here -->
					<?php get_sidebar(); ?>

					<!-- Right column (content) here -->
					<main id="main" class="site-main content-area column">

						<article class="error-404 not-found content">
							<h1 class="title page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'game-dev-portfolio' ); ?></h1>

							<div class="page-content">
								<p>
									<?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'game-dev-portfolio' ); ?>
								</p>
							</div><!-- .page-content -->
							<div class="tile is-ancestor">
								<div class="tile is-parent is-vertical">
									<div class="tile is-child">
										<?php get_search_form(); ?>
									</div>
									<div class="tile is-parent">
										<div class="tile is-child box">
											<?php the_widget( 'WP_Widget_Pages' ); ?>
										</div>
										<div class="tile is-child box">
											<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
										</div>
										<div class="tile is-child box">
											<?php the_widget( 'WP_Widget_Archives', 'dropdown=1' ); ?>
										</div>
										<div class="tile is-child box">
											<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
										</div>
									</div>
								</div>
							</div><!-- .tile -->
						</article><!-- .error-404 -->
					</main><!-- #main -->
				</div>
			</div>
		</div>
	</section><!-- #primary -->
	<?php get_footer(); ?>
</body>
</html>
