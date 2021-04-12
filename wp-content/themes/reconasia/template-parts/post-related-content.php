<?php
/**
 * The default template for displaying related content
 *
 * Used for singular.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CSIS iLab
 * @subpackage @package ReconAsia
 * @since 1.0.0
 */

?>
 <!-- post-related-content.php -->
<div class="single__related-posts">
    <?php
      $term = get_queried_object();
      // vars
      $related_posts = get_field( 'related_posts', $term );
      // if related content we show them
      if ( $related_posts ) {
        echo '<h2 class="single__related-posts__label">Related Content</h2>';
        reconasia_display_tags();
        echo '<div class="single__related-posts__container">';
          foreach( $related_posts as $post ):
            // Setup this post for WP functions (variable must be named $post).
            setup_postdata($post);
            get_template_part( 'template-parts/block-post-related' );
          endforeach;
        echo '</div>';
        // Reset the global post object so that the rest of the page works correctly.
        wp_reset_postdata();
        }
    ?>
</div><!-- .single__related-posts -->
