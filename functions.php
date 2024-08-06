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
				'name'         => 'header',
				'label'        => __( 'Header', 'game_dev_portfolio' ),
				/*
				 * Styles for the Header
				 */
				'inline_style' => '
				.is-style-header {
					padding: 0 var(--wp--style--root--padding-right) 0 var(--wp--style--root--padding-left);
					box-shadow: var(--wp--preset--shadow--glow);
				}
				@media (min-width: 782px) {
					.is-style-header {
						display: none !important;
					}
				}',
			)
		);

		register_block_style(
			'core/group',
			array(
				'name'         => 'grid-sidebar',
				'label'        => __( 'Grid With Sidebar', 'game_dev_portfolio' ),
				/*
				 * Styles for the custom Grid block
				 */
				'inline_style' => '
				.is-style-grid-sidebar {
					display: grid;
					grid-template-areas:
						"logo feature"
						"sidebar content";
					grid-template-columns: max(25%, 14rem) auto;
					grid-auto-rows: max-content;
					gap: var(--wp--style--block-gap);
					justify-content: center;
					max-width: 1344px;
					margin-left: auto;
					margin-right: auto;
				}
				.is-style-grid-sidebar > div {
					margin: 0 !important;
				}
				@media (max-width: 781px) {
					.is-style-grid-sidebar {
						display: flex !important;
						flex-direction: column;
					gap: var(--wp--style--block-gap);
					}
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
				 */
				'inline_style' => '
				.is-style-logo {
					grid-area: logo;
					aspect-ratio: 1/1;
					width: 100%;
				}
				.is-style-logo img {
					width: 100% !important;
					height: 100% !important;
				}
				@media (max-width: 781px) {
					.is-style-logo {
						display: none !important;
					}
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
				 */
				'inline_style' => '
				.is-style-sidebar {
					grid-area: sidebar;
					height: fit-content;
					width: 100% !important;
					position: -webkit-sticky !important;
					position: sticky !important;
					top: calc(var(--wp--style--block-gap) + var(--wp-admin--admin-bar--position-offset, 0px));
					z-index: 5;
					box-shadow: var(--wp--preset--shadow--glow);
				}
				.is-style-sidebar form {
					width: 100% !important;
				}
				@media (max-width: 781px) {
					.is-style-sidebar {
						display: none !important;
					}
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
				 */
				'inline_style' => '
				.is-style-content {
					grid-area: content;
					max-width: 100% !important;
				}',
			)
		);

		register_block_style(
			'core/group',
			array(
				'name'         => 'content-tall',
				'label'        => __( 'Content, Tall', 'game_dev_portfolio' ),
				/*
				 * Styles for the Full-Height Content cell in Grid block
				 */
				'inline_style' => '
				.is-style-content-tall {
					grid-area: feature / feature / content / content;
					max-width: 100% !important;
				}',
			)
		);

		register_block_style(
			'core/group',
			array(
				'name'         => 'highlights',
				'label'        => __( 'Highlights', 'game_dev_portfolio' ),
				/*
				 * Styles for the highlights
				 */
				'inline_style' => '
				.is-style-highlights {
					width: 100% !important;
					border-radius: calc(var(--wp--style--block-gap) / 2);
				}',
			)
		);

		register_block_style(
			'core/group',
			array(
				'name'         => 'footer',
				'label'        => __( 'Footer', 'game_dev_portfolio' ),
				/*
				 * Styles for the footer
				 */
				'inline_style' => '
				.is-style-footer {
					padding-right: var(--wp--style--root--padding-right);
					padding-left: var(--wp--style--root--padding-left);
					box-shadow: var(--wp--preset--shadow--glow);
				}',
			)
		);

		register_block_style(
			'core/navigation',
			array(
				'name'         => 'segmented',
				'label'        => __( 'Segmented', 'game_dev_portfolio' ),
				/*
				 * Styles for vertical segments navigation
				 */
				'inline_style' => '
				.is-style-segmented {
					width: 100% !important;
				}
				.is-style-segmented ul {
					gap: 0;
				}
				.is-style-segmented ul li {
					width: 100%;
					border-top: 1px solid var(--wp--preset--color--contrast-3);
				}
				.is-style-segmented ul li:last-child {
					border-bottom: 1px solid var(--wp--preset--color--contrast-3);
				}
				.is-style-segmented a {
					width: 100%;
					padding: calc(var(--wp--style--block-gap) / 2) 0;
					-webkit-transition-duration: 0.3s !important;
					transition-duration: 0.3s !important;
					-webkit-transition-property: transform;
					transition: transform;
				}
				.is-style-segmented a:hover, .is-style-segmented a:focus, .is-style-segmented a:active {
  				-webkit-transform: translateX(0.6rem);
  				transform: translateX(0.6rem);
				}',
			)
		);

		register_block_style(
			'core/post-featured-image',
			array(
				'name'         => 'feature',
				'label'        => __( 'Feature Image', 'game_dev_portfolio' ),
				/*
				 * Styles for the Full-Height Content cell in Grid block
				 */
				'inline_style' => '
				.is-style-feature {
					grid-area: feature;
					width: 100% !important;
					max-width: 100% !important;
					margin: 0 !important;
					display: inline-block;
					overflow: visible;
				}
				.is-style-feature > div,
				.is-style-feature > img {
					max-width: 100% !important;
					object-fit: cover;
					border-radius: calc(var(--wp--style--block-gap) / 2);
				}
				@media (max-width: 781px) {
					.is-style-feature {
						min-height: inherit;
						max-height: 20vw !important;
					}
					.is-style-feature > div,
					.is-style-feature > img {
						max-height: 20vw !important;
					}
				}',
			)
		);

		register_block_style(
			'core/post-featured-image',
			array(
				'name'         => 'feature-wide',
				'label'        => __( 'Featured Wide Image', 'game_dev_portfolio' ),
				/*
				 * Styles for the Full-Height Content cell in Grid block
				 */
				'inline_style' => '
				.is-style-feature-wide {
					grid-area: logo / logo / feature / feature;
					width: 100% !important;
					max-width: 100% !important;
					height: 100% !important;
					max-height: 100% !important;
					margin: 0 !important;
				}
				.is-style-feature-wide > div,
				.is-style-feature-wide > img {
					max-height: 100% !important;
					object-fit: cover;
					border-radius: calc(var(--wp--style--block-gap) / 2);
				}
				@media (max-width: 781px) {
					.is-style-feature-wide {
						max-height: 20vw !important;
					}
					.is-style-feature-wide > div,
					.is-style-feature-wide > img {
						max-height: 20vw !important;
					}
				}',
			)
		);

	}
endif;

add_action( 'init', 'game_dev_portfolio_block_styles' );

/**
 * Register shortcodes.
 */

if ( ! function_exists( 'game_dev_portfolio_shortcodes' ) ) :
	/**
	 * Register custom shortcodes
	 *
	 * @since Game Dev Portfolio 2024.8
	 * @return void
	 */
	function game_dev_portfolio_shortcodes() {
		/**
		 * [year] returns the current year as a 4-digit string.
		 * @return string current year
		*/
		function current_year() {
			return date('Y');
		}
		add_shortcode( 'year', 'current_year' );
	}
endif;

add_action( 'init', 'game_dev_portfolio_shortcodes' );


/**
 * Remove templates.
 */

if ( ! function_exists( 'game_dev_portfolio_remove_templates' ) ) :
	/**
	 * Filter the theme page templates.
	 *
	 * @param array    $page_templates Page templates.
	 * @param WP_Theme $this           WP_Theme instance.
	 * @param WP_Post  $post           The post being edited, provided for context, or null.
	 * @return array (Maybe) modified page templates array.
	 */
	function game_dev_portfolio_remove_templates( $page_templates ) {
		// Add any templates to remove in this array
		$templates_to_remove = [
			'page-with-sidebar.php',
			'single-with-sidebar.php'
		];

		// Go remove them from the page templates array
		foreach ($templates_to_remove as $template) {
			if ( isset( $page_templates[$template] ) ) {
				unset( $page_templates[$template] );
			}
		}
		return $page_templates;
	}
endif;

add_filter( 'theme_page_templates', 'game_dev_portfolio_remove_templates' );
add_filter( 'theme_post_templates', 'game_dev_portfolio_remove_templates' );
?>
