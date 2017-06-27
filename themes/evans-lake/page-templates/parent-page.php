<?php
/**
 * Template Name: Parent Page
 *
 * The template for displaying all parent/root pages.
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
	<div class="sub-navigation">
		<?php wp_nav_menu( array( 
			'theme_location' => 'primary', 
			'menu_id' => 'primary-menu',
			'submenu' => get_the_title($post->post_parent)
		) ); ?>
	</div>

	<main id="main" class="site-main" role="main">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php evans_lake_breadcrumbs(); ?>
			<div class="banners">
				<?php $banners = CFS()->get('root_loop');?>
				<?php echo "Print banners"; print_r ($banners); ?>
				<?php foreach ($banners as $banner){ ?>
					<div class="banner">
						<h3 class="banner-title"><?php echo $banner['root_title'];?></h3>
						<div class="banner-image" style="background-image: url('<?php echo $banner['root_banner'];?>');"></div>
					</div>
				<?php }; ?>
			</div>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'parent' ); ?>

		<?php endwhile; // End of the loop. ?>
    </article>
    
	</main><!-- #main -->

</div><!-- #primary -->

<?php get_footer(); ?>
