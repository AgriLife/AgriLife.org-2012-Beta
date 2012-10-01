<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage agrilifeorg
 * 
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php agrilifeorg_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>	
		<?php $media_info = get_post_meta( $post->ID,'cmb_media_info', TRUE ); ?>
		<?php if ($media_info): ?>			
		<div class="for-media-wrap entry-meta">			
		<button id="media-info-button">Contacts</button>	
		<div class="for-media entry-meta">				
				<?php echo $media_info; ?>
		</div><!-- .for-media -->						
		</div><!-- .for-media-wrap -->				
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'agrilifeorg' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
<!--
	<footer class="entry-meta">
		
		<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'agrilifeorg' ) );

			/* translators: used between list items, there is a space after the comma */
	
			if ( '' != $categories_list ) {
			$utility_text = __( 'This entry was posted in %1$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'agrilifeorg' );
			} else {
				$utility_text = __( 'This entry was posted by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'agrilifeorg' );
			}

			printf(
				$utility_text,
				$categories_list,
				$tag_list,
				esc_url( get_permalink() ),
				the_title_attribute( 'echo=0' ),
				get_the_author(),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
			);
		?>
	</footer>
	-->
	<!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
