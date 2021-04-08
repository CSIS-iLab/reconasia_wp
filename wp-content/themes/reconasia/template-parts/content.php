<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CSIS iLab
 * @subpackage @package ReconAsia
 * @since 1.0.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php

	get_template_part( 'template-parts/entry-header' );

	?>

	<div class="single__content">
		<?php
			the_content( __( 'Continue reading', 'reconasia' ) );
		?>
	</div><!-- .post-inner -->

	<footer class="single__footer">
		<?php get_template_part( 'template-parts/featured-image-caption' ); ?>
		<?php echo reconasia_authors_list_extended(); ?>
	</footer>

</article><!-- .post -->
