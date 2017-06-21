<?php
/**
 * Template Name: Our Team
 *
 * The template for displaying the Our Team page.
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
				// Add comma above and 'order_by'=> statement
			) );
			$our_team_ID = get_the_ID();
 		?>
	</div>
	<header class="entry-header">
		<?php the_title( '<h1 class="hero-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<main id="main" class="site-main" role="main">
		<div class="entry-content">
			<?php 
				evans_lake_breadcrumbs(); 
			?>
			<h1>The team behind Evans Lake</h1>

			<!--Query for Staff Member Custom Posts-->
			<?php 
				$args = array(
					'post_type'=> 'staffmember',
					'post_count'=> 50,
					'posts_per_page'=> 50
				);

				$all_staff = get_posts($args);

				// Create Sorting Arrays
				$summers = [];
				$fulltimes = [];
				$directors = [];
				$executives = [];
			?>

			<!--Get Staff Type by Staff Member Post-->
			<?php 
				if ( !empty($all_staff) && !is_wp_error($all_staff)) {
					foreach ( $all_staff as $post ) {
						$staff_term_obj = get_the_terms($post, 'stafftype');
						$staff_term_slug = $staff_term_obj[0]->slug;

						// Sort Staff Member by Staff Type
						switch ($staff_term_slug){
							case 'summer':
								array_push($summers, $post);
								break;
							case 'director':
								array_push($directors, $post);
								break;
							case 'executive':
								array_push($executives, $post);
								break;
							case 'fulltime':
								array_push($fulltimes, $post);
								break;
						}
					}
				}
			?>
			<section class="fulltime staff-container">
				<h2>Our Fulltime Staff</h2>
				<p><?php echo CFS()->get( 'desc_fulltime', $our_team_ID ); ?></p>

				<?php foreach ($fulltimes as $staff_member) : ?>
					<div class="fulltime staff-member">

						<?php $image_URL = CFS()->get( 's_img',  $staff_member->ID ); ?>
						<div class="image" style="background-image: url( '<?php echo $image_URL; ?>' )">
						</div>

						<div class="content">
							<h2 class="name">
								<?php echo get_the_title($staff_member->ID), ' - '; ?>
							</h2>
							<h2 class="role">
								<?php echo CFS()->get( 's_role',  $staff_member->ID,  array( 'format' => 'raw' ) ); ?>
							</h2>
							<a class="email" href="mailto: <?php echo CFS()->get( 's_email',  $staff_member->ID ); ?>">
								<?php echo CFS()->get( 's_email',  $staff_member->ID ); ?>
							</a>
							<span class="tel-1">
								<?php 
									if ( CFS()->get( 's_tel_1_is_mobile',  $staff_member->ID ) ) {
										echo "M: ";
									} 
									else {
										echo "T: ";
									}; 
									echo CFS()->get( 's_tel_1',  $staff_member->ID ); 
								?>
							</span>
								<span class="tel-2">
								<?php 
									if ( CFS()->get( 's_tel_2_is_mobile',  $staff_member->ID ) ) {
										echo "M: ";
									} 
									elseif ('' !== CFS()->get( 's_tel_2',  $staff_member->ID ) ) {
										echo "T: ";
									}; 
									echo CFS()->get( 's_tel_2',  $staff_member->ID ); 
								?>
							</span>
							<span class="year-started">
								<?php echo CFS()->get( 's_year_started',  $staff_member->ID ); ?>
							</span>

							<button class="staff orange-button" id="<?php echo $staff_member->ID; ?>">View Bio</button>
							<span class="bio" id="<?php echo $staff_member->ID . "-bio"; ?>">
							<!--Bio should be hidden until button above is clicked-->
								<i class="fa fa-times" aria-hidden="true"></i>
								<?php echo CFS()->get( 's_bio',  $staff_member->ID ); ?>
								<span class="overlay"></span>
							</span>
						</div> <!--Content-->
					</div> <!--Single Fulltime Staff Member-->	
				<?php endforeach; ?>
			</section> <!--Staff Fulltime Member Section-->

			<section class="board-container">
				<h2>Board of Directors</h2>
				<p><?php echo CFS()->get( 'desc_board', $our_team_ID ); ?></p>

				<section class="executive staff-container">
					<h2>Executives</h2>
					<div class="executive-columns">
						<h3 class="name">Name</h3>
						<h3 class="role">Role</h3>
						<h3 class="email">Contact</h3>
					</div>
					<?php foreach ($executives as $staff_member) : ?>
						<div class="executive staff-member">

							<span class="name">
								<?php echo get_the_title($staff_member->ID); ?>
							</span>

							<span class="role">
								<?php echo CFS()->get( 's_role',  $staff_member->ID,  array( 'format' => 'raw' ) ); ?>
							</span>

							<span class="email">
								<a href = "mailto:<?php echo CFS()->get( 's_email',  $staff_member->ID ); ?>">
									<i class="fa fa-envelope-o" aria-hidden="true"></i>
								</a>
							</span>

						</div> <!--Single Executive Staff Member-->
					<?php endforeach; ?>
				</section> <!--Executive Staff Member Section-->		

				<section class="director staff-container">
					<h2>Directors</h2>
					<div class="director-columns">
						<h3 class="name">Name</h3>
					</div>
					<?php foreach ($directors as $staff_member) : ?>
						<p class="director staff-member">
							<?php echo get_the_title($staff_member->ID); ?>
						</p>
					<?php endforeach; ?>
				</section>
			</section> <!--Board of Directors Container-->

			<h2>Summer Camp Staff</h2>
			<p><?php echo CFS()->get( 'desc_summer', $our_team_ID ); ?></p>
			<section class="summer staff-container">
				<?php foreach ($summers as $staff_member) : ?>
				<div class="summer staff-member">
					<?php $image_URL = CFS()->get( 's_img',  $staff_member->ID ); ?>
					<div class="image" style="background-image: url( '<?php echo $image_URL; ?>' )">
					</div>

					<div class="content">
						<h2 class="name">
							<?php echo get_the_title($staff_member->ID); ?>
						</h2>
						<span class="role">
							<?php echo CFS()->get( 's_role',  $staff_member->ID,  array( 'format' => 'raw' ) ); ?>
						</span>
						<button class="staff orange-button">View Bio</button>
						<span class="bio">
						<!--Bio should be hidden until button above is clicked-->
							<?php echo CFS()->get( 's_bio',  $staff_member->ID ); ?>
						</span>
					</div>
				</div>
				<?php endforeach; ?>
			</section>

		<?php wp_reset_query(); ?>
	</div>
</main><!-- #main -->

	<?php get_footer(); ?>
</div><!--Content Area-->
