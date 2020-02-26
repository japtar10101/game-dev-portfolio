<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Game_Dev_Portfolio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content' ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<header class="entry-header with-thumbnail">
			<?php game_dev_portfolio_post_thumbnail(); ?>
			<div class="embed-container">
				<div class="embed-content">
					<?php the_title( '<h2 class="title entry-title"><a href="%s" rel="bookmark">', '</a></h2>' ); ?>
				</div>
			</div>
		</header><!-- .entry-header -->
	<?php else : ?>
		<header class="entry-header no-thumbnail">
			<?php the_title( '<h2 class="title entry-title"><a href="%s" rel="bookmark">', '</a></h2>' ); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>

	<?php if ( 'post' === get_post_type() ) : ?>
		<div class="subtitle entry-meta">
			<?php
			game_dev_portfolio_posted_on();
			game_dev_portfolio_posted_by();
			?>
		</div><!-- .entry-meta -->
	<?php endif; ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<small>
			<?php game_dev_portfolio_entry_footer(); ?>
		</small>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
