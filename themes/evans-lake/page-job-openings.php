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

		<div class="registration-table box-pop-out">
      <?php $all_job_categories = CFS()->get( 'job_main_loop' ); ?>
      <?php foreach ($all_job_categories as $job_category) : ?>
        <h2><?php echo $job_category['job_main_title'];?></h2>
        <div class="table-container">
          <div class="table-header">
            <span class="position">Position</span>
            <span class="type">Type</span>
            <span class="work-period">Work Period</span>
            <span class="closing-date">Closing Date</span>>						
          </div>

          <?php foreach ($job_category as $job) ?>
            <div class="table-row <?php	if ($job['job_closed']) { echo "job-closed"; }; ?>">
              <a href="<?php 
                if ( $job['job_pdf'] ) {
                  echo $job['job_pdf'];
                } elseif ( $job['job_link'] ) {
                  echo $job['job_link'];
                } ?>">
                <span class="position">
                  <?php $job['job_position']; ?>
                </span>
              </a>
              <span class="type">
                <?php $job['job_type']; ?>
              </span>
              <span class="work-period">
                <?php $job['job_period']; ?>
              </span>
              <span class="closing-date">
                <?php $job['job_closing']; ?>
              </span>>						
            </div>
          <?php endforeach; ?>
        </div> <!--table container-->
      <?php endforeach; ?>       
    </div> <!--registration container-->

	</main><!-- #main -->

</div><!-- #primary -->

<?php get_footer(); ?>
