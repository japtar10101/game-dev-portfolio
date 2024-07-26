<?php
/**
 * Title: Sidebar
 * Slug: game-dev-portfolio/hidden-sidebar
 * Inserter: no
 */
?>

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group">

	<!-- wp:group {"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:site-logo {"width":304,"align":"center","className":"is-style-full-width-rounded"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"is-style-group-shadow","style":{"position":{"type":"sticky","top":"0px"},"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group is-style-group-shadow"
			style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">
		<!-- wp:site-title {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"x-large"} /-->

		<!-- wp:site-tagline {"style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|10"}}}} /-->

		<!-- wp:navigation {"overlayMenu":"never","className":"is-style-slide","layout":{"type":"flex","orientation":"vertical","className":"is-style-slide","justifyContent":"stretch"}} /-->

		<!-- wp:social-links {"iconColor":"base-2","iconColorValue":"#ffffff","iconBackgroundColor":"contrast","iconBackgroundColorValue":"#111111","openInNewTab":true,"className":"is-style-default"} -->
		<ul class="wp-block-social-links has-icon-color has-icon-background-color is-style-default">
			<!-- wp:social-link {"url":"https://www.linkedin.com/in/taroomiya/","service":"linkedin"} /-->
			<!-- wp:social-link {"url":"https://github.com/japtar10101/","service":"github"} /-->
			<!-- wp:social-link {"url":"https://omiyagames.itch.io/","service":"chain"} /-->
		</ul>
		<!-- /wp:social-links -->

		<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search...","width":100,"widthUnit":"%","buttonText":"Search","buttonPosition":"button-outside","buttonUseIcon":true,"style":{"border":{"radius":"0.5rem"}}} /-->
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
