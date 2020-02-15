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

	<header class="entry-header">
		<?php
		if ( has_post_thumbnail() ) :
			game_dev_portfolio_post_thumbnail();
		?>
			<div class="embed-container">
				<div class="embed-content">
					<?php the_title( '<h1 class="title entry-title">', '</h1>' ); ?>
				</div>
			</div>
		<?php
		else :
			the_title( '<h1 class="title entry-title">', '</h1>' );
		endif;
		?>
	</header><!-- .entry-header -->


	<?php the_title( sprintf( '<h2 class="title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	<?php if ( 'post' === get_post_type() ) : ?>
		<div class="subtitle entry-meta">
			<?php
			game_dev_portfolio_posted_on();
			game_dev_portfolio_posted_by();
			?>
		</div><!-- .entry-meta -->
	<?php endif; ?>

	<?php game_dev_portfolio_post_thumbnail(); ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php game_dev_portfolio_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
