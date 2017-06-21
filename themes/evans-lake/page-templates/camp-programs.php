<?php
/**
 * Template Name: Camp Programs
 * The template for displaying the camp programs page.
 *
 * @package Evans_Lake_Theme
 */

get_header(); 
get_sidebar(); ?>

			<!--Hero area -->
<div class="hero">
	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
	<div class="hero-image" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .35) 0%, rgba(0, 0, 0, .35) 100%), url('<?php echo $thumb['0'];?>'); background-size: cover,cover; background-position: center, center;">
	</div>
	<?php the_title( '<h1 class="hero-title">', '</h1>' ); ?>


</div>
<div id="primary" class="content-area container">
			<!--Build submenu on left pane of content area-->
	<div class="sub-navigation">
		<?php wp_nav_menu( array( 
			'theme_location' => 'primary', 
			'menu_id' => 'primary-menu',
			'submenu' => get_the_title($post->post_parent)
		) ); ?>
	</div>

	<main id="main" class="site-main" role="main">
			<!--Content Area right pane next to submenu-->
		<button class="orange-button">Register Now</button>

		<?php evans_lake_breadcrumbs(); ?>

		<header class="intro-header entry-header">
			<h2>
				<?php 
					echo get_the_title() . ' ';
					echo CFS()->get( 'camp_year', $post->ID ); 
				?>
			</h2>
		</header><!-- .intro-header -->

		<div class="intro-content entry-content">
			<?php
				while ( have_posts() ) : the_post();
					the_content();
				endwhile;
			?>
		</div> <!--.intro-content-->

			<!--Custom Post Query in Order-->
		<?php 
			$args = array (
				'post_type' => 'campprogram',
				'post_count'=> '50',
				'order_by'	=> 'date',
				'order' => 'DESC'
			);

			$camp_programs = get_posts ($args);
			// print_r ($camp_programs);
		?>

			<!--Produce tabs	-->
		<div class="tab-head-container">
			<?php foreach ( $camp_programs as $program) : ?>
				<div class="tab-head <?php echo $program->post_name ;?>">
					<?php echo $program->post_title; ?>
				</div>
			<?php endforeach; // End of the loop. ?>
		</div><!--End tab-head-container-->

		<div class="tab-body-container">
			<?php foreach ( $camp_programs as $program) : ?>
				<div class="tab-body <?php echo $program->post_name ;?>">
					<?php	$program_contents = CFS()->get( 'text_block', $program->ID ); ?>
					<?php	foreach ($program_contents as $program_content) : ?>
										<h2 class="tab-body-title"><?php echo $program_content['cprog_title']; ?></h2>
							<span class="tab-body-content"><?php echo $program_content['cprog_content']; ?></span>
					<?php endforeach; // End program_contents loop. ?>
				</div>
			<?php endforeach; // End camp_programs loop. ?>		
		</div><!--Tab body container-->

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
