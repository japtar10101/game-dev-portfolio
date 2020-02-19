<?php
/**
 * The navbar for our theme
 *
 * This is the template that displays the navbar only visible in mobile screens.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Game_Dev_Portfolio
 */
?>
<nav id="site-navigation" class="navbar is-fixed-top is-transparent" role="navigation" aria-label="main navigation">
	<div class="navbar-brand">
		<!-- Add the title of the website here -->
		<button role="button" class="menu-toggle navbar-burger burger button" aria-label="menu" aria-expanded="false" data-target="site-navigation">
			<span aria-hidden="true"></span>
			<span aria-hidden="true"></span>
			<span aria-hidden="true"></span>
		</button>
	</div>

	<div class="navbar-menu">
		<?php
		wp_nav_menu( array(
			'theme_location' => 'menu-1',
			'menu_id'        => 'primary-menu',
			'menu_class'     => 'navbar-end',
			'container'      => '',
			'before'         => '<div class="navbar-item">',
			'after'          => '</div>',
		) );
		?>
	</div> <!-- #site-navigation -->
</nav>
