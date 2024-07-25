<?php
/**
 * Title: Blogging search template
 * Slug: game-dev-portfolio/template-search-blogging
 * Template Types: search
 * Viewport width: 1400
 * Inserter: no
 */
?>

<!-- wp:template-part {"slug":"header","area":"header","tagName":"header"} /-->

<!-- wp:group {"tagName":"main","style":{"spacing":{"blockGap":"0","margin":{"top":"0"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group" style="margin-top:0">
	<!-- wp:group {"layout":{"type":"default"}} -->
	<div class="wp-block-group">
		<!-- wp:query-title {"type":"search","style":{"typography":{"lineHeight":"1"},"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|30"}}}} /-->
		<!-- wp:pattern {"slug":"game-dev-portfolio/hidden-search"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:pattern {"slug":"game-dev-portfolio/posts-1-col"} /-->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","area":"footer","tagName":"footer"} /-->
