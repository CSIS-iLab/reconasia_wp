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
		get_template_part( 'template-parts/entry-header' );

		if ( have_posts() ) {
			reconasia_pagination_number_of_posts();
		}

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
		get_template_part( 'template-parts/pagination' );

		$term = get_queried_object();
		$cards = get_field('card', $term);

		if( $cards ) { ?>
			<div class="cards__container">
			<?php foreach( $cards as $card) { 
				if ( $card['card_description'] ) {

					$link = $card['page_link'];
					?>
				<div class='card' style="background-image: url('<?php echo esc_url($card['background_image']); ?>');">
					<div class="card__wrapper">
						<a href="<?php echo esc_url($link['url'])  ?>" class="card__link">
							<?php if($card['card_title']) {
								echo '<h2 class="card__title">' . $card['card_title'] . '</h2>';
							} else {
								echo '<h2 class="card__title">' . $link['title'] . '</h2>';
							} ?>
							<?php echo '<p class="card__description">' . reconasia_get_svg( 'single-arrow' ) . $card['card_description'] . '</p>'; ?>
						</a>
					</div><!-- .card__wrapper -->
				</div><!-- .card -->
			<?php }
			} ?>
		</div><!-- .cards__container -->
		<?php } ?>

</main><!-- #site-content -->

<?php
get_footer();
