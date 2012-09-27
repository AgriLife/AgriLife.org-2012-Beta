<?php 
// Template Name: Home page

get_header(); ?>

		<section class="featured-content clearfix">
<?php
$slider = new AgriLife_FlexSlider;
echo $slider->make_slider();
?>
			<div class="one-of-3 clearfix featured-stories-container"> 
			<ol class="featured-stories"> 
			<?php 
			global $post, $do_not_duplicate;
			$do_not_duplicate = array(); // set befor loop variable as array
			//$my_query = new WP_Query('meta_key=feature-homepage&meta_value=1&posts_per_page=3');
			$my_query = new WP_Query('posts_per_page=5');
			$count = 0;
			while ($my_query->have_posts()) : $my_query->the_post();
  			$do_not_duplicate[] = $post->ID; // remember ID's in loop
  			$category = get_the_category();
	  		$count++;
	  		?>
			<li class="media-box slideshow-thumb-item item-<?php echo $count;?> agency-<?php echo $category[0]->slug; ?>">
				<div class="mb-inner">
				
					
					<a href="<?php the_permalink();?>" id="l<?php echo $count;?>" class="mb-link">
						<?php
						/* <pre><?php print_r($category);?></pre>
						if ( has_post_thumbnail() ) {
			  				the_post_thumbnail('feature-thumb'); 
						} else  { 
							echo '<img src="'.get_bloginfo("template_url").'/images/AgriLife-default-post-image.png" alt="AgriLife Logo" title="AgriLife" class="attachment-feature-thumb wp-post-image" />'; 
				}	*/
					
					
					//echo $category[0]->slug;
					
					//echo '<img src="'.get_bloginfo("template_url").'/images/logo-'.$category[0]->slug.'.png" alt="'.$category[0]->cat_name.' Logo" title="'.$category[0]->cat_name.' Logo" class="home-slideshow-logo" />';
				
					?>	
						<h2 class="mb-post-title cat-post-title"><?php the_title(); ?></h2>
					</a>
				</div>				
			</li>				
																			
			<?php endwhile;  wp_reset_query(); ?>					
		</ol>
	</div>
		</section> 
		
		<div class="content-wrap">
		<section id="content" role="main" class="two-of-3 column">

				<?php the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

		</section><!-- /end #content -->
		<section id="sidebar" role="main" class="one-of-3 column">
			<?php if ( ! dynamic_sidebar( 'Home Page Sidebar' ) ) : ?>		
				
				
			<?php endif; ?>
		</section><!-- /end #content -->
		</div>
		

		<section class="home-widgets-lower clearfix">
		<?php if ( ! dynamic_sidebar( 'Home: Main Widget Area' ) ) : ?>
			
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
			
			<aside id="pages-2" class="widget widget_pages last"><h3 class="widget-title">Widget</h3>		<ul>
						<li class="page_item page-item-25"><a href="http://localhost/~travis/wordpress/agrilifeorg/extension/">Extension</a></li>
			<li class="page_item page-item-5 current_page_item"><a href="http://localhost/~travis/wordpress/agrilifeorg/">Home</a></li>
			<li class="page_item page-item-2"><a href="http://localhost/~travis/wordpress/agrilifeorg/sample-page/">Sample Page</a></li>
					</ul>
			</aside>					
		
		<?php endif; ?>
		</section><!-- .end home-widget-lower -->		


<?php /* ?>	
<div class="content-wrap">
				
	<section id="content" role="main" class="two-of-3 column">
	<div class="spotlight-section">	
		<h1 class="section-title">Spotlight Stories</h1>			
		
		<?php $my_query = new WP_Query( 
			array(
				'meta_key' =>  'feature-homepage',
				'meta_value' => 1,
				'posts_per_page' => 3,
				'post__not_in' => $do_not_duplicate
				    )
			);
  		$do_not_duplicate[] = $post->ID; while ($my_query->have_posts()) : $my_query->the_post();
  		update_post_caches($posts);
  		?>
		<article class="media-box post spotlight clearfix">
		<div class="mb-inner">				
			<header class="mb-head">
			<h2 class="mb-post-title entry-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
			</header>
			<a class="mb-link spotlight clearfix" href="<?php the_permalink();?>">				
				<?php
						if ( has_post_thumbnail() ) {
			  				the_post_thumbnail('feature-thumb'); 
						} else  { 
							echo '<img src="'.get_bloginfo("template_url").'/images/AgriLife-default-post-image.png" alt="AgriLife Logo" title="AgriLife" />'; 
				}	?>		
				<?php the_excerpt(); ?>
			</a>
		</div><!-- .end mb-inner -->			
		</article><!-- .end media-box -->
		<?php endwhile;  wp_reset_query(); ?>
		
	</div>
	
	<div class="recent-stories clearfix">
		<h1 class="section-title">Recent Stories</h1>
		
		<div class="recent-column-first one-of-2">
			
		<?php $my_query = new WP_Query( 
			array(
				'posts_per_page' => 2,
				'post__not_in' => $do_not_duplicate
				    )
			);
  		$do_not_duplicate[] = $post->ID; while ($my_query->have_posts()) : $my_query->the_post();
  		update_post_caches($posts);
  		?>			
			<article class="post">
			<header class="entry-header">
				<h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->
			</article>
			
		<?php endwhile;  wp_reset_query(); ?>
			
		</div><!-- /recent-column-first -->

		<div class="recent-column-second one-of-2">			
		<?php $my_query = new WP_Query( 
			array(
				'posts_per_page' => 2,
				'offset' => 2,
				'post__not_in' => $do_not_duplicate
				    )
			);

  		$do_not_duplicate[] = $post->ID; while ($my_query->have_posts()) : $my_query->the_post();
  		update_post_caches($posts);
  		?>			
			<article class="post">
			<header class="entry-header">
				<h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->
			</article>
			
		<?php endwhile;  wp_reset_query(); ?>
		
		</div><!-- /recent-column-second -->			
	</div>	

	</section><!-- /end #content -->
	
	<section id="sidebar" class="sidebar one-of-3 column" role="navigation">

	<?php top_sidebar_section() ?>
	
		<?php if ( ! dynamic_sidebar( 'Home Page Sidebar' ) ) : ?>

		<?php endif; // end aside widget area ?>
	
	</section><!-- /end .sidebar -->
	
</div><!-- /.content-wrap -->
<?php */ ?>	
<?php get_footer(); ?>
