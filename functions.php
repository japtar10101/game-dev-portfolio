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
		load_theme_textdomain( 'game-dev-portfolio', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1024, 325, true ); // default Post Thumbnail dimensions (cropped)

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'game-dev-portfolio' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'game_dev_portfolio_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 512,
			'width'       => 512,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/*
		 * Add support for editor styles.
		 */
		add_theme_support( 'editor-styles' );

		/*
		 * Adding editor styling support.
		 */
		add_editor_style( 'style-editor.css' );
	}
endif;
add_action( 'after_setup_theme', 'game_dev_portfolio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function game_dev_portfolio_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'game_dev_portfolio_content_width', 640 );
}
add_action( 'after_setup_theme', 'game_dev_portfolio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function game_dev_portfolio_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'game-dev-portfolio' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets to sidebar here.', 'game-dev-portfolio' ),
		'before_widget' => '<div id="%1$s" class="widget content %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'game-dev-portfolio' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets to footer here.', 'game-dev-portfolio' ),
		'before_widget' => '<div id="%1$s" class="widget content tile %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'game_dev_portfolio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function game_dev_portfolio_scripts() {
	// Stylesheets go here.
	wp_enqueue_style( 'font-awesome', '//use.fontawesome.com/releases/v5.12.1/css/all.css', false, '5.12.1', 'all');
	wp_enqueue_style( 'bulma', get_template_directory_uri() . '/assets/bulma/bulma.min.css', false, '0.8.0', 'all');
	wp_enqueue_style( 'game-dev-portfolio-style', get_stylesheet_uri() );

	wp_enqueue_script( 'game-dev-portfolio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'game-dev-portfolio-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'game_dev_portfolio_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Function to format the comment section
 */
function format_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li id="li-comment-<?php comment_ID() ?>" <?php comment_class('media'); ?>>

		<figure class="media-left comment-author vcard">
			<p class="image is-64x64">
				<?php echo get_avatar($comment, $size='48' ); ?>
			</p>
		</figure>

		<div class="media-content">
			<div id="comment-<?php comment_ID(); ?>" class="content">
				<p>
					<strong>
						<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
					</strong>
					<br />

					<?php if ($comment->comment_approved == '0') : ?>
						<small>
							<?php _e('Your comment is awaiting moderation.') ?>
						</small>
					<br />
					<?php endif; ?>

					<small class="comment-author vcard">
						<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
							<?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?>
						</a>
						<?php edit_comment_link(__('(Edit)'),'  ','') ?>
					</small>
					<br />

					<?php comment_text() ?>
				</p>
			</div>
		</div>

		<div class="media-right reply">
			<?php
			$reply_string = '<span class="icon is-small"><i class="fas fa-reply"></i></span> ' . esc_html__( 'Reply', 'game-dev-portfolio' );
			comment_reply_link(array_merge( $args, array('reply_text' => $reply_string, 'depth' => $depth, 'max_depth' => $args['max_depth'])))
			?>
		</div>
	</li>
<?php
}
