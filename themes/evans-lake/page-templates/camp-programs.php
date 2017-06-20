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

		<header class="entry-header">
			<h2><?php echo the_title(); ?></h2>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
			
		<!--from page: camp programs 2017-->
		<!--Description-->

		<!--Taxonomy titles and scriptions-->
		<?php 
			$term_ids = get_the_terms ( $taxonomy );
			echo term_description( $term_id, $taxonomy );  
		?>

		<?php while ( have_posts() ) : the_post(); ?>
		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
