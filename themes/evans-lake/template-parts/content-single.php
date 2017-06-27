<?php
/**
 * Template part for displaying single posts.
 *
 * @package Evans_Lake_Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<ul class="breadcrumbs">
			<li class="item-home">
				<a class="bread-parent" href="<?php echo get_home_url();?>" title="Home">Home</a>
			</li>
			<li class="separator separator-home">></li>
			<li class="item-news">
				<a class="bread-parent" href="<?php echo get_home_url() . '/news-and-events/';?>" title="News and Events">News and Events</a>
			</li>
			<li class="separator">></li>
			<li class="item-current"><?php the_title();?></li>
		</ul>
		<h2><?php the_title(); ?></h2>
	</header>

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
