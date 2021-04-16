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
		echo '<h2 class="home__featured-primary-label">Featured</h2>';


		foreach ( $featured_primary_post as $post ) :

			setup_postdata( $post );
			get_template_part( 'template-parts/block', get_post_type() );

		endforeach;

		wp_reset_postdata();

		echo '</section>';

	endif; ?>

	<section class="home__recent">
		<h2 class="home__recent-label"><?php _e( 'Recent Posts', 'reconasia' ); ?></h2>
		<?php
		echo reconasia_get_svg( "3-arrows" );

		echo '<div class="home__recent-posts">';

		// var_dump($featured_primary_post);
		// var_dump($featured_secondary_posts);

		$test = get_posts(array(
			'posts_per_page'	=> 3,
			'post_type' => 'post',
			'post_status' => 'publish',
			'meta_key' => 'primary_featured_post'
			'meta_value' => 'a:1:{i:0;s:3:"422";}'
		));
		var_dump($test);

		$most_recent_args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => 3,
			'tax_query' => array(
				array(
					'meta_key' => 'primary_featured_post',
				),	
			),
			// 'meta_key' => 'secondary_featured_posts',
			// 'tax_query' => array(
			// 	'relation' => 'OR',
			// 	array(
			// 		'field' => 'name',
			// 		'terms' => 'secondary_featured_posts',
			// 		'operator' => 'NOT IN',
			// 	),
			// ),
		);

		// var_dump($most_recent_args);
		/*
		** And you should be able to do it by excluding the relevant
		** post IDs in the $most_recent_args parameters.
		*/

		$most_recent_posts = new WP_Query( $most_recent_args );
		// var_dump($most_recent_posts);

		if ( $most_recent_posts->have_posts() ) {
			while ( $most_recent_posts->have_posts() ) {
				$most_recent_posts->the_post();
				get_template_part( 'template-parts/block', get_post_type() );
			}
			wp_reset_postdata();
		}

		?>
		</div>
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

	endif; ?>

<section class="home__cta">
	<a href="/analysis" class="btn btn--outline-dark btn--med">All Posts <?php echo reconasia_get_svg( "chevron-right" ); ?></a>
</section>

	<?php
	$featured_content = get_field('featured_content');

	if ( $featured_content ) :
		echo '<section class="home__featured-content" style="background-image:url(' . esc_url($featured_content['image']['url']) . ');">';
			echo '<div class="home__featured-content-wrapper">';
				echo '<h2 class="home__featured-content-title">' . $featured_content['title'] . '</h2>';
				echo '<div class="home__featured-content-desc">' . $featured_content['description'] . '</div>';
				echo '<a class="home__featured-content-link btn btn--outline-light btn--small" href="' . $featured_content['url'] . '">Browse our resources' . reconasia_get_svg( "chevron-right" ) . '</a>';
			echo '</div>';
		echo '</section>';
	endif;

	?>

</main><!-- #site-content -->

<?php get_footer(); ?>
