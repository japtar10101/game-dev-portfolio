<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Game_Dev_Portfolio
 */

// First check if this is just a single post
if ( is_singular() ) : ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'content' ); ?>>
		<header class="entry-header">
			<?php
			game_dev_portfolio_post_thumbnail();
			the_title( '<h1 class="title entry-title">', '</h1>' );

		if ( 'post' === get_post_type() ) : ?>
			<div class="subtitle">
				<?php
				game_dev_portfolio_posted_on();
				game_dev_portfolio_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		</header><!-- .entry-header -->
		<br />
		<div class="entry-content">
			<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'game-dev-portfolio' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'game-dev-portfolio' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
	</article><!-- #post-<?php the_ID(); ?> -->
<?php
// Otherwise we're making a list of posts
else :
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'content entry-summary' ); ?>>
		<div class="entry-content">
			<?php
			if ( has_post_thumbnail() ) :
				game_dev_portfolio_post_thumbnail();
			?>
				<div class="embed-container">
					<div class="embed-content entry-summary">
			<?php else : ?>
				<div class="no-container entry-summary">
			<?php endif; ?>

			<?php the_title( '<h2 class="title entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="subtitle entry-meta">
					<?php
					game_dev_portfolio_posted_on();
					game_dev_portfolio_posted_by();
					?>
				</div>
			<?php endif; ?>

			<?php the_excerpt(); ?>

			<?php if ( has_post_thumbnail() ) : ?>
					</div>
				</div>
			<?php else : ?>
				</div>
			<?php endif; ?>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
<?php endif; ?>