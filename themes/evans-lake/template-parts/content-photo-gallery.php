<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @package Evans_Lake_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="hero-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php evans_lake_breadcrumbs(); ?>
  <h2><?php echo get_the_title( $post ); ?></h2>
	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
