<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Game_Dev_Portfolio
 */

// game_dev_portfolio_post_thumbnail( array (
// 	'size' => 'medium',
// 	'class_link' => 'post-thumbnail image',
// 	'class_caption' => 'caption title',
// 	'enable_tab_select' => true,
// 	'caption_text' => get_the_title()
// ) );
if ( has_post_thumbnail() ) :
?>
	<a id="portfolio-<?php the_ID(); ?>" class="with-thumbnail button hvr-grow" href="<?php the_permalink(); ?>">
		<figure class="image">
			<?php
			// Print the thumbnail
			the_post_thumbnail( 'medium', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
			<figcaption>
				<?php echo esc_attr( get_the_title() ); ?>
			</figcaption>
		</figure>
	</a>
<?php else : ?>
	<a id="portfolio-<?php the_ID(); ?>" class="no-thumbnail button hvr-grow" href="<?php the_permalink(); ?>">
		<?php echo esc_attr( get_the_title() ); ?>
	</a>
<?php endif; ?>
