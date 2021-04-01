<?php
/**
 * The Archive template.
 *
 * @package CSIS iLab
 * @subpackage @package ReconAsia
 * @since 1.0.0
 */

get_header();
?>

<main id="site-content" role="main">

	<?php
			// get the current taxonomy term
			$term = get_queried_object();
			// vars
			$featured_post = get_field('featured_post', $term);
			if ( $featured_post ) {

				echo '<div class="post-block--featured__label"><span>Featured</span></div>';
				echo '<div class="post-block--featured">';
					foreach( $featured_post as $post ):
						// Setup this post for WP functions (variable must be named $post).
						setup_postdata($post);
						get_template_part( 'template-parts/block-post-featured' );
					endforeach;
				echo '</div>';
				// Reset the global post object so that the rest of the page works correctly.
				wp_reset_postdata();
			}

			if ( have_posts() ) {
				$i = 0;

				while ( have_posts() ) {
					the_post();

					if( the_post() != $featured_post){
						get_template_part( 'template-parts/block', get_post_type() );
					}

					$i++;

				}
				wp_reset_postdata();
			}

		?>

</main><!-- #site-content -->

<?php
get_footer();
