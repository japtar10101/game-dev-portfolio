<?php
/**
 * Title: Blogging home
 * Slug: game-dev-portfolio/page-home-blogging
 * Categories: game-dev-portfolio_page
 * Keywords: page, starter
 * Post Types: page, wp_template
 * Viewport width: 1400
 * Description: A blogging home page with a hero section, a text section, a blog section, and a CTA section.
 */
?>

<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide">
	<!-- wp:query {"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true}} -->
	<div class="wp-block-query">
		<!-- wp:post-template -->
		<!-- wp:group {"tagName":"article","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
		<article class="wp-block-group">
			<!-- wp:post-featured-image /-->

			<!-- wp:post-title {"isLink":true,"fontSize":"large"} /-->

			<!-- wp:template-part {"slug":"post-meta"} /-->

		</article>
		<!-- /wp:group -->

		<!-- wp:post-excerpt {"moreText":"","excerptLength":40} /-->

		<!-- wp:spacer -->
		<div style="height:100px" aria-hidden="true" class="wp-block-spacer">
		</div>
		<!-- /wp:spacer -->
		<!-- /wp:post-template -->

		<!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<!-- wp:query-pagination-previous /-->

		<!-- wp:query-pagination-numbers /-->

		<!-- wp:query-pagination-next /-->
		<!-- /wp:query-pagination -->

		<!-- wp:query-no-results -->
		<!-- wp:pattern {"slug":"game-dev-portfolio/hidden-no-results"} /-->
		<!-- /wp:query-no-results -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:column -->

<!-- wp:pattern {"slug":"game-dev-portfolio/cta-subscribe-centered"}	/-->
