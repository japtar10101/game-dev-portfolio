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
				<div id="primary" class="content-area column is-three-quarters">
					<main id="main" class="site-main" role="main">
						<?php
						$showing_posts = have_posts();
						if ( $showing_posts ) :

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
						else :

							get_template_part( 'template-parts/content', 'none' );
						endif;
						?>
					</main><!-- #main -->
				<?php if ( $showing_posts ) { game_dev_portfolio_pagination(); } ?>
				</div><!-- #primary -->
			</div>
		</div><!-- #content -->
	</section>
	<?php get_footer(); ?>
</body>
</html>
