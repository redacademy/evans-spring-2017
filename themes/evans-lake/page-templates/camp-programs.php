<?php
/**
 * Template Name: Camp Programs
 * The template for displaying the camp programs page.
 *
 * @package Evans_Lake_Theme
 */

get_header(); 
get_sidebar(); ?>

<div class="hero">
	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
	<div class="hero-image" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .35) 0%, rgba(0, 0, 0, .35) 100%), url('<?php echo $thumb['0'];?>'); background-size: cover,cover; background-position: center, center;">
	</div>
	<?php the_title( '<h1 class="hero-title">', '</h1>' ); ?>


</div>
<div id="primary" class="content-area container">
	<div class="sub-navigation">
		<?php wp_nav_menu( array( 
			'theme_location' => 'primary', 
			'menu_id' => 'primary-menu',
			'submenu' => get_the_title($post->post_parent)
		) ); ?>
	</div>

	<main id="main" class="site-main" role="main">
		<button class="orange-button">Register Now</button>
		<?php 
			evans_lake_breadcrumbs(); 
		?>

		<header class="intro-header entry-header">
			<h2>
				<?php 
					echo get_the_title() . ' ';
					echo CFS()->get( 'camp_year' ); 
				?>
			</h2>
		</header><!-- .entry-header -->

		<div class="intro-content entry-content">
			<?php echo get_the_content(); ?>
		</div>

		<!--Taxonomy titles and scriptions-->
		<?php 
		?>

		<?php while ( have_posts() ) : the_post(); ?>
		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
