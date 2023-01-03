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
		<a href="http://tamus.edu" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/footer-tamus.png" id="footer-tamus" alt="Texas A&amp;M University System Member" title="Texas A&amp;M University System Member" width="104" height="78" /></a>
		<ul class="req-links">
			<li><a href="<?php echo site_url('/required-links/compact/') ?>">Compact with Texans</a></li>
			<li><a href="<?php echo site_url('/required-links/privacy/') ?>">Privacy and Security</a></li>
			<li><a href="http://itaccessibility.tamu.edu/" target="_blank">Accessibility Policy</a></li>
			<li><a href="http://www2.dir.state.tx.us/pubs/Pages/weblink-privacy.aspx" target="_blank">State Link Policy</a></li>
			<li><a href="https://www.tsl.texas.gov/trail/index.html" target="_blank">Statewide Search</a></li>
			<li><a href="https://aggie.tamu.edu/financial-aid/veterans" target="_blank">Veterans Benefits</a></li>
			<li><a href="https://fch.tamu.edu/programs/military-programs/" target="_blank">Military Families</a></li>
			<li><a href="https://secure.ethicspoint.com/domain/en/report_custom.asp?clientid=19681" target="_blank">Risk, Fraud &amp; Misconduct Hotline</a></li>
			<li><a href="http://www.texashomelandsecurity.com/" target="_blank">Texas Homeland Security</a></li>
			<li><a href="http://veterans.portal.texas.gov/">Texas Veteran&apos;s Portal</a></li>
			<li><a href="http://aghr.tamu.edu/education-civil-rights.htm" target="_blank">Equal Opportunity for Educational Programs Statement</a></li>
			<li class="last"><a href="<?php echo site_url('/required-links/orpi/') ?>">Open Records/Public Information</a></li>
		</ul>				
	</footer>
		
	</div><!-- .page -->
	
<?php wp_footer(); ?>	

<!-- end scripts-->
</body>
</html>
