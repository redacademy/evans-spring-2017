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
	<h1 class="hero-title"><?php the_title(); ?></h1>
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
		<?php evans_lake_breadcrumbs(); ?>
		<h2><?php the_title(); ?></h2>
		<div class="banners">
			<?php $banners = CFS()->get('root_loop');?>
			<?php foreach ($banners as $banner){ ?>
				<?php $page_id = $banner['root_link'][0]; ?>
				<?php $link = get_page_link ($page_id); ?>
				<a href="<?php echo $link; ?>">
					<div class="banner-image" style="background-image: url('<?php echo $banner['root_banner'];?>');">
						<h2 class="banner-title"><?php echo $banner['root_title'];?></h2>
					</div>
				</a>
				<?php }; ?>
		</div>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'parent' ); ?>

		<?php endwhile; // End of the loop. ?>
    
	</main><!-- #main -->

</div><!-- #primary -->

<?php get_footer(); ?>
