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
		if (class_exists('ACF') && !is_paged()) {
			$term = get_queried_object();
			// vars
			$featured_post = get_field('featured_post', $term);
			if ( $featured_post ) {

				echo '<section class="archive__featured">';
					echo '<h2 class="archive__featured-label">Featured</h2>';
					foreach( $featured_post as $post ):
						// Setup this post for WP functions (variable must be named $post).
						setup_postdata($post);
						// get_template_part( 'template-parts/block-post-featured' );
						get_template_part( 'template-parts/block', get_post_type() );
					endforeach;
				echo "</section>";
				// Reset the global post object so that the rest of the page works correctly.
				wp_reset_postdata();
			}
		}

		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/block', get_post_type() );
			}
			wp_reset_postdata();
		}

	?>

</main><!-- #site-content -->

<?php
get_footer();
