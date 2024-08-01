<?php
/**
 * Title: Sidebar
 * Slug: game-dev-portfolio/sidebar-portfolio
 * Categories: sidebar
 * Block Types: core/template-part/sidebar
 * Description: A sidebar section for portfolio.
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
	<div class="wp-block-group">
		<!-- wp:site-title {"fontSize":"x-large"} /-->
		<!-- wp:site-tagline {"textAlign":"left","fontSize":"medium"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:navigation {"overlayMenu":"never","className":"is-style-segmented","style":{"layout":{"selfStretch":"fit","flexSize":null}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} /-->

	<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search...","width":100,"widthUnit":"%","buttonText":"Search","buttonPosition":"button-inside","buttonUseIcon":true,"style":{"layout":{"selfStretch":"fill","flexSize":null},"border":{"radius":"0.25rem"}}} /-->
</div>
<!-- /wp:group -->