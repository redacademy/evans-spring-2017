<?php
/**
 * The template for site accomodation.
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
    
    <?php while ( have_posts() ) : the_post(); ?>
      <?php get_template_part( 'template-parts/content', 'page' ); ?>
      <img src="<?php echo( get_template_directory_uri() . '/assets/images/map.png'); ?>"> 
      <a href="<?php echo(get_template_directory_uri() . '/assets/images/SiteMap.png'); ?>">View Map <br> of<br>the site</a>
      <h2>Accomodations</h2>
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
