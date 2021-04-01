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
	<?php

	$featured_primary_post = get_field( 'primary_featured_post' );

	if ( $featured_primary_post ) :

		echo '<section class="home__featured-primary">';

		foreach ( $featured_primary_post as $post ) :

			setup_postdata( $post );
			get_template_part( 'template-parts/block', get_post_type() );

		endforeach;

		wp_reset_postdata();
		echo '</section>';

	endif; ?>

	<section class="home__recent">
		<h2 class="home__recent-section-title"><?php _e( 'Recent Posts', 'reconasia' ); ?></h2>
		<?php

		$most_recent_args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => 5
		);

		$most_recent_posts = new WP_Query( $most_recent_args );

		if ( $most_recent_posts->have_posts() ) {
			while ( $most_recent_posts->have_posts() ) {
				$most_recent_posts->the_post();
				get_template_part( 'template-parts/block', get_post_type() );
			}
			wp_reset_postdata();
		}

		?>
	</section>

	<?php
	$featured_secondary_posts = get_field( 'secondary_featured_posts' );

	if ( $featured_secondary_posts ) :

		echo '<section class="home__featured-secondary">';

		foreach ( $featured_secondary_posts as $post ) :

			setup_postdata( $post );
			get_template_part( 'template-parts/block', get_post_type() );

		endforeach;

		wp_reset_postdata();
		echo '</section>';

	endif;

	$featured_content = get_field('featured_content');

	if ( $featured_content ) :
		echo '<section class="home__featured-content" style="background-image:url(' . esc_url($featured_content['image']['url']) . ');">';
			echo '<div class="home__featured-content-wrapper">';
				echo '<h2 class="home__featured-content-title">' . $featured_content['title'] . '</h2>';
				echo '<p class="home__featured-content-desc">' . $featured_content['description'] . '</p>';
				echo '<a class="home__featured-content-link btn btn--outline-light btn--small" href="' . $featured_content['url'] . '">Browse our resources</a>';
			echo '</div>';
		echo '</section>';
	endif;

	?>

</main><!-- #site-content -->

<?php get_footer(); ?>
