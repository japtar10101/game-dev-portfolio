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
	<section class="site section">
		<div id="content" class="site-content container">
				<!-- Start columns here -->
				<div class="columns">

					<!-- Left column (sidebar) here -->
					<?php get_sidebar(); ?>

					<!-- Right column (content) here -->
					<main id="main" class="site-main content-area column">
						<?php if ( have_posts() ) : ?>

							<h1 class="title page-header page-title">
								<?php
								/* translators: %s: search query. */
								printf( esc_html__( 'Search Results for: %s', 'game-dev-portfolio' ), '<span>' . get_search_query() . '</span>' );
								?>
							</h1>

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
	<?php get_footer(); ?>
</body>
</html>
