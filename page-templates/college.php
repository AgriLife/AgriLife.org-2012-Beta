<?php
/**
 * Template name: College Template
 */

get_header(); ?>

<div class="content-wrap">
	<section id="content" role="main" class="two-of-3 column">

				<?php the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php comments_template( '', true ); ?>


	</section><!-- /end #content -->

<?php dynamic_sidebar( 'sidebar_college' ); ?>
</div><!-- /.content-wrap -->

<?php get_footer(); ?>
