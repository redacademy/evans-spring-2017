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
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content', 'page' ); ?>
		<?php endwhile; // End of the loop. ?>
	
		<!--Query for Custom Post Data-->
		<?php 
			$args = array(
				'post_type'=> 'staffmember',
				'post_count'=> 50,
				'posts_per_page'=> 50,
				'tax_query' => array(
					array(
						'taxonomy' => 'staffmember',
						'field'    => 'all',
						'terms'    => 'fulltime'
					),
				),
			);

			$fulltime_staff = new WP_Query($args);
		?>

		<!--Populate arrays-->
		<?php 
			$staff_types = get_terms( 'stafftype' );
			echo "Staff Types:";
			print_r($staff_types);

			if ( !empty($fulltime_staff) && !is_wp_error($fulltime_staff)) :
				foreach ( $fulltime_staff->posts as $post ) :
					setup_postdata ( $post );
		?>
		<div>
			<div class="staff fulltime">
				<section class="staff-member fulltime">
					<span class="name">
						<?php $type = CFS()->get( 's_name',  $staff_member->ID ); ?>
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
		<?php
			endforeach;
			endif;
		?>
		<!--board of directors/executives-->
		<!--board of directors/directors loop-->

		<!--Summer Camp staff loop-->

	</main><!-- #main -->
</div><!-- #primary -->
<?php wp_reset_query(); ?>
<?php get_footer(); ?>