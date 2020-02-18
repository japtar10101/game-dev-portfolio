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
<body <?php body_class( 'has-navbar-fixed-top' ); ?>>
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
						<div class="content">
							<header class="page-header">
								<h1 class="title page-title">
									<?php echo __('Portfolio', 'game-dev-portfolio'); ?>
								</h1>
								<div class="subtitle archive-description">
									<?php
									/* Translators: %s is the name of the blog */
									echo sprintf(
										__('Click on an image to see more details about the product.', 'game-dev-portfolio'),
										get_bloginfo( 'name' )
									);
									?>
								</div>
							</header>
							<?php if ( have_posts() ) : ?>
								<article class="content mosaic columns-3 columns-2-tablet columns-1-mobile">
									<?php 
									/* Start the Loop */
									while ( have_posts() ) :
										the_post();

										/*
										* Include the Post-Type-specific template for the content.
										* If you want to override this in a child theme, then include a file
										* called content-___.php (where ___ is the Post Type name) and that will be used instead.
										*/
										get_template_part( 'template-parts/content', 'portfolio-preview' );

									endwhile;
									the_posts_navigation();
									?>
								</article>
							<?php 
							else :
								echo '<hr />';
								get_template_part( 'template-parts/content', 'none' );

							endif;
							?>
						</div>
					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
		</div><!-- #content -->
	</section>
	<?php get_footer(); ?>
</body>
</html>
