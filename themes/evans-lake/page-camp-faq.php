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
      <h2>Camp FAQ</h2>
		<?php while ( have_posts() ) : the_post(); ?>
				<?php the_title(); ?>
				<div class="accordion">
					<?php 
					$FAQs = CFS()->get('summer_faqs');
					foreach ( $FAQs as $FAQ) : ?>
					  <h3><?php echo $FAQ['summer_faq_question']; ?></h3>
					  <div><?php echo $FAQ['summer_faq_answer']; ?></div>
					<?php endforeach; ?>
        </div>

				
          <h2> Packing</h2>
				<div class="accordion">	
					<?php 
					$ARGs = CFS()->get('packing_faqs');
					foreach ( $ARGs as $ARG) : ?>
					<h3><?php echo $ARG['packing_faq_question']; ?></h3>
					<div><?php echo $ARG['packing_faq_answer']; ?></div>
					<?php endforeach; ?>
        </div>

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->

</div><!-- #primary -->

<?php get_footer(); ?>
