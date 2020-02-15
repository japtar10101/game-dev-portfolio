<?php
/**
 * Template part for search bar
 *
 * @package Game_Dev_Portfolio
 */
?>
<form role="search" method="get" id="searchform" class="field has-addons" action="<?php echo home_url( '/' ); ?>">
	<div class="control is-expanded">
		<label class="screen-reader-text" for="s">Find a Page</label>
		<input type="text" value="" name="s" id="s" class="input" placeholder="Find a Page"/>
	</div>
	<div class="control">
		<input type="submit" id="searchsubmit" value="Search" class="button is-info" />
	</div>
</form>
