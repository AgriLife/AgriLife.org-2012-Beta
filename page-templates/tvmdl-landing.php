<?php
/**
 * Template name: TVMDL Landing Page
 */

get_header(); ?>

<div class="content-wrap landing-page">
	<section id="content" role="main" class="two-of-3 column">
			
			<h1 class="section-title landing-tvmdl">Texas A&amp;M Veterinary Medical Diagnostic Clinic</h1>

				<?php the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>
				
				<div class="landing-widgets-lower">
				<?php if ( ! dynamic_sidebar( 'tvmdl-widget-area' ) ) : ?>
				<?php endif; ?>
				</div>
				
	</section><!-- /end #content -->
	
	<section id="sidebar" class="sidebar one-of-3 column" role="navigation">
		<aside id="director_bio" class="widget interior-sidebar">
			<div class="widget-wrap director-bio-wrap">
				<img src="<?php bloginfo('template_directory'); ?>/images/landing/steele.jpg" alt="Dr. Tammy Beckham" class="director-mug" title="Dr. Tammy Beckham" />
				<h2>Dr. Tammy Beckham</h2>
				<h4 class="landing-contact">Contact</h4>
				<p>1 Sippel Rd.<br />
				College Station, TX 77843</p>
				
				<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/landing/btn-maroon-steele.png" alt="Dr. Tammy Beckham Bio" class="director-bio-btn" title="Dr. Tammy Beckham" /></a>
				
			</div>
		</aside>
		<?php dynamic_sidebar( 'sidebar_tvmdl' ); ?>
	</section>
	
</div><!-- /.content-wrap -->

<?php get_footer(); ?>
