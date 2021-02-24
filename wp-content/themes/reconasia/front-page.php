<?php
/**
 * The template for displaying the home page.
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
	<section class="home__recent">
	<?php

  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 5
  );

  $posts = new WP_Query( $args );

	if ( $posts->have_posts() ) {

		while ( $posts->have_posts() ) {
			$posts->the_post();

			if ($posts->current_post === 0) {
				get_template_part( 'template-parts/block', get_post_type() );
			} else {
				get_template_part( 'template-parts/block', get_post_type() );
			}

		}

		wp_reset_postdata();
	}

	?>
	</section>

</main><!-- #site-content -->

<?php get_footer(); ?>
