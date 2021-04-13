<?php
/**
 * The Search template.
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

	?>

	<div class='archive__content'>

	<?php
	$archive_subtitle    = '';

		if ( have_posts() ) {

			reconasia_pagination_number_of_posts();

			echo '<section class="archive__base">';
			while ( have_posts() ) {
				the_post();

				get_template_part( 'template-parts/block-post', get_post_type() );

			}
			wp_reset_postdata();
			echo '</section>';

		} elseif ( is_search() ) {
			?>

			<div class="no-search-results-form section-inner thin">
		
				<?php
				get_search_form(
					array(
						'label' => __( 'search again', 'reconasia' ),
						'class' => 'class="screen-reader-text"'
					)
				);

				?>
				
				<h2><?php esc_html_e( 'Nothing Found', 'reconasia' ); ?></h2>

				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'reconasia' ); ?></p>
			</div><!-- .no-search-results -->

			<?php
		}
		?>
	
		<?php
		get_template_part( 'template-parts/pagination' );
	?>

	</div>

</main><!-- #site-content -->

<?php
get_footer();
