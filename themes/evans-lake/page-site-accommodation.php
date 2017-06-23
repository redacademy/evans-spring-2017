<?php
/**
 * The template for site accommodation.
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
    
    <?php while ( have_posts() ) : the_post(); ?>
      <?php get_template_part( 'template-parts/content', 'page' ); ?>
      <h2>Accommodations</h2>
      <?php echo CFS()->get('bcca_accreditation');?>
      <h2>Site FAQ</h2>
      <div class="accordion">
        <?php 
        $FAQs = CFS()->get('site_faqs');
        foreach ( $FAQs as $FAQ) : ?>
          <h3><?php echo $FAQ['site_faq_question']; ?></h3>
          <div><?php echo $FAQ['site_faq_answer']; ?></div>
          <?php endforeach; ?>
      </div>  
    <?php endwhile; // End of the loop. ?>

  </main><!-- #main -->

</div><!-- #primary -->

<?php get_footer(); ?>
