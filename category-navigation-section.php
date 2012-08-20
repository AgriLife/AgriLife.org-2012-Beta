<?php 
// Get the ID of a given category
$extension_cat_id = get_category_by_slug( 'farm-ranch' ); 
$vc_cat_id = get_category_by_slug( 'lawn-garden' ); 
$college_cat_id = get_category_by_slug( 'life-health' );
$research_cat_id = get_category_by_slug( 'environment' );
$tvmdl_cat_id = get_category_by_slug( 'business' );
$forestry_srv_cat_id = get_category_by_slug( 'science-and-technology' );

// Get the link for a given category
$extension_cat_link = get_category_link( $extension_cat_id );
$vc_cat_link = get_category_link( $vc_cat_id );
$college_cat_link = get_category_link( $college_cat_id );
$research_cat_link = get_category_link( $research_cat_id );
$tvmdl_cat_link = get_category_link( $tvmdl_cat_id );
$forestry_svc_cat_link = get_category_link( $forestry_srv_cat_id );
?>

	<section class="cat-nav-container clearfix">			
		<article class="media-box cat-nav cat-farm-ranch one-of-3 first clearfix">
		<div class="mb-inner cat-nav-inner">				
			<header class="mb-head cat-nav-head">
				<h1 class="cat-nm cat-nm-farm-ranch"><a href="<?php echo esc_url( $extension_cat_link ); ?>">Vice Chancellor's Office</a></h1>
			</header>
		<?php cat_loop('farm-ranch') ?>				
		</div><!-- .end mb-inner -->	
		</article><!-- .end media-box -->

		<article class="media-box cat-nav cat-lawn-garden one-of-3 second clearfix">
		<div class="mb-inner cat-nav-inner">				
			<header class="mb-head cat-nav-head">
				<h1 class="cat-nm cat-nm-lawn-garden"><a href="<?php echo esc_url( $vc_cat_link ); ?>">Texas A&amp;M Forestry Service</a></h1>
			</header>
		<?php cat_loop('tfs') ?>
		</div><!-- .end mb-inner -->			
		</article><!-- .end media-box -->

		<article class="media-box cat-nav cat-life-health one-of-3 third clearfix">
		<div class="mb-inner cat-nav-inner">				
			<header class="mb-head cat-nav-head">
				<h1 class="cat-nm cat-nm-life-health"><a href="<?php echo esc_url( $college_cat_link ); ?>">Texas A&amp;M AgriLife Research</a></h1>
			</header>
		<?php cat_loop('research') ?>			
		</div><!-- .end mb-inner -->
		</article><!-- .end media-box -->

		<article class="media-box cat-nav cat-environment one-of-3 fourth clearfix">
		<div class="mb-inner cat-nav-inner">				
			<header class="mb-head cat-nav-head">
				<h1 class="cat-nm cat-nm-environment"><a href="<?php echo esc_url( $environment_cat_link ); ?>">College of Agriculture and Life Sciences</a></h1>
			</header>
		<?php cat_loop('college') ?>
		</div><!-- .end mb-inner -->			
		</article><!-- .end media-box -->
	
		<article class="media-box cat-nav cat-business one-of-3 fifth clearfix">
		<div class="mb-inner cat-nav-inner">				
			<header class="mb-head cat-nav-head">
				<h1 class="cat-nm cat-nm-business"><a href="<?php echo esc_url( $tvmdl_cat_link ); ?>">Texas A&amp;M Veterinary Medical Diagnostic Clinic</a></h1>
			</header>
		<?php cat_loop('tvmdl') ?>		
		</div><!-- .end mb-inner -->	
		</article><!-- .end media-box -->
			
		<article class="media-box cat-nav cat-science-technology one-of-3 last clearfix">
		<div class="mb-inner cat-nav-inner">				
			<header class="mb-head cat-nav-head">
				<h1 class="cat-nm cat-nm-science-technology"><a href="<?php echo esc_url( $forestry_svc_cat_link ); ?>">Texas A&amp;M AgriLife Extension Service</a></h1>
			</header>
		<?php cat_loop('extension') ?>		
		</div><!-- .end mb-inner -->	
		</article><!-- .end media-box -->
	</section><!-- .end cat-nav-container -->