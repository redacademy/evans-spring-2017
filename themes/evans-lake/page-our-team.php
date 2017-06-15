<?php
/**
 * 
 * 
 * The template for displaying the Our Team page.
 *
 * @package Evans_Lake_Theme
 */

get_header(); ?>

<div class="hero-image"><?php the_post_thumbnail( 'full' ); ?></div>
<div id="primary" class="content-area container">
	<div class="sub-navigation">
		<?php wp_nav_menu( array( 
			'theme_location' => 'primary', 
			'menu_id' => 'primary-menu',
			'submenu' => get_the_title($post->post_parent)
		) ); ?>
	</div>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content', 'page' ); ?>
		<?php endwhile; // End of the loop. ?>
	
	<!--Query for Custom Post Data-->
	<?php 
		$args = array(
			'post_type'=> 'staffmember',
			'post_count'=> 50,
			'posts_per_page'=> 50
			);
		$all_staff = new WP_Query($args);
	?>

	<!--Populate arrays-->
	<?php foreach ($all_staff->posts as $staff_member): ?>
		<div>
			<div class="all-staff">
				<section class="staff-member">
					<span class="id">
						<?php echo $staff_member->ID; ?>
					</span>
					<span class="type">
						<?php
							$type = CFS()->get( 's_type',  $staff_member->ID ); 
							print_r($type)[0];
						?>
					</span>
					<br><br>
					<span class="role">
						<?php echo CFS()->get( 's_role',  $staff_member->ID,  array( 'format' => 'raw' ) ); ?>
					</span>
					<span class="image">
						<?php echo CFS()->get( 's_img',  $staff_member->ID ); ?>
					</span>
					
					<span class="email">
						<?php echo CFS()->get( 's_email',  $staff_member->ID ); ?>
					</span>
					<span class="tel-1">
						<?php echo CFS()->get( 's_tel_1',  $staff_member->ID ); ?>
					</span>
					<span class="tel-1-is-mobile">
						<?php echo CFS()->get( 's_tel_1_is_mobile',  $staff_member->ID ); ?>
					</span>
					<span class="tel-2">
						<?php echo CFS()->get( 's_tel_2',  $staff_member->ID ); ?>
					</span>
					<span class="tel-2-is-mobile">
						<?php echo CFS()->get( 's_tel_2_is_mobile',  $staff_member->ID ); ?>
					</span>
					<span class="year-started">
						<?php echo CFS()->get( 's_year_started',  $staff_member->ID ); ?>
					</span>
					<span class="bio">
						<?php echo CFS()->get( 's_bio',  $staff_member->ID ); ?>
					</span>
				</section>
			</div>
		</div>
	<?php endforeach; ?>		

	<main id="main" class="site-main" role="main">
<!---->
<!--board of directors/executives-->
<!--board of directors/directors loop-->

<!--Summer Camp staff loop-->
	</main><!-- #main -->

</div><!-- #primary -->
<?php wp_reset_query(); ?>
<?php get_footer(); ?>
