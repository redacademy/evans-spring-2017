<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package Evans_Lae_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function evans_lake_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'evans_lake_body_classes' );

function evans_lake_logo_login() {
	echo '<style type="text/css">                                                                   
         #login h1 a { background: url('.get_stylesheet_directory_uri().'/assets/images/evans-lake.svg) center no-repeat;
         background-size: 50% auto; height: 80px; width: 300px;}
     		</style>';
}

add_action('login_head', 'evans_lake_logo_login');

function evans_lake_logo_url( $url ) {
	return home_url();
}
add_filter( 'login_headerurl', 'evans_lake_logo_url' );

function evans_lake_login_title() {
	return "Evans Lake Forest Education Society";
}
add_filter( 'login_headertitle', 'evans_lake_login_title');

function evans_lake_submenu_limit( $items, $args ) {

    if ( empty( $args->submenu ) ) {
        return $items;
    }

    $ids       = wp_filter_object_list( $items, array( 'title' => $args->submenu ), 'and', 'ID' );
    $parent_id = array_pop( $ids );
    $children  = evans_lake_submenu_get_children_ids( $parent_id, $items );

    foreach ( $items as $key => $item ) {

        if ( ! in_array( $item->ID, $children ) ) {
            unset( $items[$key] );
        }
    }

    return $items;
}
add_filter( 'wp_nav_menu_objects', 'evans_lake_submenu_limit', 10, 2 );

function evans_lake_submenu_get_children_ids( $id, $items ) {

    $ids = wp_filter_object_list( $items, array( 'menu_item_parent' => $id ), 'and', 'ID' );

    foreach ( $ids as $id ) {

        $ids = array_merge( $ids, evans_lake_submenu_get_children_ids( $id, $items ) );
    }

    return $ids;
}

// Breadcrumbs
function evans_lake_breadcrumbs() {
	// Settings
	$separator         = '&gt;';
	$breadcrumbs_class = 'breadcrumbs';
	$home_title        = 'Home';

	// Get the query & post information
	global $post,$wp_query;

	// Do not display on the homepage
	if ( !is_front_page() ) {
		// Build the breadcrumbs
		echo '<ul class="' . $breadcrumbs_class . '">';
		// Home page
		echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
		echo '<li class="separator separator-home"> ' . $separator . ' </li>';

		if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {		
			echo '<li class="item-current item-archive"><span class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</span></li>';
		} else if ( is_category() ) {
			// Category page
			echo '<li class="item-current item-cat"><span class="bread-current bread-cat">' . single_cat_title('', false) . '</span></li>';
		} else if ( is_page() ) {
			// Standard page
			if( $post->post_parent ){
				// If child page, get parents 
				$anc = get_post_ancestors( $post->ID );
				// Get parents in the right order
				$anc = array_reverse($anc);
				// Parent page loop
				if ( !isset( $parents ) ) $parents = null;
				foreach ( $anc as $ancestor ) {
					$parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
					$parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
				}
				// Display parent pages
				echo $parents;
				// Current page
				echo '<li class="item-current item-' . $post->ID . '">' . get_the_title() . '</li>';
			} else {
				// Just display current page if not parents
				echo '<li class="item-current item-' . $post->ID . '">' . get_the_title() . '</li>';
			}
		} elseif ( is_404() ) {
			// 404 page
			echo '<li>' . 'Error 404' . '</li>';
		}
		echo '</ul>';
	}
}

function evans_lake_remove_editor_init() {
	// If not in the admin, return.
	if ( ! is_admin() ) {
			return;
	}

	// Get the post ID on edit post with filter_input super global inspection.
	$current_post_id = filter_input( INPUT_GET, 'post', FILTER_SANITIZE_NUMBER_INT );
	// Get the post ID on update post with filter_input super global inspection.
	$update_post_id = filter_input( INPUT_POST, 'post_ID', FILTER_SANITIZE_NUMBER_INT );

	// Check to see if the post ID is set, else return.
	if ( isset( $current_post_id ) ) {
			$post_id = absint( $current_post_id );
	} else if ( isset( $update_post_id ) ) {
			$post_id = absint( $update_post_id );
	} else {
			return;
	}

	// Don't do anything unless there is a post_id.
	if ( isset( $post_id ) ) {
		if ( 
			$post_id == 55 ||   // camp-faq
			$post_id == 434 ||  // front-page
			$post_id == 18)     // our-team 
			{
				// Get the template of the current post.
				$template_file = get_post_meta( $post_id, '_wp_page_template', true );
				remove_post_type_support( 'page', 'editor' );
		}
	}
}
add_action( 'init', 'evans_lake_remove_editor_init' );

function evans_lake_hero_image_update (){
	if (is_front_page()){
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
		$hero_style = ".home-hero {background-image: linear-gradient(to bottom, rgba(0, 0, 0, .35) 0%, rgba(0, 0, 0, .35) 100%), url('" . $thumb['0'] . "'); background-size: cover,cover; background-position: center, center}";
	}	elseif (is_home()){
		$thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full');
		$hero_style = ".hero-image {background-image: linear-gradient(to bottom, rgba(0, 0, 0, .35) 0%, rgba(0, 0, 0, .35) 100%), url('" . $thumb['0'] . "'); background-size: cover,cover; background-position: bottom, bottom}";
	} else {
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
		$hero_style = ".hero-image {background-image: linear-gradient(to bottom, rgba(0, 0, 0, .35) 0%, rgba(0, 0, 0, .35) 100%), url('" . $thumb['0'] . "'); background-size: cover,cover; background-position: center, center}";
	}
	wp_add_inline_style( 'evans-lake-style', $hero_style );

}
add_action( 'wp_enqueue_scripts', 'evans_lake_hero_image_update' );
