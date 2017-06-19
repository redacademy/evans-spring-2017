<?php
/**
 * Template Name: Activities
 *
 *
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

			<!--Query for Activity Custom Posts-->
	<?php 
		$args = array(
			'post_type'=> 'activity',
			'post_count'=> 50,
			'posts_per_page'=> 50
			// Add comma above and 'order_by'=> statement
		);
		$activities = get_posts($args);
				// Create Sorting Arrays
		$day_activities = [];
		$evening_activities = [];
		$game_activities = [];
	
				// Get Activity Type
		if ( !empty($activities) && !is_wp_error($activities)) {
			foreach ( $activities as $activity ) {
				$activity_term_obj = get_the_terms($activity, 'activitytype');
				$activity_term_slug = $activity_term_obj[0]->slug;

				// Sort Activity into Array by Type
				switch ($activity_term_slug){
					case 'camp-games':
						array_push($game_activities, $activity);
						break;
					case 'day-activities':
						array_push($day_activities, $activity);
						break;
					case 'evening-activities':
						array_push($evening_activities, $activity);
						break;
				}
			}
		}
	?>
			<!--Setup Content Area-->
	<main id="main" class="site-main" role="main">
		<div class="intro-content">
			<?php 
				evans_lake_breadcrumbs(); 
			?>
		</div>

			<!--Iteratively Display Daytime Activities-->
		<h1 class="bot-brd-blu">Activities</h1>			
		<?php foreach ($day_activities as $activity) : ?>
			<div class="activity-container">
				<?php if ( ( CFS()->get ( 'act_img', $activity->ID ) ) != '') : ?>
					<div class="activity-hero hero" style="background-image: url('<?php echo CFS()->get( 'act_img', $activity->ID );?>');">
					</div>
				<?php endif; ?>
				<div class="activity-content">
					<h3><?php echo $activity->post_title; ?></h3>
					<?php echo CFS()->get( 'act_desc', $activity->ID ); ?>
				</div>
			</div>
		<?php endforeach; ?>

		<h1 class="bot-brd-blu">Camp Games</h1>			
		<?php foreach ($game_activities as $activity) : ?>
			<div class="activity-container">
				<?php if ( ( CFS()->get ( 'act_img', $activity->ID ) ) != '') : ?>
					<div class="activity-hero hero" style="background-image: url('<?php echo CFS()->get( 'act_img', $activity->ID );?>');">
					</div>
				<?php endif; ?>
				<div class="activity-content">
					<h3><?php echo $activity->post_title; ?></h3>
					<?php echo CFS()->get( 'act_desc', $activity->ID ); ?>
				</div>
			</div>
		<?php endforeach; ?>

		<h1 class="bot-brd-blu">Evening Activities</h1>
		<?php foreach ($evening_activities as $activity) : ?>
			<div class="activity-container">
				<?php if ( ( CFS()->get ( 'act_img', $activity->ID ) ) != '') : ?>
					<div class="activity-hero hero" style="background-image: url('<?php echo CFS()->get( 'act_img', $activity->ID );?>');">
					</div>
				<?php endif; ?>
				<div class="activity-content">
					<h3><?php echo $activity->post_title; ?></h3>
					<?php echo CFS()->get( 'act_desc', $activity->ID ); ?>
				</div>
			</div>
		<?php endforeach; ?>


	</main><!-- #main -->

</div><!-- #primary -->

<?php get_footer(); ?>
