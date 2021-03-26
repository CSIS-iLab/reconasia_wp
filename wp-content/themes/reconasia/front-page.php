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

		echo '<section class="home__featured-secondary">';

		foreach ( $featured_primary_post as $post ) :

			setup_postdata( $post );
			get_template_part( 'template-parts/block', get_post_type() );

		endforeach;

		wp_reset_postdata();
		echo '</section>';

	endif;


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

	?>

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

</main><!-- #site-content -->

<?php get_footer(); ?>
