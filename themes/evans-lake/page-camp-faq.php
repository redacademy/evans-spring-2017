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
					$faqs = CFS()->get('summer_faqs');
					foreach ( $faqs as $faq) : ?>
					  <h3><?php echo $faq['summer_faq_question']; ?></h3>
					  <div><?php echo $faq['summer_faq_answer']; ?></div>
					<?php endforeach; ?>
        </div>
				
				<h2> Packing</h2>
				<div class="accordion">	
					<?php 
					$args = CFS()->get('packing_faqs');
					foreach ( $args as $arg) : ?>
						<h3><?php echo $arg['packing_faq_question']; ?></h3>
						<div class="box-pop-out packing-faq-question"><?php echo $arg['packing_faq_answer']; ?></div>
					<?php endforeach; ?>
        </div>

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->

</div><!-- #primary -->

<?php get_footer(); ?>
