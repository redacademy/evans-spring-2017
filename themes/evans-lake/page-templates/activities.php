<?php
/**
 * Template Name: Activities
 *
 *
 *
 * @package Evans_Lake_Theme
 */?>


get_header(); 
get_sidebar(); ?>

<div class="hero">
<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
	<div class="hero-image" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .35) 0%, rgba(0, 0, 0, .35) 100%), url('<?php echo $thumb['0'];?>'); background-size: cover,cover; background-position: center, center;">
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

<!--Query for Activity Custom Posts-->
		<?php 
			$args = array(
				'post_type'=> 'activity',
				'post_count'=> 50,
				'posts_per_page'=> 50
			);

			$activities = get_posts($args);
		?>

<!--Iteratively Display Activities-->

	</main><!-- #main -->

</div><!-- #primary -->

<?php get_footer(); ?>
