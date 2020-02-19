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
	<?php get_template_part( 'navbar' ); ?>
	<section class="site section">
		<div id="content" class="site-content container">
			<!-- Start columns here -->
			<div class="columns">

				<!-- Left column (sidebar) here -->
				<?php get_sidebar(); ?>

				<!-- Right column (content) here -->
				<div id="primary" class="content-area column is-three-quarters">
					<main id="main" class="site-main" role="main">

						<article class="error-404 not-found content">
							<header class="entry-header">
								<h1 class="title page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'game-dev-portfolio' ); ?></h1>
							</header>

							<div class="page-content">
								<p>
									<?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'game-dev-portfolio' ); ?>
								</p>
								<?php get_search_form(); ?>
							</div><!-- .page-content -->
							<hr />
							<div class="columns">
								<div class="column">
									<?php the_widget( 'WP_Widget_Pages' ); ?>
								</div>
								<div class="column">
									<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
								</div>
								<div class="column">
									<?php the_widget( 'WP_Widget_Categories' ); ?>
								</div>
								<div class="column">
									<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
								</div>
							</div><!-- .columns -->
						</article><!-- .error-404 -->
					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
		</div><!-- #content -->
	</section>
	<?php get_footer(); ?>
</body>
</html>
