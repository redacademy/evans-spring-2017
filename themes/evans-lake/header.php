<?php
/**
 * The header for our theme.
 *
 * @package Evans_Lake_Theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div id="page" class="hfeed site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html( 'Skip to content' ); ?></a>

			<header id="masthead" class="site-header" role="banner">
				<!--<div class="mobile-search-expanded">
					<i class="fa fa-search" aria-hidden="true"></i>
					<?php get_search_form();?>
				</div>-->
				<div class="mobile-menu">
					<!--<div class="search-bar"><?php get_search_form();?></div>-->
					<div class="mobile-search">
						<i class="fa fa-search" aria-hidden="true"></i>
						<?php get_search_form();?>
					</div>
					<div class="mobile-logo"><a href="<?php echo esc_url( home_url('/') ); ?>">Evans Lake</a></div>
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<i class="fa fa-bars" aria-hidden="true"></i><?php esc_html( 'Primary Menu' ); ?>
					</button>
				</div>
				<div class="desktop-menu">
					<div class="site-branding">
						<a href="<?php echo esc_url( home_url('/') ); ?>" rel="home" class="logo"><div class="logo"></div></a>
						<h1 class="site-title screen-reader-text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<p class="site-description"><?php bloginfo( 'description' ); ?></p>
					</div><!-- .site-branding -->

					<nav id="site-navigation" class="main-navigation" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					<div class="search-bar">
						<?php get_search_form();?>
					</div>
					</nav><!-- #site-navigation -->
					
				</div>
			</header><!-- #masthead -->

			<div id="content" class="site-content">
