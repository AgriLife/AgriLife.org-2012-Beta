<?php
/**
 * The template for displaying the footer.
 *
 *
 * @package WordPress
 * @subpackage flexopotamus
 * 
 */

if (is_category()) {
	$catId = get_query_var('cat');
} else {
	$catId = "non-category";
}

?>
<?php // if (!is_front_page()) category_navigation_section() ?>
	<footer class="site-footer" id="footer" data-url="<?php bloginfo('wpurl'); ?>/" data-theme="<?php bloginfo('template_directory'); ?>/" data-page="<?php echo $catId ?>" role="contentinfo">
		
		<?php if ( ! dynamic_sidebar( 'Footer Area One' ) ) : ?>
			
		<aside class="footer-info-container one-of-3">
			<div class="footer-info-wrap">
				<h1 class="footer-info-title photos">Photos</h1>
				<ul class="flickr-photos clearfix">
					<li><a href=""><img src="<?php bloginfo('stylesheet_directory') ?>/images/corn-thumb.jpg" alt="" width="50" height="50" /></a></li>
					<li><a href=""><img src="<?php bloginfo('stylesheet_directory') ?>/images/boat-thumb.jpg" alt="" width="50" height="50"  /></a></li>
					<li><a href=""><img src="<?php bloginfo('stylesheet_directory') ?>/images/landscape-thumb.jpg" alt="" width="50" height="50"  /></a></li>
					<li><a href=""><img src="<?php bloginfo('stylesheet_directory') ?>/images/corn-thumb.jpg" alt=""  width="50" height="50" /></a></li>					
					<li><a href=""><img src="<?php bloginfo('stylesheet_directory') ?>/images/boat-thumb.jpg" alt=""  width="50" height="50" /></a></li>					
					<li><a href=""><img src="<?php bloginfo('stylesheet_directory') ?>/images/landscape-thumb.jpg" alt="" width="50" height="50"  /></a></li>					
					<li><a href=""><img src="<?php bloginfo('stylesheet_directory') ?>/images/corn-thumb.jpg" alt=""  width="50" height="50" /></a></li>
					<li><a href=""><img src="<?php bloginfo('stylesheet_directory') ?>/images/landscape-thumb.jpg" alt="" width="50" height="50"  /></a></li>																									
				</ul>
				<p><a class="button" href="">Flickr Photos</a></p>
			</div><!-- .end footer-info-wrap -->
		</aside><!-- .end footer-info-container -->
		<?php endif; ?>
	
		<?php if ( ! dynamic_sidebar( 'Footer Area Two' ) ) : ?>	
	
		<aside class="footer-info-container one-of-3">
			<div class="footer-info-wrap">
				<h1 class="footer-info-title videos">Videos</h1>
				<p><object width="250" height="157"><param name="movie" value="http://www.youtube.com/v/Pt21XOPgGcY?version=3&amp;hl=en_US"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/Pt21XOPgGcY?version=3&amp;hl=en_US" type="application/x-shockwave-flash" width="250" height="157" allowscriptaccess="always" allowfullscreen="true"></embed></object> </p>	
				<p><a class="button" href="">YouTube Videos</a></p>
			</div><!-- .end footer-info-wrap -->
		</aside><!-- .end footer-info-container -->
		<?php endif; ?>
		
		<?php if ( ! dynamic_sidebar( 'Footer Area Three' ) ) : ?>
		
		<aside class="footer-info-container one-of-3 last">
			<div class="footer-info-wrap">
				<h1 class="footer-info-title twitter">Tweets</h1>

				<p><a class="button" href="">Twitter Updates</a></p>
			</div><!-- .end footer-info-wrap -->
		</aside><!-- .end footer-info-container -->	
		<?php endif; ?>
							
	</footer>
        
	</div><!-- .wrap -->	
	</div><!-- .page -->
	
	
<?php wp_footer(); ?>	

	<!-- end scripts-->
	
</body>
</html>