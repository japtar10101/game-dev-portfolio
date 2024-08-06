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

	<!-- wp:social-links {"iconColor":"base-2","iconColorValue":"#ffffff","iconBackgroundColor":"contrast","iconBackgroundColorValue":"#111111","openInNewTab":true,"className":"is-style-default","style":{"spacing":{"blockGap":{"top":"0.6rem","left":"0.6rem"}},"layout":{"selfStretch":"fit","flexSize":null}},"layout":{"type":"flex","justifyContent":"left","flexWrap":"wrap"}} -->
	<ul class="wp-block-social-links has-icon-color has-icon-background-color is-style-default">
		<!-- wp:social-link {"url":"https://www.taroomiya.com/contact","service":"mail"} /-->
		<!-- wp:social-link {"url":"https://www.linkedin.com/in/taroomiya/","service":"linkedin","label":""} /-->
		<!-- wp:social-link {"url":"https://github.com/japtar10101","service":"github"} /-->
		<!-- wp:social-link {"url":"https://omiyagames.itch.io/","service":"chain","label":"Itch.io"} /-->
	</ul>
	<!-- /wp:social-links -->

	<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search...","width":100,"widthUnit":"%","buttonText":"Search","buttonPosition":"button-inside","buttonUseIcon":true,"style":{"layout":{"selfStretch":"fill","flexSize":null},"border":{"radius":"0.25rem"}}} /-->
</div>
<!-- /wp:group -->