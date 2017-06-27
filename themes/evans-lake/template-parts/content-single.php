<?php
/**
 * Template part for displaying single posts.
 *
 * @package Evans_Lake_Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<div class="entry-meta">
			<?php evans_lake_posted_on(); ?> / <?php evans_lake_comment_count(); ?> / <?php evans_lake_posted_by(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php 
		the_content();
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
			'after'  => '</div>',
		) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php evans_lake_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
