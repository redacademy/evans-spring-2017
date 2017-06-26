<?php
/**
 * The template for displaying wedding page.
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
	<div class="sub-navigation">
		<?php wp_nav_menu( array( 
			'theme_location' => 'primary', 
			'menu_id' => 'primary-menu',
			'submenu' => get_the_title($post->post_parent)
		) ); ?>
	</div>

	<main id="main" class="site-main" role="main">
    <div class="button-position">
      <button class="orange-button">Request Information</button>
    </div> 

		<?php while ( have_posts() ) : the_post(); ?>
      <?php get_template_part( 'template-parts/content', 'page' ); ?>
    <?php endwhile; // End of the loop. ?> 
		


     <?php echo CFS()->get( 'menu_title' ); ?>
     <?php // Produce tabs	?>
		 <div class="tabbed-view-container">
       <div class="tab-head-container">
				  <?php 
          $menu_courses = CFS()->get('menu_loop');
          foreach ( $menu_courses as $menu_course) : ?>
            <div class="tab-head">
						<h3><?php echo $menu_course['menu_tab_head']; ?></h3>
					  </div>
          <?php endforeach; // End of the loop. ?>
       </div> <!--.tab-head-container-->
				
			 <div class="tab-body-container">
         <?php foreach ( $menu_contents as $menu_content) : ?>
        <div class="tab-body"><?php echo $menu_course['menu_body']; ?>
        </div> 
         <?php endforeach; // End of the loop. ?>
      </div><!--.tab-body-container-->
    </div>
    
	</main><!-- #main -->

</div><!-- #primary -->

<?php get_footer(); ?>
