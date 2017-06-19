<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @package Evans_Lake_Theme
 */

?>

<h1 class="blog container">News & Events</h1>
<div class="main-carousel container" data-flickity='{ "cellAlign": "left", "contain": true }'>

  <?php $args = array( 'posts_per_page' => 3,); ?>
  <?php $posts = get_posts( $args ); ?>
  <?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>
    <div class="carousel-cell">
      <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
      <div class="events-thumbnail" style="background-image: url('<?php echo $thumb['0'];?>'); background-size: cover; background-position: center;">
      </div>
      <a href="<?php the_permalink(); ?>">
        <div class="events-post">
          <h2 class="events-title"><?php the_title(); ?></h2>
        </div>
      </a>
    </div>
  <?php endforeach; ?>
  <?php wp_reset_postdata(); ?>
    
</div>