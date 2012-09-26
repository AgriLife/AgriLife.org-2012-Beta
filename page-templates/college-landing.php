<?php
/**
 * Template name: College Landing Page
 */

get_header(); ?>

<div class="content-wrap landing-page">
	<section id="content" role="main" class="two-of-3 column">
			
			<h1 class="section-title landing-college">Texas A&amp;M College of Agriculture and Life Sciences</h1>

				<?php the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>
				
				<div class="landing-widgets-lower">
				<?php if ( ! dynamic_sidebar( 'college-widget-area' ) ) : ?>
				<?php endif; ?>
				</div>
				
	</section><!-- /end #content -->
	
	<section id="sidebar" class="sidebar one-of-3 column" role="navigation">
		<aside id="director_bio" class="widget interior-sidebar">
			<div class="widget-wrap director-bio-wrap">
				<img src="<?php bloginfo('template_directory'); ?>/images/landing/steele.jpg" alt="Dr. Dugas" class="director-mug" title="Dr. Dugas" />
				<h2>William A. &quot;Bill&quot; Dugas, Ph.D</h2>
				<h4 class="landing-contact">Contact</h4>
				<p></p>
				
				<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/landing/btn-maroon-steele.png" alt="Dr. Dugas Bio" class="director-bio-btn" title="Dr. Dugas" /></a>
				
			</div>
		</aside>
		<?php dynamic_sidebar( 'sidebar_college' ); ?>
	</section>
	
</div><!-- /.content-wrap -->
<?php get_sidebar('agencies'); ?>
<?php get_footer(); ?>
