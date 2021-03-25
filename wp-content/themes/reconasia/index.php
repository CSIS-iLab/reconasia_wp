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
		if( $featured_post ): ?>
				<?php
					echo '<div class="post-block--featured">';
						echo '<span class="post-block--featured__label">Featured</span>';
						foreach( $featured_post as $post ):
							// Setup this post for WP functions (variable must be named $post).
							setup_postdata($post);
							get_template_part( 'template-parts/block-post-featured' );
						endforeach;
					echo '</div>';
				?>
				<?php 
				// Reset the global post object so that the rest of the page works correctly.
				wp_reset_postdata(); ?>
		<?php endif;

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
		if ( have_posts() ) {
			$i = 0;

			while ( have_posts() ) {
				$i++;
				if ( $i > 1 ) {
					echo '<hr class="post-separator styled-separator is-style-wide section-inner" aria-hidden="true" />';
				}
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

			}
		}
	}
	?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
