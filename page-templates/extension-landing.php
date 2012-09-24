<?php
/**
 * Template name: Extension Landing Page
 */

get_header(); ?>

<div class="content-wrap">
	<section id="content" role="main" class="two-of-3 column">
			
			<h1 class="section-title landing-extension">Texas A&amp;M AgriLife Extension</h1>

				<?php the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php // comments_template( '', true ); ?>
				
				<div class="landing-widgets-lower">
				<?php if ( ! dynamic_sidebar( 'Extension Landing Page: Main Widget Area' ) ) : ?>

					<aside id="pages-2" class="widget widget_pages "><h3 class="widget-title">Widget</h3>		<ul>
								<li class="page_item page-item-25"><a href="http://localhost/~travis/wordpress/agrilifeorg/extension/">Extension</a></li>
					<li class="page_item page-item-5 current_page_item"><a href="http://localhost/~travis/wordpress/agrilifeorg/">Home</a></li>
					<li class="page_item page-item-2"><a href="http://localhost/~travis/wordpress/agrilifeorg/sample-page/">Sample Page</a></li>
							</ul>
					</aside>

					<aside id="pages-2" class="widget widget_pages "><h3 class="widget-title">Widget</h3>		<ul>
								<li class="page_item page-item-25"><a href="http://localhost/~travis/wordpress/agrilifeorg/extension/">Extension</a></li>
					<li class="page_item page-item-5 current_page_item"><a href="http://localhost/~travis/wordpress/agrilifeorg/">Home</a></li>
					<li class="page_item page-item-2"><a href="http://localhost/~travis/wordpress/agrilifeorg/sample-page/">Sample Page</a></li>
							</ul>
					</aside>					

				<?php endif; ?>
				</div>
				
	</section><!-- /end #content -->
	
	
	</section><!-- .end home-widget-lower -->

	<?php dynamic_sidebar( 'sidebar_extension' ); ?>
	
</div><!-- /.content-wrap -->

<?php get_footer(); ?>
