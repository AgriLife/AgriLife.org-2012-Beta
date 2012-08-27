<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage flexopotamus
 * @since flexopotamus 1.0
 */

?>
	<section id="sidebar" class="sidebar one-of-3 column" role="navigation">			
	
		<?php if ( ! dynamic_sidebar( 'Main Sidebar' ) ) : ?>

				<aside id="archives" class="widget">
					<h3 class="widget-title"><?php _e( 'Archives', 'flexopotamus' ); ?></h3>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h3 class="widget-title"><?php _e( 'Meta', 'flexopotamus' ); ?></h3>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>

		<?php endif; // end aside widget area ?>
	</section><!-- /end .sidebar -->		