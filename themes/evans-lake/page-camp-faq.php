<?php
/**
 * The template for displaying all pages.
 *
 * @package Evans_Lake_Theme
 */

get_header();  ?>

<div class="hero-image"><?php the_post_thumbnail( 'full' ); ?></div>
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

			<?php the_title(); ?>
      <?php 
      $FAQs = CFS()->get('faq');
      foreach ( $FAQs as $FAQ) : ?>
      <?php echo $FAQ['faq_question']; ?>
      <?php echo $FAQ['faq_answer']; ?>
      <?php endforeach; ?>
      


		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->

</div><!-- #primary -->

<?php get_footer(); ?>
