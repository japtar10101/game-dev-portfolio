<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Game_Dev_Portfolio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content' ); ?>>
	<?php if ( is_front_page() ) : ?>
		<header class="entry-header with-thumbnail">
			<?php
			// Print the custom header
			the_custom_header_markup();
			the_title( '<h1 class="title entry-title">', '</h1>' );
			?>
		</header><!-- .entry-header -->
	<?php elseif ( has_post_thumbnail() ) : ?>
		<header class="entry-header with-thumbnail">
			<?php
			// Print the page's header
			game_dev_portfolio_post_thumbnail();
			the_title( '<h1 class="title entry-title">', '</h1>' );
			?>
		</header><!-- .entry-header -->
	<?php else : ?>
		<header class="entry-header no-thumbnail">
			<?php the_title( '<h1 class="title entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'game-dev-portfolio' ),
			'after'  => '</div>',
		) );

		if ( get_edit_post_link() ) :
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'game-dev-portfolio' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<p class="entry-footer edit-link"><small>',
				'</small></p>'
			);
		endif;
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
