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

		<?php while ( have_posts() ) : the_post(); ?>
      <?php the_title( '<h1 class="hero-title">', '</h1>' ); ?>
      <h2><?php the_title(); ?></h2>
      <div class="entry-content">
        <?php the_content(); ?>
      </div><!-- .entry-content -->
    <?php endwhile; // End of the loop.
    $directions = CFS()->get('contact_directions');
    $form = CFS()->get('contact_form');
    $offices = CFS()->get('contact_offices'); ?>

    <div class="accordion closed">
      <h2>Get Directions</h2>
      <div class="directions">
        <?php echo $directions; ?>
      </div>
    </div>

    <div class="offices">
      <?php foreach ($offices as $office) : ?>
        <div class="office box-pop-out">
          <h2 class="office-title"><?php echo $office['office_title'];?></h2>
          <?php foreach ($office['office_details'] as $detail) : ?>
            <span class="line-end">
              <span class="detail-name"><?php echo $detail['office_name'];?></span>
              <span class="detail-content"><?php echo $detail['office_detail'];?></span>
            </span>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="contact-form box-pop-out">
      <?php echo $form; ?>
    </div>

	</main><!-- #main -->

</div><!-- #primary -->

<?php get_footer(); ?>
