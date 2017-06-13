<?php
/**
 * The template for displaying all pages.
 *
 * @package Evans_Lake_Theme
 */

get_header(); ?>


	<div id="primary" class="content-area">

		<nav id="sub-navigation" class="sub-navigation">
			<button class="menu-toggle" aria-expanded="false"><?php esc_html( 'Primary Menu' ); ?></button>
			<?php wp_nav_menu( array( 
				'theme_location' => 'primary', 
				'menu_id' => 'primary-menu',
				'submenu' => get_the_title($post->post_parent)
				) ); ?>
		</nav><!-- #site-navigation -->

		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->

	</div><!-- #primary -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>
