<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Game_Dev_Portfolio
 */
$article_class = 'content';
if ( !is_singular() ) {
	$article_class .= ' listed-post';
}
$header_class = 'entry-header';
if ( has_post_thumbnail() ) {
	$header_class .= ' with-thumbnail';
} else {
	$header_class .= ' no-thumbnail';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $article_class ); ?>>
	<header class="<?php echo esc_attr( $header_class ); ?>">
		<?php
		game_dev_portfolio_post_thumbnail();
		if ( is_singular() ) {
			the_title( '<h1 class="title entry-title">', '</h1>' );
		} else {
			the_title( '<h2 class="title entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}

		if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta subtitle">
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

		// First check if this is just a single post
		if ( is_singular() ) :
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'game-dev-portfolio' ),
				'after'  => '</div>',
			) );
		endif;
		?>
		<small>
			<?php game_dev_portfolio_entry_footer(); ?>
		</small>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
