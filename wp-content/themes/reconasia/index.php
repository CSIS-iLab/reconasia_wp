<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CSIS iLab
 * @subpackage @package ReconAsia
 * @since 1.0.0
 */

get_header();
?>

<main id="site-content" role="main">

	<?php
		if ( is_archive() ) {
			// get the current taxonomy term
			$term = get_queried_object();
			// vars
			$featured_post = get_field('featured_post', $term);
			// var_dump($featured_post);
			if ( $featured_post ) {
					echo '<div class="post-block--featured">';
						echo '<span class="post-block--featured__label">Featured</span>';
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

		} else {
			get_template_part( 'template-parts/entry-header' );


			if ( have_posts() ) {

				reconasia_pagination_number_of_posts();

				while ( have_posts() ) {
					the_post();

					get_template_part( 'template-parts/block', get_post_type() );

				}
				wp_reset_postdata();
			}


			get_template_part( 'template-parts/pagination' );
		}
		
	?>

</main><!-- #site-content -->

<?php
get_footer();