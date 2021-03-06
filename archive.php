<?php
/**
 * The template for displaying archive pages
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
	<?php get_template_part( 'navbar' ); ?>
	<section class="site section">
		<div id="content" class="site-content container">
			<!-- Start columns here -->
			<div class="columns">

				<!-- Left column (sidebar) here -->
				<?php get_sidebar(); ?>

				<!-- Right column (content) here -->
				<div id="primary" class="content-area column is-three-quarters">
					<main id="main" class="site-main content" role="main">
						<?php
						$showing_posts = have_posts();
						if ( $showing_posts ) :
						?>
							<header class="page-header no-thumbnail">
								<?php
								the_archive_title( '<h1 class="title page-title">', '</h1>' );
								the_archive_description( '<div class="subtitle archive-description">', '</div>' );
								?>
							</header>

							<?php 
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
				<?php if( $showing_posts ) { game_dev_portfolio_pagination(); } ?>
				</div><!-- #primary -->
			</div>
		</div><!-- #content -->
	</section>
	<?php get_footer(); ?>
</body>
</html>
