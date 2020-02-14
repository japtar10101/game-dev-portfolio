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
	<header class="entry-header">
		<?php
		game_dev_portfolio_post_thumbnail();
		$end_header = get_edit_post_link();
		if ( $end_header ) :
			$end_header = ' <small><em><a href="' . $end_header . '">';
			$end_header .= sprintf(
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
			);
			$end_header .= '</a></em></small>';
		else :
			$end_header = '</h1>';
		endif;
		the_title( '<h1 class="title entry-title">', $end_header );
	?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'game-dev-portfolio' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
