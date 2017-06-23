<?php
/**
 * The template for displaying blog posts archive (news and events).
 *
 * @package Evans_Lake_Theme
 */

get_header();
get_sidebar(); ?>

<div class="hero">
	<!--Background styled in extras.php/evans_lake_hero_image_update()-->
	<div class="hero-image">
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
