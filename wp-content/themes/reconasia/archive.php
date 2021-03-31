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
		// echo 'hola';
		// get_template_part( 'template-parts/entry-header' );

		// if ( have_posts() ) {

		// 	reconasia_pagination_number_of_posts();

		// 	while ( have_posts() ) {
		// 		the_post();

		// 		get_template_part( 'template-parts/block', get_post_type() );

		// 	}
		// 	wp_reset_postdata();
		// }

		// get_template_part( 'template-parts/pagination' );\

			// get the current taxonomy term
			$term = get_queried_object();
			// vars
			$featured_post = get_field('featured_post', $term);
			// var_dump($featured_post);
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
					if ($i == 0) {
						get_template_part( 'template-parts/block-issues-featured' );
					} else {
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
