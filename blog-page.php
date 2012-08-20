<?php
/**
 * Template Name: Blog Page
 * @package WordPress
 */

get_header(); ?>

<div class="content-wrap">
	<section id="content" role="main" class="two-of-3 column">

			<?php get_template_part( 'loop', 'index' ); ?>
			


	</section><!-- /end #content -->

<?php get_sidebar(); ?>
	
</div><!-- /.content-wrap -->

<?php get_footer(); ?>