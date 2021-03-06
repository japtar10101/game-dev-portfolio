<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Game_Dev_Portfolio
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<hr />
<div id="comments" class="comments-area content">
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$game_dev_portfolio_comment_count = get_comments_number();
			if ( '1' === $game_dev_portfolio_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'A reply on &ldquo;%1$s&rdquo;', 'game-dev-portfolio' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s replies on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $game_dev_portfolio_comment_count, 'comments title', 'game-dev-portfolio' ) ),
					number_format_i18n( $game_dev_portfolio_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php game_dev_portfolio_comments_pagination(); ?>

		<div class="content comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
				'max_depth'  => 4,
				'type'       => 'comment',
				'callback'   => 'format_comment',
			) );
			?>
		</div><!-- .comment-list -->

		<?php game_dev_portfolio_comments_pagination(); ?>
		<hr />
		<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'game-dev-portfolio' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	// TODO: Switch to normal comment_form() function when it's overridden
	game_dev_portfolio_comment_form();
	?>

</div><!-- #comments -->
