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
								<?php get_search_form(); ?>
								<br />
								<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
								<br />
								<?php the_widget( 'WP_Widget_Archives', 'dropdown=1' ); ?>
								<br />
								<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
							</div><!-- .page-content -->
						</article><!-- .error-404 -->

					</main><!-- #main -->
				</div>
			</div>
		</div>
	</section><!-- #primary -->
	<?php get_footer(); ?>
</body>
</html>
