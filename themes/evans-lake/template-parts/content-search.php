<?php
/**
 * Template part for displaying results in search pages.
 *
 * @package Evans_Lake_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
	
		<?php
			if ( has_post_thumbnail() ) { ?>
				<div class="search-image">
      		<?php the_post_thumbnail( 'full' ); ?>
				</div>
     <?php } else {

			};
		?>
	

	<div class="search-content">
		<header class="entry-header">	
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php evans_lake_posted_on(); ?> / <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?> / <?php evans_lake_posted_by(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	</div>
</article><!-- #post-## -->
