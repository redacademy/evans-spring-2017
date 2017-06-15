<?php
/**
 * 
 * 
 * The template for displaying the Our Team page.
 *
 * @package Evans_Lake_Theme
 */

get_header(); ?>

<div class="hero-image"><?php the_post_thumbnail( 'full' ); ?></div>
<div id="primary" class="content-area container">
	<div class="sub-navigation">
		<?php wp_nav_menu( array( 
			'theme_location' => 'primary', 
			'menu_id' => 'primary-menu',
			'submenu' => get_the_title($post->post_parent)
		) ); ?>
	</div>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content', 'page' ); ?>
		<?php endwhile; // End of the loop. ?>
	
	<!--Query for Custom Post Data-->
	<?php 
		$args = array(
			'post_type'=> 'staffmember',
			'post_count'=> 50,
			'posts_per_page'=> 50
			);
		$all_staff = new WP_Query($args);
		// Create storage arrays
		// $full_time = [];
		// $summer = [];
		// $director = [];
		// $executive = [];
	?>
	
		<!--Populate arrays-->
		<?php foreach ($all_staff->posts as $staff_member): 
		?>
		<div>
			<pre>
				<?php CFS()->get(false, $staff_member->ID); ?>
			</pre>
		</div>
		<?php endforeach; ?>		

	<main id="main" class="site-main" role="main">
		<?php get_template_part( 'template-parts/content', 'staff-fulltime' ); ?>

<!--board of directors loop-->

<!--Summer Camp staff loop-->



	</main><!-- #main -->
</div><!-- #primary -->
<?php wp_reset_query(); ?>
<?php get_footer(); ?>
