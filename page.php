<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage agrilifeorg
 * @since agrilifeorg 1.0
 */

get_header(); ?>

<div class="content-wrap">
	<section id="content" role="main" class="two-of-3 column">
			<?php 
				if (!empty($post->post_parent)) {
					$parent_title = get_the_title($post->post_parent);
				} else {
					$parent_title = 'Texas A&amp;M AgriLife'; //get_the_title($post->post_parent);
				} ?>
			<h1 class="section-title"><?php echo $parent_title; ?></h1>

				<?php the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php comments_template( '', true ); ?>


	</section><!-- /end #content -->

<?php get_sidebar(); ?>
<?php get_sidebar('agencies'); ?>
</div><!-- /.content-wrap -->

<?php get_footer(); ?>