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

$agencies = array(
  'extension',
  'research',
  'college',
  'tfs',
  'tvmdl'
);

foreach( $agencies as $a ) {
  $cats[] = get_category_by_slug( $a );
}

// Setup arguments for the posts query
$cat_args = array(
  ''
);
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
<?php print_r($cats); ?>
		<ul class="slides">	
		<?php while (have_posts()){ 
			the_post();	?>	 
						<li id="slide<?php echo $count; ?>">
							<a href="<?php the_permalink(); ?>" id="slide#<?php echo $count; ?>">
								<?php //the_post_thumbnail('feature-large'); ?>
								<img src="http://agrilife.org/beta/files/2012/09/Nectarine-sliced.jpg" />
								<div class="slide-details">
									<h2><?php the_title(); ?></h2>
								</div>
							</a>
						</li>
	<?php $count++; }
	} ?>
	</ul>
	<?php wp_reset_query(); ?>

