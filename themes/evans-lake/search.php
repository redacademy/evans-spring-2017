<?php
/**
 * The template for displaying search results pages.
 *
 * @package Evans_Lake_Theme
 */

get_header();
get_sidebar(); ?>

	<div class="search-hero"></div>
		<img class="hero-search" src="<?php echo( get_template_directory_uri() . '/assets/images/footer.jpg'); ?>">
	

	<div id="primary" class="content-area container">

	<div class="sub-navigation">
		<?php wp_nav_menu( array( 
			'theme_location' => 'primary', 
			'menu_id' => 'primary-menu',
			'submenu' => get_the_title($post->post_parent)
		) ); ?>
	</div>

		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h3 class="search-title"><?php printf( esc_html( 'Showing results for: %s' ), '<span class="search-query">' . get_search_query() . '</span>' ); ?></h3>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'search' ); ?>

			<?php endwhile; ?>

			<?php evans_lake_numbered_pagination(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
