<?php
/**
 * Template name: Research Landing Page
 */

get_header(); ?>

<div class="content-wrap landing-page">
	<section id="content" role="main" class="two-of-3 column">
			
			<h1 class="section-title landing-research">Texas A&amp;M AgriLife Research</h1>

				<?php the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>
				
				<div class="landing-widgets-lower">
				<?php if ( ! dynamic_sidebar( 'research-widget-area' ) ) : ?>
				<?php endif; ?>
				</div>
				
	</section><!-- /end #content -->
	
	<section id="sidebar" class="sidebar one-of-3 column" role="navigation">
		<aside id="director_bio" class="widget interior-sidebar">
			<div class="widget-wrap director-bio-wrap">
				<img src="<?php bloginfo('template_directory'); ?>/images/landing/nessler.jpg" alt="Dr. Craig Nessler" class="director-mug" title="Dr. Craig Nessler" />
				<h2>Dr. Craig Nessler</h2>
				<h4 class="landing-contact">Contact</h4>
				<p>Agriculture and Life Sciences Building <br />
				600 John Kimbrough Boulevard, Suite 512 <br />
				College Station, Texas 77843</p>
				<h4 class="landing-contact">Phone</h4>
				<a class="phone" href="tel://979.845.8486">979.845.8486</a>
				
				<a href="http://agrilife.org/beta/about/leadership/craignessler/"><img src="<?php bloginfo('template_directory'); ?>/images/landing/learn-nessler.png" alt="Dr. Nessler Bio" class="director-bio-btn" title="Dr. Nessler" /></a>
				<a href="http://agriliferesearch.tamu.edu/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/landing/explore-research.png" alt="Texas A&amp;M AgriLife Research" class="agency-link-btn" title="Texas A&amp;M AgriLife Research" /></a>
				
			</div>
		</aside>
		<?php dynamic_sidebar( 'sidebar_research' ); ?>
	</section>	
</div><!-- /.content-wrap -->

<?php get_footer(); ?>
