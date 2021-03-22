<?php
/**
 * Displays the post header
 *
 * @package CSIS iLab
 * @subpackage @package ReconAsia
 * @since 1.0.0
 */

$template = get_page_template_slug( get_the_ID() );
$isNoImageTemplate = false;

if ( $template === 'templates/template-no-image.php' ){
	$isNoImageTemplate = true;
}

?>

<header class="single__header">

	<?php

		the_title( '<h1 class="single__title">', '</h1>' );

		if ( has_excerpt() && is_singular() ) {
			the_excerpt();
		}

		reconasia_authors();

		reconasia_posted_on();


		if ( !$isNoImageTemplate ) {
			get_template_part( 'template-parts/featured-image' );
		}
	?>

</header><!-- .entry-header -->
