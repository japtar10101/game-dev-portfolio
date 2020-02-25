<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Game_Dev_Portfolio
 */
game_dev_portfolio_post_thumbnail( array (
	'size' => 'medium',
	'class_link' => 'post-thumbnail image',
	'class_caption' => 'caption title',
	'enable_tab_select' => true,
	'caption_text' => get_the_title()
) );
?>
