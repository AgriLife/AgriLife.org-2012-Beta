<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage agrilifeorg
 * @since agrilifeorg 1.0
 */

get_header(); ?>
<div class="content-wrap">
	<section id="content" role="main" class="two-of-3 column">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'single' ); ?>

					<nav id="nav-single">
						<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Prev', 'agrilifeorg' ) ); ?></span>
						<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'agrilifeorg' ) ); ?></span>
					</nav><!-- #nav-single -->

				<?php endwhile; // end of the loop. ?>
	
	</section><!-- /end #content -->

<?php get_sidebar(); ?>

</div><!-- /.content-wrap -->

<?php get_footer(); ?>