<?php
/**
 * Template name: Extension Template
 */

get_header(); ?>

<div class="content-wrap">
	<section id="content" role="main" class="two-of-3 column">
			
			<h1 class="section-title">Texas A&amp;M AgriLife Extension</h1>

				<?php the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php comments_template( '', true ); ?>


	</section><!-- /end #content -->

<?php dynamic_sidebar( 'sidebar_extension' ); ?>
</div><!-- /.content-wrap -->

<?php get_footer(); ?>
