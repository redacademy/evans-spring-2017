<?php
/**
 * Template Name: Camp Programs
 * The template for displaying the camp programs page.
 *
 * @package Evans_Lake_Theme
 */

get_header(); 
get_sidebar(); ?>

	<?php // Hero Area ?>
<div class="hero">
	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
	<div class="hero-image" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .35) 0%, rgba(0, 0, 0, .35) 100%), url('<?php echo $thumb['0'];?>'); background-size: cover,cover; background-position: center, center;">
	</div>
	<?php the_title( '<h1 class="hero-title">', '</h1>' ); ?>
</div>

<div id="primary" class="content-area container">
			<?php // Build submenu on left pane of content area ?>
	<div class="sub-navigation">
		<?php wp_nav_menu( array( 
			'theme_location' => 'primary', 
			'menu_id' => 'primary-menu',
			'submenu' => get_the_title($post->post_parent)
		) ); ?>
	</div>

	<main id="main" class="site-main" role="main">
			<?php // Content Area right pane next to submenu ?>
		<button class="orange-button reg-now">Register Now</button>

		<?php evans_lake_breadcrumbs(); ?>

		<header class="intro-header entry-header">
			<h2><?php echo get_the_title(); ?></h2>
		</header> <!--.intro-header-->

		<div class="intro-content entry-content">
			<?php
				while ( have_posts() ) {
					the_post();
					the_content();
				}
			?>
		</div> <!--.intro-content-->

		<?php 
			// Custom Post Query in Order
			$args = array (
				'post_type' => 'campprogram',
				'post_count'=> '50',
				'order_by'	=> 'date',
				'order' => 'DESC'
			);

			$camp_programs = get_posts ($args);
		?>

			<?php // Produce tabs	?>
		<div class="tabbed-view-container">
			<div class="tab-head-container">
				<?php foreach ( $camp_programs as $program) : ?>
					<div class="tab-head <?php echo $program->post_name ;?>" id="<?php echo $program->ID; ?>">
						<?php echo $program->post_title; ?>
					</div>
				<?php endforeach; // End of the loop. ?>
			</div> <!--.tab-head-container-->
			
			<div class="tab-body-container">
				<?php foreach ( $camp_programs as $program) : ?>
					<div class="tab-body accordion <?php echo $program->post_name ;?>" id="<?php echo $program->ID . "-body"; ?>">
						<?php	$program_contents = CFS()->get( 'text_block', $program->ID ); ?>
						<?php	foreach ($program_contents as $program_content) : ?>		
								<h2 class="tab-body-title"><?php echo $program_content['cprog_title']; ?></h2>
								<span class="tab-body-content"><?php echo $program_content['cprog_content']; ?></span>
						<?php endforeach; // End program_contents loop. ?>
					</div>
				<?php endforeach; // End camp_programs loop. ?>		
			</div> <!--.tab-body-container-->
		</div> <!--.tabbed-view-container-->

		<?php 
			// Set Season 1
			if ( CFS()->get( 'summer_first' ) ) {
				$season = 'summer';
				$season_uc = 'Summer';
			}	else {
				$season = 'winter';
				$season_uc = 'Winter';
			}
		?>
		<!--Season 1 Table-->
		<h2><?php echo $season_uc; ?> Registration</h2>
		<p class="gst">*GST Additional</p>
		<div class="<?php echo $season; ?> registration-table">
			<div class="<?php echo $season; ?> table-container">
				<div class="<?php echo $season; ?> table-header">
					<span class="camp-number">Camp#</span>
					<span class="date-range">Dates</span>
					<span class="length">Length</span>
					<span class="camp-program">Camp Program</span>
					<span class="fee">Fee</span>						
				</div>
				<?php $reg_sessions = CFS()->get('reg_session_loop'); ?>

				<?php	foreach ($reg_sessions as $reg_session) : ?>
					<?php	if ( 
							($reg_session['reg_summer_session'] && $season == "summer") ||
							(!$reg_session['reg_summer_session'] && $season =="winter") ) : ?>
						<div class="<?php echo $season; ?> table-row">
							<span class="camp-number"><?php echo $reg_session['reg_camp_no'];?></span>
							<span class="date-range"><?php echo $reg_session['reg_date_range'];?></span>
							<span class="length"><?php echo $reg_session['reg_length'];?></span>
							<span class="camp-program"><?php echo $reg_session['reg_program'];?></span>
							<span class="fee"><?php echo $reg_session['reg_fee'];?></span>						
						</div>
					<?php endif; ?>
				<?php endforeach; ?>

				<div class="<?php echo $season; ?> table-footer">
					<?php if (CFS()->get('warn_' . $season)) : ?>
						<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
						<span class="warn-message"><?php echo CFS()->get( 'warn_message' ); ?></span>
					<?php endif; ?>
				</div>
			</div> <!--.season1.table-container-->
		</div> <!--.season1-registration-table-->

		<button class="orange-button reg-now">Register Now</button>

		<?php 
			// Set Season 2 Inversely to Season 1
			if ( CFS()->get( 'summer_first' ) ) {
				$season = 'winter';
				$season_uc = 'Winter';
			}	else {
				$season = 'summer';
				$season_uc = 'Summer';

			}
		?>
		<!--Season 2 Table-->
		<h2><?php echo $season_uc; ?> Registration</h2>
		<p class="gst">*GST Additional</p>
		<div class="<?php echo $season; ?> registration-table">
			<div class="<?php echo $season; ?> table-container">
				<div class="<?php echo $season; ?> table-header">
					<span class="camp-number">Camp#</span>
					<span class="date-range">Dates</span>
					<span class="length">Length</span>
					<span class="camp-program">Camp Program</span>
					<span class="fee">Fee</span>						
				</div>
				<?php $reg_sessions = CFS()->get('reg_session_loop'); ?>

				<?php	foreach ($reg_sessions as $reg_session) : ?>
					<?php	if ( 
							($reg_session['reg_summer_session'] && $season == "summer") ||
							(!$reg_session['reg_summer_session'] && $season =="winter") ) : ?>
						<div class="<?php echo $season; ?> table-row">
							<span class="camp-number"><?php echo $reg_session['reg_camp_no'];?></span>
							<span class="date-range"><?php echo $reg_session['reg_date_range'];?></span>
							<span class="length"><?php echo $reg_session['reg_length'];?></span>
							<span class="camp-program"><?php echo $reg_session['reg_program'];?></span>
							<span class="fee"><?php echo $reg_session['reg_fee'];?></span>						
						</div>
					<?php endif; ?>
				<?php endforeach; ?>

				<div class="<?php echo $season; ?> table-footer">
					<?php if (CFS()->get('warn_' . $season)) : ?>
						<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
						<span class="warn-message"><?php echo CFS()->get( 'warn_message' ); ?></span>
					<?php endif; ?>
				</div>
			</div> <!--.season2.table-container-->
		</div> <!--.season2-registration-table-->

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
