<?php
/**
 * Game Dev Portfolio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Game_Dev_Portfolio
 */

if ( ! function_exists( 'game_dev_portfolio_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function game_dev_portfolio_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Game Dev Portfolio, use a find and replace
		 * to change 'game-dev-portfolio' to the name of your theme in all the template files.
		 */
		load_child_theme_textdomain( 'game-dev-portfolio', get_template_directory() . '/languages' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		// add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		// add_theme_support( 'post-thumbnails' );
		// set_post_thumbnail_size( 2048, 650, true ); // default Post Thumbnail dimensions (cropped)
	}
endif;
add_action( 'after_setup_theme', 'game_dev_portfolio_setup' );

/**
 * Enqueue scripts and styles.
 */
function game_dev_portfolio_scripts() {
	// Stylesheets go here.
	wp_enqueue_style( 'font-awesome', '//use.fontawesome.com/releases/v6.6.0/css/all.css', false, '6.6.0');
	wp_enqueue_style( 'game-dev-portfolio-google-fonts', '//fonts.googleapis.com/css2?family=Raleway&family=Lato:wght@700&display=swap', false);
	// wp_enqueue_style( 'bulma', '//cdn.jsdelivr.net/npm/bulma@1.0.1/css/bulma.min.css', false, '1.1.0');
	wp_enqueue_script( 'game-dev-portfolio-masonry', '//unpkg.com/masonry-layout@4.2.2/dist/masonry.pkgd.min.js', false, '4.2.2' );
}
add_action( 'wp_enqueue_scripts', 'game_dev_portfolio_scripts' );

/**
 * Register block styles.
 */

 if ( ! function_exists( 'game_dev_portfolio_block_styles' ) ) :
	/**
	 * Register custom block styles
	 *
	 * @since Game Dev Portfolio 2024.8
	 * @return void
	 */
	function game_dev_portfolio_block_styles() {

		register_block_style(
			'core/group',
			array(
				'name'         => 'grid-sidebar',
				'label'        => __( 'Grid With Sidebar', 'game_dev_portfolio' ),
				/*
				 * Styles for the custom Grid block
				 * FIXME: make normal flex stack for mobile
				 */
				'inline_style' => '
				.is-style-grid-sidebar {
					display: grid;
					grid-template:
						"logo content" 20vw
						"sidebar content" auto
						/ 20vw 1fr;
				}',
			)
		);

		register_block_style(
			'core/group',
			array(
				'name'         => 'logo',
				'label'        => __( 'Logo', 'game_dev_portfolio' ),
				/*
				 * Styles for the Logo cell in Grid block
				 * FIXME: hide for mobile
				 */
				'inline_style' => '
				.is-style-logo {
					grid-area: logo;
				}',
			)
		);

		register_block_style(
			'core/group',
			array(
				'name'         => 'sidebar',
				'label'        => __( 'Sidebar', 'game_dev_portfolio' ),
				/*
				 * Styles for the Sidebar cell in Grid block
				 * FIXME: hide for mobile
				 */
				'inline_style' => '
				.is-style-sidebar {
					grid-area: sidebar;
					height: fit-content;
					position: -webkit-sticky !important;
					position: sticky !important;
					top: var(--wp--style--block-gap);
				}',
			)
		);

		register_block_style(
			'core/group',
			array(
				'name'         => 'content',
				'label'        => __( 'Content', 'game_dev_portfolio' ),
				/*
				 * Styles for the Full-Height Content cell in Grid block
				 * FIXME: remove references to grid for mobile
				 */
				'inline_style' => '
				.is-style-content {
					grid-area: content;
					max-width: 100% !important;
				}',
			)
		);

	}
endif;

add_action( 'init', 'game_dev_portfolio_block_styles' );
?>
