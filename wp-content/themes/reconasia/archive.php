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
							<?php echo '<p class="card__description">' . $card['card_description'] . '</p>'; ?>
						</a>
					</div><!-- .card__wrapper -->
				</div><!-- .card -->
			<?php } ?>
		</div><!-- .cards__container -->
		<?php }

	?>

</main><!-- #site-content -->

<?php
get_footer();
