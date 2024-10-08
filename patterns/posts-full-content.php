<?php
/**
 * Title: List of posts with full content
 * Slug: game-dev-portfolio/posts-full-content
 * Categories: query
 * Block Types: core/query
 * Description: A list of posts with full content in display.
 */
?>

<!-- wp:query {"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"metadata":{"categories":["posts"],"patternName":"core/query-standard-posts","name":"Standard"}} -->
<div class="wp-block-query">
	<!-- wp:post-template -->
		<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"auto","align":"wide","className":"is-style-feature-blog"} /-->

		<!-- wp:spacer {"height":"1rem"} -->
		<div style="height:1rem" aria-hidden="true" class="wp-block-spacer">
		</div>
		<!-- /wp:spacer -->

		<!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} /-->

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:pattern {"slug":"twentytwentyfour/hidden-post-meta"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:spacer {"height":"1rem"} -->
		<div style="height:1rem" aria-hidden="true" class="wp-block-spacer">
		</div>
		<!-- /wp:spacer -->

		<!-- wp:post-content /-->

		<!-- wp:spacer {"height":"1rem"} -->
		<div style="height:1rem" aria-hidden="true" class="wp-block-spacer">
		</div>
		<!-- /wp:spacer -->

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
		<div class="wp-block-group">
			<!-- wp:read-more {"fontSize":"small"} /-->

			<!-- wp:post-terms {"term":"post_tag","className":"is-style-pill","fontSize":"small"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:separator {"opacity":"css","className":"is-style-dots"} -->
		<hr class="wp-block-separator has-css-opacity is-style-dots"/>
		<!-- /wp:separator -->
	<!-- /wp:post-template -->

	<!-- wp:query-pagination {"paginationArrow":"chevron","layout":{"type":"flex","justifyContent":"center"}} -->
		<!-- wp:query-pagination-previous /-->

		<!-- wp:query-pagination-numbers /-->

		<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->
</div>
<!-- /wp:query -->
