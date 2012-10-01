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
				<img src="<?php bloginfo('template_directory'); ?>/images/landing/boggus.jpg" alt="Tom G. Boggus" class="director-mug" title="Tom G. Boggus" />
				<h2>Tom G. Boggus</h2>
				<h4 class="landing-contact">Contact</h4>
				<p>200 Technology Way, Suite 1281 <br />
				2136 TAMU<br />
				College Station, TX 77845-2136</p>
				<h4 class="landing-contact">Phone</h4>
				<a class="phone" href="tel://979.458.6600">979.458.6600</a>
				
				<a href="http://agrilife.org/beta/about/leadership/tom-boggus/"><img src="<?php bloginfo('template_directory'); ?>/images/landing/learn-boggus.png" alt="Tom G. Boggus Bio" class="director-bio-btn" title="Tom G. Boggus" /></a>
				<a href="http://texasforestservice.tamu.edu/main/default.aspx" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/landing/explore-tfs.png" alt="Texas A&amp;M Forest Service" class="agency-link-btn" title="Texas A&amp;M Forest Service" /></a>
				
			</div>
		</aside>
		<?php dynamic_sidebar( 'sidebar_forestry' ); ?>
	</section>
</div><!-- /.content-wrap -->

<?php get_footer(); ?>
