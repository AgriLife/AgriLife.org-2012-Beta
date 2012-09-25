<?php
/**
 * The template for displaying the footer.
 *
 *
 * @package WordPress
 * @subpackage flexopotamus
 * 
 */
?>
	<?php if ( !is_front_page() ) : ?>
	<div id="agency-nav" class="two-of-3">
		<ul>
			<li class="top-agency tfs-item"><a href="http:///txforestservice.tamu.edu/" class="ir"><span class="state-agency-name">Texas A&amp;M Forest Service</span></a></li>
			<li class="top-agency tvmdl-item"><a href="http://tvmdl.tamu.edu/" class="ir"><span class="state-agency-name">Texas A&amp;M Veterinary Medical Diagnostics Laboratory</span></a></li>								
			<li class="top-agency ext-item"><a href="http://agrilifeextension.tamu.edu/" class="ir"><span class="state-agency-name">Texas A&amp;M AgriLife Extension Service</span></a></li>
			<li class="top-agency res-item"><a href="http://agriliferesearch.tamu.edu/" class="ir"><span class="state-agency-name">Texas A&amp;M AgriLife Research</span></a></li>
			<li class="top-agency col-item"><a href="http://aglifesciences.tamu.edu/" class="ir"><span class="state-agency-name">Texas A&amp;M College of Agriculture and Life Sciences</span></a></li>												
		</ul>				
	</div><!-- #agency-nav -->
	<?php endif; ?>
	
	
	</div><!-- .wrap -->
	
	<footer class="site-footer" id="footer" data-url="<?php bloginfo('wpurl'); ?>/" data-theme="<?php bloginfo('template_directory'); ?>/" data-page="<?php echo $catId ?>" role="contentinfo">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/footer-tamus.png" id="footer-tamus" alt="Texas A&amp;M University System Member" title="Texas A&amp;M University System Member" width="104" height="78" />
		<ul class="req-links">
			<li><a href="#">Compact with Texans</a></li>
			<li><a href="#">Privacy and Security</a></li>
			<li><a href="#">Accessibility Policy</a></li>
			<li><a href="#">State Link Policy</a></li>
			<li><a href="#">Statewide Search</a></li>
			<li><a href="#">Equal Opportunity for Educational Programs Statement</a></li>
			<li><a href="#">Veterans Benefits</a></li>
			<li><a href="#">Military Families</a></li>
			<li><a href="#">Risk, Fraud &amp; Misconduct Hotline</a></li>
			<li><a href="#">Texas Homeland Security</a></li>
			<li><a href="#">Open Records/Public Information</a></li>
			<li class="last"><a href="#">Copyright</a></li>
		</ul>				
	</footer>
		
	</div><!-- .page -->
	
<?php wp_footer(); ?>	

<!-- end scripts-->
</body>
</html>