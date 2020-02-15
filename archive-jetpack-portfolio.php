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
	<section class="site section">
		<div id="content" class="site-content container">
				<!-- Start columns here -->
				<div class="columns">

					<!-- Left column (sidebar) here -->
					<?php get_sidebar(); ?>

					<!-- Right column (content) here -->
					<main id="main" class="site-main content-area column">
						<div class="content">
							<header class="page-header">
								<h1 class="title page-title">
									<?php echo __('Creative Portfolio', 'game-dev-portfolio'); ?>
								</h1>
								<div class="subtitle archive-description">
									<?php
									/* Translators: %s is the name of the blog */
									echo sprintf(
										__('A list of projects by %s are listed below:', 'game-dev-portfolio'),
										get_bloginfo( 'name' )
									);
									?>
								</div>
							</header>
							<?php if ( have_posts() ) : ?>
								<article class="content mosaic columns-4 columns-3-widescreen columns-3-desktop columns-2-tablet columns-1-mobile">
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
				</div>
			</div>
		</div>
	</section><!-- #primary -->
	<?php get_footer(); ?>
</body>
</html>
