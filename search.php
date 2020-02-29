<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
						<?php if ( have_posts() ) : ?>
							<header class="page-header no-thumbnail">
								<h1 class="title page-header page-title">
									<?php
									/* translators: %s: search query. */
									printf( esc_html__( 'Search Results for: %s', 'game-dev-portfolio' ), '<span>' . get_search_query() . '</span>' );
									?>
								</h1>
							</header>

							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'search' );

							endwhile;

							game_dev_portfolio_pagination();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
						?>
					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
		</div><!-- #content -->
	</section>
	<?php get_footer(); ?>
</body>
</html>
