<?php
/**
 * The template for displaying all pages.
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

		<?php 
      while ( have_posts() ) : the_post();
        get_template_part( 'template-parts/content', 'page' );
      endwhile; // End of the loop.
      
      $directions = CFS()->get('contact_directions');
      $form = CFS()->get('contact_form');
      $offices = CFS()->get('contact_offices');
    ?>
    <div class="accordion">
      <h2>Directions</h2>
      <div class="directions">
        <?php echo $directions; ?>
      </div>
    </div>

    <div class="">
      <?php ?>
    </div>

    <div class="contact-form">
      <?php echo $form; ?>
    </div>

	</main><!-- #main -->

</div><!-- #primary -->

<?php get_footer(); ?>
