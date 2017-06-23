<?php
/**
 * The template for displaying the weddings page.

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
    <button class="orange-button reg-now">Request Information</button> 

		<?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'template-parts/content', 'page' ); ?>

		

    	<?php // Produce tabs	?>
		<div class="tabbed-view-container">

			<div class="tab-head-container">
				<?php 
        $menu_courses = CFS()->get('menu_courses');
        foreach ( $menu_courses as $menu_course) : ?>
          
					<div class="tab-head">
						<h3><?php echo $menu_course['menu_tab_title']; ?></h3>
					</div>
      
        <?php endforeach; // End of the loop. ?>
      </div> <!--.tab-head-container-->
				
			<div class="tab-body-container">
         <?php foreach ( $menu_courses as $menu_course) : ?>
        <div class="tab-body">
         
          <?php echo $menu_course['menu_options']; ?>
          
        </div> 
      <?php endforeach; // End of the loop. ?>
      </div><!--.tab-body-container-->
     <?php endwhile; // End of the loop. ?>
	</main><!-- #main -->

</div><!-- #primary -->

<?php get_footer(); ?>
