<?php
/**
 * Title: Skills grid, 2 columns
 * Slug: game-dev-portfolio/text-skills
 * Categories: text, skills, about, featured
 * Keywords: skills, about
 * Viewport width: 1200
 * Description: 2 column grid listing author skills
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|10"}},"backgroundColor":"base-2","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-base-2-background-color has-background" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--40)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"0px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
	<div class="wp-block-group">
		<!-- wp:heading {"textAlign":"center","className":"is-style-default","style":{"layout":{"selfStretch":"fit","flexSize":null}}} -->
		<h2 class="wp-block-heading has-text-align-center is-style-default">
			Skills
		</h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column">
			<!-- wp:html -->
			<h3><i class="fas fa-file-code"></i> Code</h3>
			<!-- /wp:html -->

			<!-- wp:list -->
			<ul class="wp-block-list">
				<!-- wp:list-item -->
					<li>List a skill, here.</li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li>List another skill, here.</li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column">
			<!-- wp:html -->
			<h3><i class="fab fa-unity"></i> Unity</h3>
			<!-- /wp:html -->

			<!-- wp:list -->
			<ul class="wp-block-list">
				<!-- wp:list-item -->
				<li>List a skill, here.</li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li>List another skill, here.</li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column">
			<!-- wp:html -->
			<h3><i class="fas fa-gamepad"></i> Game Design</h3>
			<!-- /wp:html -->

			<!-- wp:list -->
			<ul class="wp-block-list">
				<!-- wp:list-item -->
					<li>List a skill, here.</li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li>List another skill, here.</li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column">
			<!-- wp:html -->
			<h3><i class="fas fa-window-restore"></i> UX Development</h3>
			<!-- /wp:html -->

			<!-- wp:list -->
			<ul class="wp-block-list">
				<!-- wp:list-item -->
				<li>List a skill, here.</li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li>List another skill, here.</li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->