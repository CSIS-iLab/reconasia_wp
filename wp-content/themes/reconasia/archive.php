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
	?>

</main><!-- #site-content -->

<?php
get_footer();
