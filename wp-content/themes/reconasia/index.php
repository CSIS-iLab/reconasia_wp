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

<<<<<<< HEAD
		get_template_part( 'template-parts/entry-header' );
=======
	reconasia_pagination_number_of_posts();

	if ( is_archive() ) {
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
>>>>>>> Add total results pagination function

		if ( have_posts() ) {

			while ( have_posts() ) {
				the_post();

				get_template_part( 'template-parts/block', get_post_type() );

			}
			wp_reset_postdata();
		}
<<<<<<< HEAD
=======
	}

	get_template_part( 'template-parts/pagination' );
>>>>>>> Add total results pagination function
	?>

</main><!-- #site-content -->

<?php
get_footer();
