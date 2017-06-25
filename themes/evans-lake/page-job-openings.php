<?php
/**
 * The template for displaying the employment page.
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


		<div class="jobs-table">
      <?php 
      $all_job_categories = CFS()->get( 'job_main_loop', $post->ID );
      foreach ($all_job_categories as $job_category) : ?>
        <h2><?php echo $job_category['job_main_title'];?></h2>
        <div class="table-container box-pop-out">
          <div class="table-header">
            <span class="position">Position</span>
            <span class="type">Type</span>
            <span class="work-period">Work Period</span>
            <span class="closing-date">Closing Date</span>>						
          </div>

          <?php foreach ($job_category['job_loop'] as $job) : ?>
            <div class="table-row <?php	if ($job['job_closed']) { echo "job-closed"; }; ?>">
              <?php if ( $job['job_pdf'] ) : ?>
                <a href="<?php echo $job['job_pdf']; ?>">
                  <span class="position">
                    <?php echo $job['job_position']; ?>
                  </span>
                </a>
              <?php elseif ( $job['job_link'] ) : ?>
                <a href="<?php echo $job['job_link']; ?>">
                  <span class="position">
                    <?php echo $job['job_position']; ?>
                  </span>
                </a>
              <?php else : ?>
                <span class="position">
                  <?php echo $job['job_position']; ?>
                </span>
              <?php endif; ?>
              <span class="type">
                <?php echo $job['job_type']; ?>
              </span>
              <span class="work-period">
                <?php echo $job['job_period']; ?>
              </span>
              <span class="closing-date">
                <?php	
                if ($job['job_closed']) { 
                  echo "job-closed"; 
                } else {
                  echo $job['job_closing'];
                }; ?>
              </span>						
            </div>
          <?php endforeach; ?>
        </div> <!--table container-->
      <?php endforeach; ?>       
    </div> <!--registration container-->

	</main><!-- #main -->

</div><!-- #primary -->

<?php get_footer(); ?>
