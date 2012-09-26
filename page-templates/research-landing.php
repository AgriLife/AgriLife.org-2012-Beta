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
				<img src="<?php bloginfo('template_directory'); ?>/images/landing/steele.jpg" alt="Dr. Craig Nessler" class="director-mug" title="Dr. Craig Nessler" />
				<h2>Dr. Craig Nessler</h2>
				<h4 class="landing-contact">Contact</h4>
				<p>Agriculture and Life Sciences Building <br />
				600 John Kimbrough Boulevard, Suite 512 <br />
				College Station, Texas 77843</p>
				
				<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/landing/btn-maroon-steele.png" alt="Dr. Nessler Bio" class="director-bio-btn" title="Dr. Nessler" /></a>
				
			</div>
		</aside>
		<?php dynamic_sidebar( 'sidebar_research' ); ?>
	</section>	
</div><!-- /.content-wrap -->
<?php get_sidebar('agencies'); ?>
<?php get_footer(); ?>
