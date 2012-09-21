<?php
// Our include
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

global $query;
// Our variables
$numPosts = (isset($_GET['numPosts'])) ? $_GET['numPosts'] : 0;
$page = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 0;
$metaKey = (isset($_GET['metaKey'])) ? $_GET['metaKey'] : 0;
$metaValue = (isset($_GET['metaValue'])) ? $_GET['metaValue'] : 0;
$categoryId = (isset($_GET['categoryId'])) ? $_GET['categoryId'] : 0;

query_posts(array(
	'posts_per_page' => $numPosts,
	'paged'          => $page,
	'meta_key' 		 => $metaKey,
	'meta_value' 	 => $metaValue,	
	'cat' 	 		 => $categoryId	
));

	// our loop
	if (have_posts()) {
		$count = 1; ?>
		<ul class="slides">	
		<?php while (have_posts()){ 
			the_post();	?>	 
						<li id="slide<?php echo $count; ?>">
							<a href="<?php the_permalink(); ?>" id="slide#<?php echo $count; ?>">
								<?php //the_post_thumbnail('feature-large'); ?>
								<img src="http://placekitten.com/660/400" />
								<div class="slide-details">
									<h2><?php the_title(); ?></h2>
								</div>
							</a>
						</li>
	<?php $count++; }
	} ?>
	</ul>
	<?php wp_reset_query(); ?>

