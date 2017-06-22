<?php
/**
 * The template for displaying blog posts archive (news and events).
 *
 * @package Evans_Lake_Theme
 */

get_header();
get_sidebar(); ?>

<div class="hero">
<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
	<div class="hero-image" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .35) 0%, rgba(0, 0, 0, .35) 100%), url('<?php echo $thumb['0'];?>'); background-size: cover,cover; background-position: center, center;">
	</div>
</div>
<div id="primary" class="content-area container">
	<main id="main" class="site-main" role="main">

<div class="box-pop-out">
	Content
</div>

		<?php while ( have_posts() ) : the_post(); ?>
			<div class="single-container box-pop-out">
				<?php get_template_part( 'template-parts/content', 'single' ); ?>			
			</div>
			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
