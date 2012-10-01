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
				<img src="<?php bloginfo('template_directory'); ?>/images/landing/beckham.jpg" alt="Dr. Tammy Beckham" class="director-mug" title="Dr. Tammy Beckham" />
				<h2>Dr. Tammy Beckham</h2>
				<h4 class="landing-contact">Contact</h4>
				<p>1 Sippel Rd.<br />
				College Station, TX 77843</p>
				<h4 class="landing-contact">Phone</h4>
				<a class="phone" href="tel://979.845.3414">979.845.3414</a>
				
				<a href="http://agrilife.org/beta/about/leadership/tammy-beckham/"><img src="<?php bloginfo('template_directory'); ?>/images/landing/learn-beckham.png" alt="Dr. Tammy Beckham Bio" class="director-bio-btn" title="Dr. Tammy Beckham" /></a>
				<a href="http://tvmdl.tamu.edu/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/landing/explore-tvmdl-2.png" alt="Texas A&amp;M Veterinary Medical Diagnostic Clinic" class="agency-link-btn" title="Texas A&amp;M Veterinary Medical Diagnostic Clinic" /></a>
				
			</div>
		</aside>
		<?php dynamic_sidebar( 'sidebar_tvmdl' ); ?>
	</section>
</div><!-- /.content-wrap -->

<?php get_footer(); ?>
