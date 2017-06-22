<?php
/**
 * The template for displaying the Orientaton Packages & Waivers page.
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
		<?php endwhile; // End of the loop. ?>

<div class="opw-program container">
  <?php $opw_programs = CFS()->get('opw_loop');?>
  <?php foreach ($opw_programs as $opw_program) : ?>
    <h2 class="opw-program title"><?php echo$opw_program['opw_title'];?></h2>
    <?php $opw_files = $opw_program['opw_file_loop']; ?>
    <?php foreach ($opw_files as $opw_file) : ?>
      <a href="<?php echo $opw_file['opw_file_upload'];?>" class="opw-file-upload">
        <h3 class="opw-file-label"><?php echo $opw_file['opw_file_label']; ?><i class="fa fa-paperclip" aria-hidden="true"></i></h3>
      </a>
    <?php endforeach; ?>
  <?php endforeach; ?>
</div>

<h2 class="cancel header">Cancellation Policy</h2>
<div class="cancel container">
  <?php $policies = CFS()->get( 'cancel_loop', 35 ); ?>
  <?php foreach ($policies as $policy) : ?>
    <div class="cancel block">
      <span class="cancel condition"><?php echo $policy['cancel_condition'];?> </span>
      <span class="cancel policy"><?php echo $policy['cancel_policy'];?></span>
    </div>
    <?php endforeach; ?>
</div>

	</main><!-- #main -->

</div><!-- #primary -->

<?php get_footer(); ?>