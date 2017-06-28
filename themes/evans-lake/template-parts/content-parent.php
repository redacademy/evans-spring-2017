<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @package Evans_Lake_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content box-pop-out">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
