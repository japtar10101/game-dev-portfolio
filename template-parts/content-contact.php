<?php

/**
 * The template for displaying contact form
 *
 * This is the template that displays the area of the page that contains a contact form.
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
if (post_password_required()) {
	return;
}
?>
<div id="contact-form-3098">
	<form action="https://www.taroomiya.com/?page_id=3098#contact-form-3098" method="post" class="contact-form commentsblock">
	
	
	<div class="grunion-field-wrap grunion-field-name-wrap">
	<label for="g3098-name" class="grunion-field-label name">Name<span>(required)</span></label>
	<input type="text" name="g3098-name" id="g3098-name" value="" class="name" required="" aria-required="true" data-kpxc-id="g3098-name">
		</div>
	
	
	
	<div class="grunion-field-wrap grunion-field-email-wrap">
	<label for="g3098-email" class="grunion-field-label email">Email<span>(required)</span></label>
	<input type="email" name="g3098-email" id="g3098-email" value="" class="email" required="" aria-required="true" data-kpxc-id="g3098-email">
		</div>
	
	
	
	<div class="grunion-field-wrap grunion-field-textarea-wrap">
	<label for="contact-form-comment-g3098-message" class="grunion-field-label textarea">Message<span>(required)</span></label>
	<textarea name="g3098-message" id="contact-form-comment-g3098-message" rows="20" class="textarea" required="" aria-required="true"></textarea>
		</div>
	
	
	
	<p></p>
	
		<p class="contact-submit">
			<button type="submit" class="pushbutton-wide wp-block-button__link has-text-color has-background">Submit</button>		<input type="hidden" id="_wpnonce" name="_wpnonce" value="3aa767373a"><input type="hidden" name="_wp_http_referer" value="/?page_id=3098&amp;preview=true">
			<input type="hidden" name="is_block" value="1">
			<input type="hidden" name="contact-form-id" value="3098">
			<input type="hidden" name="action" value="grunion-contact-form">
			<input type="hidden" name="contact-form-hash" value="08b36d53e0e463299aa214992a837a1610f051e8">
		</p>
	</form>
</div>

<hr/>
<form id="contact" class="contact-area">
	<div id="contact-name" class="field">
		<p class="control has-icons-left">
			<input class="input" type="text" placeholder="<?php esc_attr_e( 'Name (Required)', 'game-dev-portfolio' ); ?>">
			<span class="icon is-small is-left">
				<i class="fas fa-user"></i>
			</span>
		</p>
	</div>
	<div id="contact-email" class="field">
		<p class="control has-icons-left">
			<input class="input" type="email" placeholder="<?php esc_attr_e( 'Email', 'game-dev-portfolio' ); ?>">
			<span class="icon is-small is-left">
				<i class="fas fa-envelope"></i>
			</span>
		</p>
	</div>
	<div id="contact-message" class="field">
		<div class="control">
			<textarea class="textarea" placeholder="<?php esc_attr_e( 'Message', 'game-dev-portfolio' ); ?>"></textarea>
		</div>
	</div>

	<div class="field">
		<div class="control">
			<button class="button is-link is-outlined">
				<?php esc_html_e( 'Submit', 'game-dev-portfolio' ); ?>
			</button>
		</div>
	</div>
</form><!-- #contact -->
