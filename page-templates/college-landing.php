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
				<img src="<?php bloginfo('template_directory'); ?>/images/landing/hussey.jpg" alt="Dr. Hussey" class="director-mug" title="Dr. Hussey" />
				<h2>Dr. Mark A. Hussey</h2>
				<h4 class="landing-contact">Contact</h4>
				<p>Agriculture and Life Sciences Building<br />
				600 John Kimbrough Blvd., Suite 510<br />
				2142 TAMU<br />
				College Station, TX 77843-2142</p>
				<h4 class="landing-contact">Phone</h4>
				<a class="phone" href="tel://979.845.3712">979.845.3712</a>
				
				<a href="http://agrilife.org/beta/about/leadership/markhussey/"><img src="<?php bloginfo('template_directory'); ?>/images/landing/learn-hussey.png" alt="Dr. Hussey Bio" class="director-bio-btn" title="Dr. Hussey" /></a>
				<a href="http://aglifesciences.tamu.edu/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/landing/explore-college.png" alt="Texas A&amp;M AgriLife Research" class="agency-link-btn" title="Texas A&amp;M AgriLife Research" /></a>
				
			</div>
		</aside>
		<?php dynamic_sidebar( 'sidebar_college' ); ?>
	</section>
	
</div><!-- /.content-wrap -->

<?php get_footer(); ?>
