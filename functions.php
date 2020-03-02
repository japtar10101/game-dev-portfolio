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
		// FIXME: actually use it
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'game-dev-portfolio' ),
		) );

		/*
		 * Enable support for Headers on the rest of the pages.
		 *
		 * @link https://codex.wordpress.org/Custom_Headers
		 */
		// FIXME: actually use it
		add_theme_support( 'custom-header', array(
			'width'                  => 1024,
			'height'                 => 325,
			'flex-height'            => true,
			'flex-width'             => true,
			'header-text'            => false,
			'uploads'                => true,
			'video'                  => true,
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
		 * Add support for wide.
		 */
		add_theme_support( 'align-wide' );

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
		'name'          => esc_html__( 'Top Sidebar', 'game-dev-portfolio' ),
		'id'            => 'sidebar-top',
		'description'   => esc_html__( 'Add widgets to sidebar here, between the site description and primary menu', 'game-dev-portfolio' ),
		'before_widget' => '<div id="%1$s" class="widget content %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Bottom Sidebar', 'game-dev-portfolio' ),
		'id'            => 'sidebar-bottom',
		'description'   => esc_html__( 'Add widgets to sidebar here, below the primary menu', 'game-dev-portfolio' ),
		'before_widget' => '<div id="%1$s" class="widget content %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Top Footer', 'game-dev-portfolio' ),
		'id'            => 'footer-top',
		'description'   => esc_html__( 'Add widgets to footer here, above copyrights.', 'game-dev-portfolio' ),
		'before_widget' => '<div id="%1$s" class="widget content tile is-child %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Bottom Footer', 'game-dev-portfolio' ),
		'id'            => 'footer-bottom',
		'description'   => esc_html__( 'Add widgets to footer here, below copyrights.', 'game-dev-portfolio' ),
		'before_widget' => '<div id="%1$s" class="widget content tile is-child %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
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
	wp_enqueue_style( 'hover', get_template_directory_uri() . '/assets/hover/hover.css', false, '2.3.2', 'all');
	wp_enqueue_style( 'game-dev-portfolio-style', get_stylesheet_uri() );

	wp_enqueue_script( 'game-dev-portfolio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'game-dev-portfolio-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	} else if( is_post_type_archive( 'jetpack-portfolio' ) && ! is_singular() ) {
		wp_enqueue_script( 'game-dev-portfolio-masonry', get_template_directory_uri() . '/assets/masonry/masonry.pkgd.min.js', array(), '4.2.2', true );
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
				<?php echo get_avatar($comment, $size='64' ); ?>
			</p>
		</figure>

		<div class="media-content">
			<div id="comment-<?php comment_ID(); ?>" class="content">
				<p>
					<strong>
						<?php printf('<cite class="fn">%s</cite>', get_comment_author_link()) ?>
					</strong>
					<br />

					<?php if ($comment->comment_approved == '0') : ?>
						<small>
							<?php _e('Your comment is awaiting moderation.', 'game-dev-portfolio') ?>
						</small>
					<br />
					<?php endif; ?>

					<small class="comment-author vcard">
						<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
							<?php printf(__('%1$s at %2$s', 'game-dev-portfolio'), get_comment_date(),  get_comment_time()) ?>
						</a>
						<?php edit_comment_link(__('(Edit)', 'game-dev-portfolio'),'  ','') ?>
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

/**
 * Function to retrieve HTML content for cancel comment reply link.
 * This is largely a copy-pasta from Wordpress itself
 */
if ( ! function_exists( 'game_dev_portfolio_get_cancel_comment_reply_link' ) ) :
	/**
	 * Retrieve HTML content for cancel comment reply link.
	 *
	 * @since 2.7.0
	 *
	 * @param string $text Optional. Text to display for cancel reply link. Default empty.
	 * @param string $class Optional. Apply classes to the link. Default empty.
	 * @return string
	 */
	function game_dev_portfolio_get_cancel_comment_reply_link( $text = '', $class = '' ) {
		if ( empty( $text ) ) {
			$text = __( 'Click here to cancel reply.', 'game-dev-portfolio');
		}

		$style = isset( $_GET['replytocom'] ) ? '' : ' style="display:none;"';
		$link  = esc_html( remove_query_arg( array( 'replytocom', 'unapproved', 'moderation-hash' ) ) ) . '#respond';

		$formatted_link = '<a rel="nofollow" id="cancel-comment-reply-link" href="' . $link . '" class="' . $class . '"' . $style . '>' . $text . '</a>';

		/**
		 * Filters the cancel comment reply link HTML.
		 *
		 * @since 2.7.0
		 *
		 * @param string $formatted_link The HTML-formatted cancel comment reply link.
		 * @param string $link           Cancel comment reply link URL.
		 * @param string $text           Cancel comment reply link text.
		 */
		return apply_filters( 'cancel_comment_reply_link', $formatted_link, $link, $text );
	}
endif;
add_action( 'after_setup_theme', 'game_dev_portfolio_get_cancel_comment_reply_link', 10, 2 );

if ( ! function_exists( 'game_dev_portfolio_comment_form' ) ) :
	/**
	 * Function to format the comment form
	 * This is largely a copy-pasta from Wordpress itself
	 */
	function game_dev_portfolio_comment_form( $args = array(), $post_id = null ) {

		// Check if the post ID argument has been provided
		if ( null === $post_id ) {

			// If not, grab the loaded post's ID
			$post_id = get_the_ID();

			// If the loaded posts still doesn't exist, skip this function entirely
			if ( ! $post_id ) {
				return;
			}
		}
	
		// Exit the function when comments for the post are closed.
		if ( ! comments_open( $post_id ) ) {
			/**
			 * Fires after the comment form if comments are closed.
			 *
			 * @since 3.0.0
			 */
			do_action( 'comment_form_comments_closed' );
	
			return;
		}
	
		$commenter     = wp_get_current_commenter();
		$user          = wp_get_current_user();
		$user_identity = $user->exists() ? $user->display_name : '';
	
		$args = wp_parse_args( $args );
		if ( ! isset( $args['format'] ) ) {
			$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
		}
	
		$req      = get_option( 'require_name_email' );
		$html_req = ( $req ? " required='required'" : '' );
		$html5    = 'html5' === $args['format'];
		$optional = __( ' (Optional)', 'game-dev-portfolio' );
	
		$fields = array(
			'author' => sprintf(
				/* Translators: 1. Label, "Name," 2. Cached author's name, 3. Required */
				'<div class="field is-horizontal"><div class="field-body">
					<div class="field">
						<p class="comment-form-author control has-icons-left">
							<input id="author" name="author" type="text" class="input control has-icons-left" placeholder="%1$s" value="%2$s" size="30" maxlength="245"%3$s />
							<span class="icon is-left">
								<i class="fas fa-user-circle"></i>
							</span>
						</p>
					</div>',
				__( 'Name', 'game-dev-portfolio' ) . ( $req ? '' : $optional ),
				esc_attr( $commenter['comment_author'] ),
				$html_req
			),
			'email'  => sprintf(
				/* Translators: 1. Label, "Email," 2. Cached author's email, 3. Required, 4. Field type */
					'<div class="field">
						<p class="comment-form-email field control has-icons-left">
							<input id="email" name="email" %4$s class="input control has-icons-left" placeholder="%1$s" value="%2$s" size="30" maxlength="100" aria-describedby="email-notes"%3$s />
							<span class="icon is-left">
								<i class="fas fa-envelope"></i>
							</span>
						</p>
					</div>
				</div></div>',
				__( 'Email', 'game-dev-portfolio' ) . ( $req ? '' : $optional ),
				esc_attr( $commenter['comment_author_email'] ),
				$html_req,
				( $html5 ? 'type="email"' : 'type="text"' )
			),
			'url'    => sprintf(
				/* Translators: 1. Label, "Email," 2. Cached author's email, 3. Field type */
				'<p class="comment-form-url field control has-icons-left">
					<input id="url" name="url" %3$s class="input control has-icons-left" placeholder="%1$s" value="%2$s" size="30" size="30" maxlength="200" />
					<span class="icon is-left">
						<i class="fas fa-globe"></i>
					</span>
				</p>',
				__( 'Website', 'game-dev-portfolio' ) . $optional,
				esc_attr( $commenter['comment_author_url'] ),
				( $html5 ? 'type="url"' : 'type="text"' )
			),
		);
	
		if ( has_action( 'set_comment_cookies', 'wp_set_comment_cookies' ) && get_option( 'show_comments_cookies_opt_in' ) ) {
			$consent = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
	
			$fields['cookies'] = sprintf(
				'<p class="comment-form-cookies-consent control">%s %s</p>',
				sprintf(
					'<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"%s />',
					$consent
				),
				sprintf(
					'<label for="wp-comment-cookies-consent">%s</label>',
					__( 'Save my name, email, and website in this browser for the next time I comment.', 'game-dev-portfolio' )
				)
			);
	
			// Ensure that the passed fields include cookies consent.
			if ( isset( $args['fields'] ) && ! isset( $args['fields']['cookies'] ) ) {
				$args['fields']['cookies'] = $fields['cookies'];
			}
		}
	
		/**
		 * Filters the default comment form fields.
		 *
		 * @since 3.0.0
		 *
		 * @param string[] $fields Array of the default comment fields.
		 */
		$fields = apply_filters( 'comment_form_default_fields', $fields );
	
		$defaults = array(
			'fields'               => $fields,
			'comment_field'        => sprintf(
				'<p class="comment-form-comment control"><textarea id="comment" name="comment" rows="2" maxlength="65525" required="required" class="textarea" placeholder="%s"></textarea></p>',
				__( 'Leave a message...', 'game-dev-portfolio' )
			),
			'must_log_in'          => sprintf(
				'<p class="must-log-in notification">%s</p>',
				sprintf(
					/* translators: %s: Login URL. */
					__( 'You must be <a href="%s">logged in</a> to post a comment.', 'game-dev-portfolio' ),
					/** This filter is documented in wp-includes/link-template.php */
					wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ), $post_id ) )
				)
			),
			'logged_in_as'         => sprintf(
				'<p class="logged-in-as notification">%s <small>- %s | %s</small></p>',
				sprintf(
					/* translators: %s: User name. */
					__( 'Logged in as <strong>%s</strong>', 'game-dev-portfolio' ),
					$user_identity
				),
				/* translators: %s: Edit user link. */
				sprintf(
					__( '<a href="%s">Edit Profile</a>', 'game-dev-portfolio' ),
					get_edit_user_link()
				),
				/* translators: %s: Logout URL. */
				sprintf(
					__( '<a href="%s">Log Out</a>', 'game-dev-portfolio' ),
					/** This filter is documented in wp-includes/link-template.php */
					wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ), $post_id ) )
				)
			),
			'comment_notes_before' => sprintf(
				'<p class="comment-notes notification">%s</p>',
				sprintf(
					'<span id="email-notes">%s</span>',
					__( 'Your email address will not be published.', 'game-dev-portfolio' )
				)
			),
			'comment_notes_after'  => '',
			'action'               => site_url( '/wp-comments-post.php' ),
			'id_form'              => 'commentform',
			'id_submit'            => 'submit',
			'class_form'           => 'comment-form field',
			'class_submit'         => 'submit control button is-link is-outlined',
			'class_cancel'         => 'cancel control button',
			'name_submit'          => 'submit',
			'title_reply'          => __( 'Add a Comment', 'game-dev-portfolio' ),
			/* translators: %s: Author of the comment being replied to. */
			'title_reply_to'       => __( 'Reply to %s', 'game-dev-portfolio' ),
			'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title">',
			'title_reply_after'    => '</h3>',
			'cancel_reply_before'  => '',
			'cancel_reply_after'   => '',
			'cancel_reply_link'    => __( 'Cancel', 'game-dev-portfolio' ),
			'label_submit'         => __( 'Post Comment', 'game-dev-portfolio' ),
			'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
			'submit_field'         => '<p class="form-submit field is-grouped">%1$s %2$s</p>',
			'format'               => 'xhtml',
		);
	
		/**
		 * Filters the comment form default arguments.
		 *
		 * Use {@see 'comment_form_default_fields'} to filter the comment fields.
		 *
		 * @since 3.0.0
		 *
		 * @param array $defaults The default comment form arguments.
		 */
		$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );
	
		// Ensure that the filtered args contain all required default values.
		$args = array_merge( $defaults, $args );
	
		// Remove aria-describedby from the email field if there's no associated description.
		if ( isset( $args['fields']['email'] ) && false === strpos( $args['comment_notes_before'], 'id="email-notes"' ) ) {
			$args['fields']['email'] = str_replace(
				' aria-describedby="email-notes"',
				'',
				$args['fields']['email']
			);
		}
	
		/**
		 * Fires before the comment form.
		 *
		 * @since 3.0.0
		 */
		do_action( 'comment_form_before' );
		?>
		<div id="respond" class="comment-respond content">
			<?php
			echo $args['title_reply_before'];
	
			comment_form_title( $args['title_reply'], $args['title_reply_to'] );
	
			echo $args['title_reply_after'];
	
			if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) :
	
				echo $args['must_log_in'];
				/**
				 * Fires after the HTML-formatted 'must log in after' message in the comment form.
				 *
				 * @since 3.0.0
				 */
				do_action( 'comment_form_must_log_in_after' );
	
			else :
	
				printf(
					'<form action="%s" method="post" id="%s" class="%s"%s>',
					esc_url( $args['action'] ),
					esc_attr( $args['id_form'] ),
					esc_attr( $args['class_form'] ),
					( $html5 ? ' novalidate' : '' )
				);
	
				/**
				 * Fires at the top of the comment form, inside the form tag.
				 *
				 * @since 3.0.0
				 */
				do_action( 'comment_form_top' );
	
				if ( is_user_logged_in() ) :
	
					/**
					 * Filters the 'logged in' message for the comment form for display.
					 *
					 * @since 3.0.0
					 *
					 * @param string $args_logged_in The logged-in-as HTML-formatted message.
					 * @param array  $commenter      An array containing the comment author's
					 *                               username, email, and URL.
					 * @param string $user_identity  If the commenter is a registered user,
					 *                               the display name, blank otherwise.
					 */
					echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity );
	
					/**
					 * Fires after the is_user_logged_in() check in the comment form.
					 *
					 * @since 3.0.0
					 *
					 * @param array  $commenter     An array containing the comment author's
					 *                              username, email, and URL.
					 * @param string $user_identity If the commenter is a registered user,
					 *                              the display name, blank otherwise.
					 */
					do_action( 'comment_form_logged_in_after', $commenter, $user_identity );
	
				else :
	
					echo $args['comment_notes_before'];
	
				endif;
	
				// Prepare an array of all fields, including the textarea.
				$comment_fields = $args['fields'] + array( 'comment' => $args['comment_field'] );
	
				/**
				 * Filters the comment form fields, including the textarea.
				 *
				 * @since 4.4.0
				 *
				 * @param array $comment_fields The comment fields.
				 */
				$comment_fields = apply_filters( 'comment_form_fields', $comment_fields );
	
				// Get an array of field names, excluding the textarea
				$comment_field_keys = array_diff( array_keys( $comment_fields ), array( 'comment' ) );
	
				// Get the first and the last field name, excluding the textarea
				$first_field = reset( $comment_field_keys );
				$last_field  = end( $comment_field_keys );
	
				foreach ( $comment_fields as $name => $field ) {
	
					if ( 'comment' === $name ) {
	
						/**
						 * Filters the content of the comment textarea field for display.
						 *
						 * @since 3.0.0
						 *
						 * @param string $args_comment_field The content of the comment textarea field.
						 */
						echo apply_filters( 'comment_form_field_comment', $field );
	
						echo $args['comment_notes_after'];
	
					} elseif ( ! is_user_logged_in() ) {
	
						if ( $first_field === $name ) {
							/**
							 * Fires before the comment fields in the comment form, excluding the textarea.
							 *
							 * @since 3.0.0
							 */
							do_action( 'comment_form_before_fields' );
						}
	
						/**
						 * Filters a comment form field for display.
						 *
						 * The dynamic portion of the filter hook, `$name`, refers to the name
						 * of the comment form field. Such as 'author', 'email', or 'url'.
						 *
						 * @since 3.0.0
						 *
						 * @param string $field The HTML-formatted output of the comment form field.
						 */
						echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
	
						if ( $last_field === $name ) {
							/**
							 * Fires after the comment fields in the comment form, excluding the textarea.
							 *
							 * @since 3.0.0
							 */
							do_action( 'comment_form_after_fields' );
						}
					}
				}
	
				$submit_button = sprintf(
					$args['submit_button'],
					esc_attr( $args['name_submit'] ),
					esc_attr( $args['id_submit'] ),
					esc_attr( $args['class_submit'] ),
					esc_attr( $args['label_submit'] )
				);

				$cancel_button = sprintf(
					'%s %s %s',
					$args['cancel_reply_before'],
					game_dev_portfolio_get_cancel_comment_reply_link( $args['cancel_reply_link'], $args['class_cancel'] ),
					$args['cancel_reply_after']
				);
	
				/**
				 * Filters the submit button for the comment form to display.
				 *
				 * @since 4.2.0
				 *
				 * @param string $submit_button HTML markup for the submit button.
				 * @param array  $args          Arguments passed to comment_form().
				 */
				$submit_button = apply_filters( 'comment_form_submit_button', $submit_button, $args );

				$submit_field = sprintf(
					$args['submit_field'],
					$submit_button . $cancel_button,
					get_comment_id_fields( $post_id )
				);
	
				/**
				 * Filters the submit field for the comment form to display.
				 *
				 * The submit field includes the submit button, hidden fields for the
				 * comment form, and any wrapper markup.
				 *
				 * @since 4.2.0
				 *
				 * @param string $submit_field HTML markup for the submit field.
				 * @param array  $args         Arguments passed to comment_form().
				 */
				echo apply_filters( 'comment_form_submit_field', $submit_field, $args );
	
				/**
				 * Fires at the bottom of the comment form, inside the closing </form> tag.
				 *
				 * @since 1.5.0
				 *
				 * @param int $post_id The post ID.
				 */
				do_action( 'comment_form', $post_id );
	
				echo '</form>';
	
			endif;
			?>
		</div><!-- #respond -->
		<?php
	
		/**
		 * Fires after the comment form.
		 *
		 * @since 3.0.0
		 */
		do_action( 'comment_form_after' );
	}
endif;
add_action( 'after_setup_theme', 'game_dev_portfolio_comment_form', 10, 2 );

if ( ! function_exists( 'get_game_dev_portfolio_link' ) ) :
	/**
	 * Prints a a-href tag link, translated
	 */
	function get_game_dev_portfolio_link( $text = 'Link', $url = '#', $args = array() ) {

		// Filters the comment form default arguments.
		$defaults = array(
			'alt'         => '',
			'class'       => '',
			'target'      => '_blank'
		);
		$args = wp_parse_args( $args, apply_filters( 'game_dev_portfolio_link_defaults', $defaults ) );
		if( ! $args[ 'alt' ] ) {
			$args[ 'alt' ] = $text;
		}

		/* translators: 1: link, 2: alt, 3: target, 4: text */
		return sprintf( '<a href="%s" alt="%s" target="%s" class="%s">%s</a>',
			esc_url( __( $url, 'game-dev-portfolio' ) ),
			esc_attr__( $args[ 'alt' ], 'game-dev-portfolio' ),
			esc_attr( $args[ 'target' ] ),
			esc_attr( $args[ 'class' ] ),
			esc_html__( $text, 'game-dev-portfolio' )
		);
	}
endif;
add_action( 'after_setup_theme', 'get_game_dev_portfolio_link', 10, 3 );

if ( ! function_exists( 'game_dev_portfolio_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function game_dev_portfolio_post_thumbnail( $args = array() ) {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		$args = wp_parse_args( $args );
	
		// Filters the comment form default arguments.
		$defaults = array(
			'size'               => 'post-thumbnail',
			'class_caption'      => 'caption',
			'class_link'         => 'post-thumbnail image',
			'enable_tab_select'  => false,
			'caption_text'       => ''
		);
		$args = wp_parse_args( $args, apply_filters( 'game_dev_portfolio_post_thumbnail_defaults', $defaults ) );
	
		// Ensure that the filtered args contain all required default values.
		$args = array_merge( $defaults, $args );

		if ( is_singular() ) :
			?>

			<div class="<?php echo esc_attr( $args['class_link'] ); ?>">
				<?php
				the_post_thumbnail( $args['size'] );

				// Check if there's any caption
				if ( $args['caption_text'] ) :
				?>
					<div class="<?php echo esc_attr( $args['class_caption'] ); ?>">
						<?php echo esc_attr( $args['caption_text'] ) ?>
					</div>
				<?php endif; ?>
			</div>

		<?php else : ?>

			<a class="<?php echo esc_attr( $args['class_link'] ); ?>" href="<?php the_permalink(); ?>" aria-hidden="true" <?php if( ! $args['enable_tab_select'] ) { echo 'tabindex="-1"'; } ?>>
				<?php
				// Print the thumbnail
				the_post_thumbnail( $args['size'], array(
					'alt' => the_title_attribute( array(
						'echo' => false,
					) ),
				) );

				// Check if there's any caption
				if ( $args['caption_text'] ) :
				?>
					<div class="<?php echo esc_attr( $args['class_caption'] ); ?>">
						<?php echo esc_attr( $args['caption_text'] ) ?>
					</div>
				<?php endif; ?>
			</a>

		<?php
		endif; // End is_singular().
	}
endif;
add_action( 'after_setup_theme', 'game_dev_portfolio_post_thumbnail' );

if ( ! function_exists( 'game_dev_portfolio_paginate_links' ) ) :
	/**
	 * Displays Bulma-styled pagination
	 */
	function game_dev_portfolio_paginate_links( $args, $prev_url, $prev_filter, $next_url, $next_filter, $paginate_function ) {
		// HACK: not a huge fan of using filters and functions as arguments
		// Set the current page to whatever was set in args
		$current = $args[ 'current' ];
		$total = $args[ 'total' ];

		// Setup the template
		$template = '
		<nav class="navigation %1$s" role="navigation" aria-label="%4$s">
			<h2 class="screen-reader-text">%2$s</h2>
			%5$s
			%6$s
			%3$s
		</nav>';
		$template  = apply_filters( 'navigation_markup_template', $template, $args['class_nav'] );

		// Check if we want to show the next and previous buttons
		$prev_link = '';
		$next_link = '';
		if( $args['prev_next'] ) {

			// Setup the default attributes for the next and previous post
			$prev_link = 'class="pagination-previous"';
			$next_link = 'class="pagination-next"';
			if( $current <= 1 ) {
				$prev_link .= ' disabled';
			}
			if( $current >= $total ) {
				$next_link .= ' disabled';
			}

			// Apply filters
			$prev_link = apply_filters( $prev_filter, $prev_link );
			$next_link = apply_filters( $next_filter, $next_link );

			// Convert the attributes to proper links
			$prev_link = sprintf( '<a href="%1$s" %2$s>%3$s</a>',
				esc_url( $prev_url ),
				$prev_link,
				esc_html( $args['prev_text'] )
			);
			$next_link = sprintf( '<a href="%1$s" %2$s>%3$s</a>',
				esc_url( $next_url ),
				$next_link,
				esc_html( $args['next_text'] )
			);
		}

		// Grab all the links, with a few parameters deliberately over-written
		$dom = new DOMDocument();
		$args[ 'prev_next' ] = false;
		$args[ 'type' ] = 'list';
		$dom->loadHTML( $paginate_function( $args ) );

		// Go through each ul (there should only be one)
		$nodes = $dom->getElementsByTagName( 'ul' );
		foreach( $nodes as $node ) {

			// Set the class for this tag
			$classes = 'pagination-list';
			if( $node->hasAttribute( 'class' ) ) {
				$classes .= $node->getAttribute( 'class' ) . ' ' . $classes;
			}
			$node->setAttribute( 'class', $classes );
		}

		// Go through each link
		$nodes = $dom->getElementsByTagName( 'a' );
		foreach( $nodes as $node ) {

			// Set the class for this tag
			$classes = 'pagination-link';
			if( $node->hasAttribute( 'class' ) ) {
				$classes .= $node->getAttribute( 'class' ) . ' ' . $classes;
			}
			$node->setAttribute( 'class', $classes );

			// Set the aria-label as well
			$node->setAttribute( 'aria-label', sprintf(
				__( 'Go to page %s', 'game-dev-portfolio' ),
				$node->value
			) );
		}

		// Go through each span
		$nodes = $dom->getElementsByTagName( 'span' );
		foreach( $nodes as $node ) {

			// Customize the class for this span
			$classes = 'pagination-ellipsis';

			// Check if this is the current page
			if( $node->hasAttribute( 'aria-current' ) ) {
				// Indicate in the class this is the current page
				$classes = 'pagination-link is-current';

				// Set the aria-label as well
				$node->setAttribute( 'aria-label', sprintf(
					__( 'Page %s', 'game-dev-portfolio' ),
					$node->value
				) );
			}

			// Append the new class attributes
			if( $node->hasAttribute( 'class' ) ) {
				$classes = $node->getAttribute( 'class' ) . ' ' . $classes;
			}
			$node->setAttribute( 'class', $classes );
		}

		// Echo the entire template
		echo sprintf( $template,
			esc_attr( $args['class'] ),
			esc_html( $args['screen_reader_text'] ),
			$dom->saveHTML(),
			esc_attr( $args['aria_label'] ),
			$prev_link,
			$next_link
		);
	}
endif;

if ( ! function_exists( 'game_dev_portfolio_pagination' ) ) :
	/**
	 * Displays Bulma-styled pagination
	 */
	function game_dev_portfolio_pagination( $args = array() ) {
		// Import the query
		global $wp_query;

		// Get max pages of the current query, if available.
		$total = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;

		// Make sure there are pages to parse
		if( $total > 1 ) {
			// Setup defaults
			$defaults = array(
				// Get the current page
				'current'            => ( get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1 ),
				'total'              => $total,
				'class'              => 'pagination is-centered',
				'prev_next'          => true,
				'prev_text'          => _x( '&laquo; Previous', 'previous posts', 'game-dev-portfolio' ),
				'next_text'          => _x( 'Next &raquo;', 'next posts', 'game-dev-portfolio' ),
				'screen_reader_text' => __( 'Navigation', 'game-dev-portfolio' ),
				'aria_label'         => __( 'Posts', 'game-dev-portfolio' )
			);

			// Setup the args
			$args = wp_parse_args( $args, $defaults );

			// Run everything through a helper function
			game_dev_portfolio_paginate_links(
				$args,
				previous_posts( false ),
				'previous_posts_link_attributes',
				next_posts( 0, false ),
				'next_posts_link_attributes',
				'paginate_links'
			);
		}
	}
endif;
add_action( 'after_setup_theme', 'game_dev_portfolio_pagination' );

if ( ! function_exists( 'game_dev_portfolio_comments_pagination' ) ) :
	/**
	 * Displays Bulma-styled pagination for comments.  This function will always echo.
	 */
	function game_dev_portfolio_comments_pagination( $args = array() ) {

		// This part is largely copied from Wordpress
		global $wp_rewrite;

		// Skip if this comment is singular
		if ( ! is_singular() ) {
			return;
		}

		// Get the total number of comments
		$total = get_comment_pages_count();

		// Make sure there are pages to parse
		if( $total > 1 ) {

			// Get the current page
			$current = get_query_var( 'cpage' );
			if ( ! $current ) {
				$current = 1;
			}

			// Setup defaults
			$defaults = array(
				// Get the current page
				'current'            => $current,
				'total'              => $total,
				'class'              => 'pagination is-centered',
				'prev_next'          => true,
				'prev_text'          => _x( '&laquo; Older', 'older comments', 'game-dev-portfolio' ),
				'next_text'          => _x( 'Newer &raquo;', 'newer comments', 'game-dev-portfolio' ),
				'screen_reader_text' => __( 'Navigation', 'game-dev-portfolio' ),
				'aria_label'         => __( 'Comments', 'game-dev-portfolio' )
			);

			// Setup the args
			$args = wp_parse_args( $args, $defaults );

			// Force the function to *not* echo
			$args[ 'echo' ] = false;

			// Determine next and previous page number
			$prev_page_num = intval( $args[ 'current' ] );
			$next_page_num = $prev_page_num;
			if( $prev_page_num > 1 ) {
				$prev_page_num -= 1;
			}
			if( $next_page_num < $total ) {
				$next_page_num += 1;
			}

			// Run everything through a helper function
			game_dev_portfolio_paginate_links(
				$args,
				get_comments_pagenum_link( $prev_page_num ),
				'previous_comments_link_attributes',
				get_comments_pagenum_link( $next_page_num ),
				'next_comments_link_attributes',
				'paginate_comments_links'
			);
		}
	}
endif;
add_action( 'after_setup_theme', 'game_dev_portfolio_pagination' );
?>
