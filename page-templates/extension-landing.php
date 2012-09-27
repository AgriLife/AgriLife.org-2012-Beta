<?php
/**
 * Template name: Extension Landing Page
 */

get_header(); ?>

<div class="content-wrap landing-page">
	<section id="content" role="main" class="two-of-3 column">
			
			<h1 class="section-title landing-extension">Texas A&amp;M AgriLife Extension</h1>

				<?php the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>
				
				<div class="landing-widgets-lower">
				<?php if ( ! dynamic_sidebar( 'Extension Landing Page: Main Widget Area' ) ) : ?>
				<?php endif; ?>
				</div>
				
	</section><!-- /end #content -->
	
	<section id="sidebar" class="sidebar one-of-3 column" role="navigation">
		<aside id="director_bio" class="widget interior-sidebar">
			<div class="widget-wrap director-bio-wrap">
				<img src="<?php bloginfo('template_directory'); ?>/images/landing/steele.jpg" alt="Dr. Doug Steele" class="director-mug" title="Dr. Doug Steele" />
				<h2>Dr. Doug Steele,<br />Interim Director</h2>
			
				<h4 class="landing-contact">Contact</h4>
				<p>Agriculture and Life Sciences Building <br />
					600 John Kimbrough Boulevard, Suite 509<br />
					College Station, TX 77843-7101</p>
				
				<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/landing/learn-steele.png" alt="Dr. Doug Steele Bio" class="director-bio-btn" title="Dr. Doug Steele" /></a>
				<a href="http://agrilifeextension.tamu.edu/"><img src="<?php bloginfo('template_directory'); ?>/images/landing/exploreExtension.png" alt="Texas A&amp;M AgriLife Extension Service" class="agency-link-btn" title="Texas A&amp;M AgriLife Extension Service" /></a>
				
			</div>
		</aside>
		<?php dynamic_sidebar( 'sidebar_extension' ); ?>
	</section>
	
</div><!-- /.content-wrap -->

<?php get_footer(); ?>
