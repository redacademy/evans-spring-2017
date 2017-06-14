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

	<div class="hero-image"><?php the_post_thumbnail( 'full' ); ?></div>
	<div class="entry-content container">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
