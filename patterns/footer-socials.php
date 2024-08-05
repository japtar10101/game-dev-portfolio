<?php
/**
 * Title: Footer with Links to Social Media
 * Slug: game-dev-portfolio/footer-socials
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: A footer section with social media icons.
 */
?>

<!-- wp:group {"className":"is-style-footer","style":{"spacing":{"padding":{"top":"2rem","bottom":"2rem"}}},"backgroundColor":"accent"} -->
<div class="wp-block-group is-style-footer has-accent-background-color has-background" style="padding-top:2rem;padding-bottom:2rem">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			<!-- wp:pattern {"slug":"game-dev-portfolio/text-copyrights"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"right"}} -->
		<div class="wp-block-group">
			<!-- wp:social-links {"iconColor":"contrast","iconColorValue":"#111111","iconBackgroundColor":"base","iconBackgroundColorValue":"#f9f9f9","openInNewTab":true,"size":"has-large-icon-size","className":"is-style-default","style":{"spacing":{"blockGap":{"top":"0","left":"0.6rem"}},"layout":{"selfStretch":"fit","flexSize":null}},"layout":{"type":"flex","justifyContent":"right","flexWrap":"wrap"}} -->
			<ul class="wp-block-social-links has-large-icon-size has-icon-color has-icon-background-color is-style-default">
				<!-- wp:social-link {"url":"https://www.taroomiya.com/contact","service":"mail"} /-->
				<!-- wp:social-link {"url":"https://www.linkedin.com/in/taroomiya/","service":"linkedin","label":""} /-->
				<!-- wp:social-link {"url":"https://github.com/japtar10101","service":"github"} /-->
				<!-- wp:social-link {"url":"https://omiyagames.itch.io/","service":"chain","label":"Itch.io"} /-->
			</ul>
			<!-- /wp:social-links -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->