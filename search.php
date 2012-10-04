<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage agrilifeorg
 * @since agrilifeorg 1.0
 */

get_header(); ?>

<div class="content-wrap">
	<section id="content" role="main" class="two-of-3 column">

    <iframe id="google-search" name="GoogleSearch" width="100%" height="1100px" scrolling="no" frameborder="0" src="http://search.tamu.edu/search?site=ag_collection&proxystylesheet=ag_frontend"></iframe>
	</section><!-- /end #content -->

<?php get_sidebar(); ?>
</div><!-- /.content-wrap -->

<?php get_footer(); ?>
