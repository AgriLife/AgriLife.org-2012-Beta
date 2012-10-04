<?php
/**
 * The template for displaying search forms in agrilifeorg
 *
 * @package WordPress
 * @subpackage agrilifeorg
 * @since agrilifeorg 1.0
 */
?>
	<form method="get" id="searchform" target="GoogleSearch" action="http://search.tamu.edu/search">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'agrilifeorg' ); ?></label>
		<input type="text" class="field" name="q" id="s" placeholder="<?php esc_attr_e( 'Search', 'agrilifeorg' ); ?>" />
    <input type="hidden" name="site" value="ag_collection" />
    <input type="hidden" name="proxystylesheet" value="ag_frontend" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'agrilifeorg' ); ?>" />
	</form>
