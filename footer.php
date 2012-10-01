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
	<?php get_sidebar('agencies'); ?>
	<footer class="site-footer clearfix" id="footer" data-url="<?php bloginfo('wpurl'); ?>/" data-theme="<?php bloginfo('template_directory'); ?>/" data-page="<?php echo $catId ?>" role="contentinfo">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/footer-tamus.png" id="footer-tamus" alt="Texas A&amp;M University System Member" title="Texas A&amp;M University System Member" width="104" height="78" />
		<ul class="req-links">
			<li><a href="http://agrilife.org/vc/compact/">Compact with Texans</a></li>
			<li><a href="http://agrilife.org/vc/privacy/">Privacy and Security</a></li>
			<li><a href="http://itaccessibility.tamu.edu/">Accessibility Policy</a></li>
			<li><a href="http://www.dir.texas.gov/pubs/srrpubs/pages/srrpub11-agencylink.aspx">State Link Policy</a></li>
			<li><a href="http://www.tsl.state.tx.us/trail">Statewide Search</a></li>
			<li><a href="http://aghr.tamu.edu/education-civil-rights.htm">Equal Opportunity for Educational Programs Statement</a></li>
			<li><a href="http://www.tamus.edu/veterans/">Veterans Benefits</a></li>
			<li><a href="http://fcs.tamu.edu/families/military_families/">Military Families</a></li>
			<li><a href="https://secure.ethicspoint.com/domain/en/report_custom.asp?clientid=19681">Risk, Fraud &amp; Misconduct Hotline</a></li>
			<li><a href="http://www.texashomelandsecurity.com/">Texas Homeland Security</a></li>
			<li><a href="http://agrilife.org/vc/orpi/">Open Records/Public Information</a></li>
			<li class="last"><a href="#">Copyright</a></li>
		</ul>				
	</footer>
		
	</div><!-- .page -->
	
<?php wp_footer(); ?>	

<!-- end scripts-->
</body>
</html>
