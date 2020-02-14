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
				<?php echo get_avatar($comment, $size='64' ); ?>
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

/**
 * Function to format the comment form
 * This is largely a copy-pasta from Wordpress itself
 */
if ( ! function_exists( 'game_dev_portfolio_comment_form' ) ) :

	function game_dev_portfolio_comment_form( $args = array(), $post_id = null ) {
		if ( null === $post_id ) {
			$post_id = get_the_ID();
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
	
		$fields = array(
			'author' => sprintf(
				'<p class="comment-form-author">%s %s</p>',
				sprintf(
					'<label for="author">%s%s</label>',
					__( 'Name' ),
					( $req ? ' <span class="required">*</span>' : '' )
				),
				sprintf(
					'<input id="author" name="author" type="text" value="%s" size="30" maxlength="245"%s />',
					esc_attr( $commenter['comment_author'] ),
					$html_req
				)
			),
			'email'  => sprintf(
				'<p class="comment-form-email">%s %s</p>',
				sprintf(
					'<label for="email">%s%s</label>',
					__( 'Email' ),
					( $req ? ' <span class="required">*</span>' : '' )
				),
				sprintf(
					'<input id="email" name="email" %s value="%s" size="30" maxlength="100" aria-describedby="email-notes"%s />',
					( $html5 ? 'type="email"' : 'type="text"' ),
					esc_attr( $commenter['comment_author_email'] ),
					$html_req
				)
			),
			'url'    => sprintf(
				'<p class="comment-form-url">%s %s</p>',
				sprintf(
					'<label for="url">%s</label>',
					__( 'Website' )
				),
				sprintf(
					'<input id="url" name="url" %s value="%s" size="30" maxlength="200" />',
					( $html5 ? 'type="url"' : 'type="text"' ),
					esc_attr( $commenter['comment_author_url'] )
				)
			),
		);
	
		if ( has_action( 'set_comment_cookies', 'wp_set_comment_cookies' ) && get_option( 'show_comments_cookies_opt_in' ) ) {
			$consent = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
	
			$fields['cookies'] = sprintf(
				'<p class="comment-form-cookies-consent">%s %s</p>',
				sprintf(
					'<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"%s />',
					$consent
				),
				sprintf(
					'<label for="wp-comment-cookies-consent">%s</label>',
					__( 'Save my name, email, and website in this browser for the next time I comment.' )
				)
			);
	
			// Ensure that the passed fields include cookies consent.
			if ( isset( $args['fields'] ) && ! isset( $args['fields']['cookies'] ) ) {
				$args['fields']['cookies'] = $fields['cookies'];
			}
		}
	
		$required_text = sprintf(
			/* translators: %s: Asterisk symbol (*). */
			' ' . __( 'Required fields are marked %s' ),
			'<span class="required">*</span>'
		);
	
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
				__( 'Add a comment...', 'game-dev-portfolio' )
			),
			'must_log_in'          => sprintf(
				'<p class="must-log-in">%s</p>',
				sprintf(
					/* translators: %s: Login URL. */
					__( 'You must be <a href="%s">logged in</a> to post a comment.' ),
					/** This filter is documented in wp-includes/link-template.php */
					wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ), $post_id ) )
				)
			),
			'logged_in_as'         => sprintf(
				'<p class="logged-in-as">%s</p>',
				sprintf(
					/* translators: 1: Edit user link, 2: Accessibility text, 3: User name, 4: Logout URL. */
					__( '<a href="%1$s" aria-label="%2$s">Logged in as %3$s</a>. <a href="%4$s">Log out?</a>' ),
					get_edit_user_link(),
					/* translators: %s: User name. */
					esc_attr( sprintf( __( 'Logged in as %s. Edit your profile.' ), $user_identity ) ),
					$user_identity,
					/** This filter is documented in wp-includes/link-template.php */
					wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ), $post_id ) )
				)
			),
			'comment_notes_before' => sprintf(
				'<p class="comment-notes">%s%s</p>',
				sprintf(
					'<span id="email-notes">%s</span>',
					__( 'Your email address will not be published.' )
				),
				( $req ? $required_text : '' )
			),
			'comment_notes_after'  => '',
			'action'               => site_url( '/wp-comments-post.php' ),
			'id_form'              => 'commentform',
			'id_submit'            => 'submit',
			'class_form'           => 'comment-form',
			'class_submit'         => 'submit',
			'name_submit'          => 'submit',
			'title_reply'          => __( 'Add Comment' ),
			/* translators: %s: Author of the comment being replied to. */
			'title_reply_to'       => __( 'Reply to %s' ),
			'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title">',
			'title_reply_after'    => '</h3>',
			'cancel_reply_before'  => ' <small>',
			'cancel_reply_after'   => '</small>',
			'cancel_reply_link'    => __( 'Cancel reply' ),
			'label_submit'         => __( 'Post Comment' ),
			'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
			'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
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
		<div id="respond" class="comment-respond">
			<?php
			echo $args['title_reply_before'];
			#echo 'FIXME: Test';
	
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
				$comment_fields = array( 'comment' => $args['comment_field'] ) + (array) $args['fields'];
	
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
					$submit_button,
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

				echo $args['cancel_reply_before'];
	
				cancel_comment_reply_link( $args['cancel_reply_link'] );
		
				echo $args['cancel_reply_after'];	
	
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
add_action( 'wp_enqueue_scripts', 'game_dev_portfolio_comment_form' );
?>
