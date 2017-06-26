<?php
/**
 * The template for displaying the front page.
 *
 * @package Evans_Lake_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="home-hero">
				<!--Background styled in extras.php-->
				<p class="slogan">Your Home in the Forest</p>
				<p class="text-logo">Evans Lake</p>
				<a href="#s-descr"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
			</section>

		<?php if ( have_posts() ) : ?>

		<section class="site-description-section" id="s-descr">
			<div class="description-image">
				<img src="<?php	echo CFS()->get( 'site_image' ); ?>">
				<div class="description-text-area">
					<h2><?php	echo CFS()->get( 'site_title' ); ?></h2>
					<p class="site-description-subtitle"><?php	echo CFS()->get( 'site_subtitle' ); ?></p>
					<p class="site-description"><?php	echo CFS()->get( 'site_description' ); ?> </p>
				</div>
			</div>
		</section>

		<div class="front-tab-head-container container">
			<?php $tabs = CFS()->get( 'tabs_loop' ); ?>
			<?php foreach ( $tabs as $tab) : ?>

			<?php $tab_index = str_replace(' ', '-', $tab['tab_title']); ?>
				<div class="front-tab-head <?php echo $tab_index ;?>" id="<?php echo $tab_index ;?>" style="background-image:linear-gradient(to bottom, rgba(0, 0, 0, .35) 0%, rgba(0, 0, 0, .35) 100%), url(<?php echo $tab['tab_image']; ?>)">
					<?php echo $tab['tab_title']; ?>
					<span class="tab-title"></span>
				</div>
			<?php endforeach; // End of the loop. ?>
		</div> <!--.tab-head-container-->

		<div class="front-tab-body-container container">
			<?php foreach ($tabs as $tab) : ?>
				<?php $tab_index = str_replace(' ', '-', $tab['tab_title']); ?>
				<div class="front-tab-body <?php echo $tab_index ;?>" id="<?php echo $tab_index . "-body" ;?>">
					<div class="tab-content">
						<?php echo $tab['tab_content']; ?>
						<button class="orange-button">Read More</button>
					</div>
					<img class="tab-image" src="<?php echo $tab['tab_image']; ?>">
				</div>
			<?php endforeach; ?>
		</div>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'flickity' ); ?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>