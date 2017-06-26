<?php
/**
 * The template for displaying blog posts archive (news and events).
 *
 * @package Evans_Lake_Theme
 */

get_header();
get_sidebar(); ?>

<div class="hero">
	<!--Background styled in extras.php/evans_lake_hero_image_update()-->
	<div class="hero-image"></div>
</div>
<div id="primary" class="content-area container">
	<main id="main" class="site-main" role="main">

		<div class="events-table">	
			<?php	$events = CFS()->get( 'events', 549 ); ?>
			<h2>News & Events</h2>
			<div class="table-container box-pop-out">
				<div class="table-header">
					<span class="date">Date</span>
					<span class="event">Event</span>
					<span class="location">Location</span>
				</div>
				<?php foreach ($events as $event) : ?>
					<div class="table-row <?php	if ($event['event_closed']) { echo "event-closed"; }; ?>">
						<span class="date">
							<?php echo $event['event_date']; ?>
						</span>
						<span class="event">
							<?php echo $event['event_name']; ?>
						</span>
						<span class="location">
							<?php	
							if ($event['event_closed']) { 
								echo "Closed"; 
							} else {
								echo $event['event_location'];
							}; 
							?>
						</span>						
					</div> <!--table row-->
				<?php endforeach; ?>   
			</div> <!--table container-->
		</div> <!--event container-->
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="single-container box-pop-out">
				<?php get_template_part( 'template-parts/content', 'single' ); ?>			
			</div>
			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>
		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
