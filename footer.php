<?php
/**
 * The template for displaying the footer.
 *
 *
 * @package WordPress
 * @subpackage agrilifeorg
 * 
 */
?>
	
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