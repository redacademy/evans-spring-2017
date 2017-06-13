<?php
/**
 * The sidebar containing the main widget area.s
 *
 * @package Evans_Lake_Theme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php	dynamic_sidebar( 'sidebar-1' ); ?>
	<nav id="sub-navigation" class="sub-navigation">
		<button class="menu-toggle" aria-expanded="false"><?php esc_html( 'Primary Menu' ); ?></button>
		<?php wp_nav_menu( array( 
			'theme_location' => 'primary', 
			'menu_id' => 'primary-menu',
			'submenu' => get_the_title($post->post_parent)
		) ); ?>
	</nav><!-- #site-navigation -->

</div><!-- #secondary -->