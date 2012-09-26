<?php
/**
 * The Footer widget areas.
 *
 * @package WordPress
 * @subpackage agrilifeorg
 * @since agrilifeorg 1.0
 */
?>

<?php if ( !is_front_page() ) : ?>
<div id="agency-nav" class="two-of-3">
	<ul>
		<li class="top-agency tfs-item"><a href="<?php echo site_url('/agrilife-agencies/tfs/') ?>" class="ir"><span class="state-agency-name">Texas A&amp;M Forest Service</span></a></li>
		<li class="top-agency tvmdl-item"><a href="<?php echo site_url('/agrilife-agencies/tvmdl/') ?>" class="ir"><span class="state-agency-name">Texas A&amp;M Veterinary Medical Diagnostics Laboratory</span></a></li>								
		<li class="top-agency ext-item"><a href="<?php echo site_url('/agrilife-agencies/extension/') ?>" class="ir"><span class="state-agency-name">Texas A&amp;M AgriLife Extension Service</span></a></li>
		<li class="top-agency res-item"><a href="<?php echo site_url('/agrilife-agencies/research/') ?>" class="ir"><span class="state-agency-name">Texas A&amp;M AgriLife Research</span></a></li>
		<li class="top-agency col-item"><a href="<?php echo site_url('/agrilife-agencies/college/') ?>" class="ir"><span class="state-agency-name">Texas A&amp;M College of Agriculture and Life Sciences</span></a></li>												
	</ul>				
</div><!-- #agency-nav -->
<?php endif; ?>