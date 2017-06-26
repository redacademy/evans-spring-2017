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

    <?php endwhile; // End of the loop. ?>
    <div class="bcca box-pop-out">
      <h2>BCCA Accreditation</h2>
      <?php echo CFS()->get('bcca_accreditation');?>
    </div>
    
    <h2>Site FAQ</h2>
    <div class="accordion">
      <?php 
      $FAQs = CFS()->get('site_faqs');
      foreach ( $FAQs as $FAQ) : ?>
      <h3><?php echo $FAQ['site_faq_question']; ?></h3>
      <div><?php echo $FAQ['site_faq_answer']; ?></div>
      <?php endforeach; ?>
    </div>

    <div class="accommodations">
      <?php 
      $acc_loop = CFS()->get('acc_loop');
      foreach ($acc_loop as $acc) { ?>
        <img class="site-img" src="<?php echo $acc['acc_img'];?>">
        <h2 class="title"><?php echo $acc['acc_title'];?></h2>
        <div class="content"><?php echo $acc['acc_content'];?></div>
      <?php };?>
    </div>


  </main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?>
