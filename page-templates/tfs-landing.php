<?php
/**
 * Template name: Forestry Landing Page
 */

get_header(); ?>

<div class="content-wrap landing-page">
	<section id="content" role="main" class="two-of-3 column">
			
			<h1 class="section-title landing-tfs">Texas A&amp;M Forest Service</h1>

				<?php the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>
				
				<div class="landing-widgets-lower">
				<?php if ( ! dynamic_sidebar( 'tfs-widget-area' ) ) : ?>
				<?php endif; ?>
				</div>
				
	</section><!-- /end #content -->
	
	<section id="sidebar" class="sidebar one-of-3 column" role="navigation">
		<aside id="director_bio" class="widget interior-sidebar">
			<div class="widget-wrap director-bio-wrap">
				<img src="<?php bloginfo('template_directory'); ?>/images/landing/steele.jpg" alt="Tom G. Boggus" class="director-mug" title="Tom G. Boggus" />
				<h2>Tom G. Boggus</h2>
				<h4 class="landing-contact">Contact</h4>
				<p>John B. Connally Building<br />
				301 Tarrow Street, Suite 364<br />
				2136 TAMU<br />
				College Station, Texas 77840-7896</p>
				
				<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/landing/btn-maroon-steele.png" alt="Tom G. Boggus Bio" class="director-bio-btn" title="Tom G. Boggus" /></a>
				
			</div>
		</aside>
		<?php dynamic_sidebar( 'sidebar_forestry' ); ?>
	</section>
	
</div><!-- /.content-wrap -->

<?php get_footer(); ?>
