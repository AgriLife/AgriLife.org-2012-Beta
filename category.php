<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage flexopotamus
 */
$catNameId = get_query_var('cat');
$catName = single_cat_title("", false);
$catSlug = get_category($catNameId);
get_header(); ?>
		<section class="featured-content clearfix">
			<header class="featured-content-header">
					<h1 class="cat-page-title cat-title-<?php print_r( $catSlug->slug ) ?>">
						<span class="page-title section-title">
							<?php print_r( $catName ); ?>
						</span>
					</h1>
			</header>
			<div id="feature-container">
	             <img id="loading" src="<?php bloginfo('stylesheet_directory'); ?>/images/ajax-loader.gif" />
			</div>
			<div class="one-of-3 clearfix featured-stories-container"> 
			<ol class="featured-stories"> 
			<?php 
			global $post, $do_not_duplicate;
			$do_not_duplicate = array(); // set befor loop variable as array
			$my_query = new WP_Query('meta_key=feature-homepage&meta_value=1&posts_per_page=3&cat='.$catNameId);
			$count = 0;
			while ($my_query->have_posts()) : $my_query->the_post();
  			$do_not_duplicate[] = $post->ID; // remember ID's in loop

	  		$count++;
	  		?>
			<li class="media-box slideshow-thumb-item item-<?php echo $count;?>">
				<div class="mb-inner">
					<a href="<?php the_permalink();?>" id="l<?php echo $count;?>" class="mb-link">
						<?php
						if ( has_post_thumbnail() ) {
			  				the_post_thumbnail('feature-thumb'); 
						} else  { 
							echo '<img src="'.get_bloginfo("template_url").'/images/AgriLife-default-post-image.png" alt="AgriLife Logo" title="AgriLife" />'; 
				}	?>	
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

			<?php if ( have_posts() ) : ?>

				<header class="page-header">

					<?php
						$category_description = category_description();
						if ( ! empty( $category_description ) )
							echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
					?>
				</header>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php flexopotamus_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'flexopotamus' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'flexopotamus' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

	</section><!-- /end #content -->

<?php get_sidebar(); ?>
	
</div><!-- /.content-wrap -->

<?php get_footer(); ?>
