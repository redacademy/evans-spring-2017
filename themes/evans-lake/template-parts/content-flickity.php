<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @package Evans_Lake_Theme
 */

?>

<div class="main-carousel container" data-flickity='{ "cellAlign": "left", "contain": true }'>

  <?php $args = array( 'posts_per_page' => 3,); ?>
  <?php $posts = get_posts( $args ); ?>
  <?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>
    <div class="carousel-cell">
      <div class="events-thumbnail"><?php the_post_thumbnail( 'large' ); ?></div>
      <div class="events-post">
        <h3 class="events-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <p class="entry"><a href="<?php the_permalink(); ?>" class="product-button">Read Entry</a></p>
      </div>
    </div>
  <?php endforeach; ?>
  <?php wp_reset_postdata(); ?>
    
</div>