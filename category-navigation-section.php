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
				<h1 class="cat-nm cat-nm-vc"><a href="#">Vice Chancellor's Office</a></h1>
			</header>
			<a class="mb-link cat-nav-post-link clearfix" href="../vc/">				
				<img src="http://placekitten.com/320/130" alt="AgriLife Research" class="wp-post-image" title="AgriLife Research" />
				<p class="mb-post-title home-agency-intro">We are all a part of the Texas A&amp;M University System because we want feed the world, improve health, enrich our youth, grow our economy and protect the environment.</p>
			</a>
		</div><!-- .end mb-inner -->	
		</article><!-- .end media-box -->

		<article class="media-box cat-nav cat-lawn-garden one-of-3 second clearfix">
		<div class="mb-inner cat-nav-inner">				
			<header class="mb-head cat-nav-head">
				<h1 class="cat-nm cat-nm-forest"><a href="#">Texas A&amp;M Forestry Service</a></h1>
			</header>
			<a class="mb-link cat-nav-post-link clearfix" href="texasforestservice/">				
				<img src="http://placekitten.com/320/130" alt="Forestry Service" class="wp-post-image" title="Forestry Service" />
				<p class="mb-post-title home-agency-intro">The Texas A&amp;M Forest Service is the lead agency for the state for all-hazard responses, including suppression of wildfires and the management of state disasters such as the Space Shuttle Columbia recovery and Hurricanes Katrina, Rita and Ike.</p>
			</a>
		</div><!-- .end mb-inner -->			
		</article><!-- .end media-box -->

		<article class="media-box cat-nav cat-research one-of-3 third clearfix">
		<div class="mb-inner cat-nav-inner">				
			<header class="mb-head cat-nav-head">
				<h1 class="cat-nm cat-nm-research"><a href="#">Texas A&amp;M AgriLife Research</a></h1>
			</header>
			<a class="mb-link cat-nav-post-link clearfix" href="agriliferesearch/">				
				<img src="http://placekitten.com/320/130" alt="AgriLife Research" class="wp-post-image" title="AgriLife Research" />
				<p class="mb-post-title home-agency-intro">With more than 585 research projects in agriculture, natural resources, food and life sciences, Texas A&amp;M AgriLife Research is meeting modern challenges through innovative solutions.</p>
			</a>			
		</div><!-- .end mb-inner -->
		</article><!-- .end media-box -->

		<article class="media-box cat-nav cat-environment one-of-3 fourth clearfix">
		<div class="mb-inner cat-nav-inner">				
			<header class="mb-head cat-nav-head">
				<h1 class="cat-nm cat-nm-college"><a href="#">College of Agriculture and Life Sciences</a></h1>
			</header>
			<a class="mb-link cat-nav-post-link clearfix" href="aboutcollege/">				
				<img src="http://placekitten.com/320/130" alt="AgriLife Research" class="wp-post-image" title="AgriLife Research" />
				<p class="mb-post-title home-agency-intro">The College of Agriculture and Life Sciences includes nearly 7,000 students enrolled in the college choose courses of study from more than 80 undergraduate and graduate degree programs in 14 academic departments. </p>
			</a>
		</div><!-- .end mb-inner -->			
		</article><!-- .end media-box -->
	
		<article class="media-box cat-nav cat-business one-of-3 fifth clearfix">
		<div class="mb-inner cat-nav-inner">				
			<header class="mb-head cat-nav-head">
				<h1 class="cat-nm cat-nm-tvmdl"><a href="#">Texas A&amp;M Veterinary Medical Diagnostic Clinic</a></h1>
			</header>
			<a class="mb-link cat-nav-post-link clearfix" href="tvmdl/">				
				<img src="http://placekitten.com/320/130" alt="AgriLife Research" class="wp-post-image" title="AgriLife Research" />
				<p class="mb-post-title home-agency-intro">Texas Veterinary Medical Diagnostic Laboratory handles more than 700 daily submissions, more than 220,000 annual submissions and runs nearly 1.4 million tests per year from Texas, neighboring states and around the world.</p>
			</a>	
		</div><!-- .end mb-inner -->	
		</article><!-- .end media-box -->
			
		<article class="media-box cat-nav cat-science-technology one-of-3 last clearfix">
		<div class="mb-inner cat-nav-inner">				
			<header class="mb-head cat-nav-head">
				<h1 class="cat-nm cat-nm-extension"><a href="#">Texas A&amp;M AgriLife Extension Service</a></h1>
			</header>
			<a class="mb-link cat-nav-post-link clearfix" href="/aboutagrilifeextension/">				
				<img src="http://placekitten.com/320/130" alt="AgriLife Research" class="wp-post-image" title="AgriLife Research" />
				<p class="mb-post-title home-agency-intro">Current efforts of the more than 104,000 volunteers supporting Texas A&M AgriLife Extension programs include strengthening emergency preparedness; improving family financial management;  and demonstrating state-of-the-art technologies and management practices in production agriculture.</p>
			</a>		
		</div><!-- .end mb-inner -->	
		</article><!-- .end media-box -->
	</section><!-- .end cat-nav-container -->