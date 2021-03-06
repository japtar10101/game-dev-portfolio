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
					<main class="site-main content" role="main">
						<header class="page-header no-thumbnail">
							<h1 class="title page-title">
								<?php echo __('Portfolio', 'game-dev-portfolio'); ?>
							</h1>
							<div class="subtitle archive-description">
								<?php
								echo esc_html__('Click on an image to see more details.', 'game-dev-portfolio');
								?>
							</div>
						</header>
						<article id="main" class="mosaic buttons">
							<?php
							$showing_posts = have_posts();
							if ( $showing_posts ) :
							?>
								<?php 
								/* Start the Loop */
								while ( have_posts() ) :
									the_post();

									get_template_part( 'template-parts/content', 'portfolio-preview' );

								endwhile;
								?>
							<?php 
							else :
								echo '<hr />';
								get_template_part( 'template-parts/content', 'none' );

							endif;
							?>
						</article> <!-- #main -->
					</main>
				<?php if( $showing_posts ) { game_dev_portfolio_pagination(); } ?>
				</div><!-- #primary -->
			</div>
		</div><!-- #content -->
	</section>
	<?php get_footer( 'portfolio' ); ?>
</body>
</html>
