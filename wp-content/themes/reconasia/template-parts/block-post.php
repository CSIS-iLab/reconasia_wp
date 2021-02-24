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

<article <?php post_class('post-block post-block--post'); ?> id="post-<?php the_ID(); ?>">

	<?php
	reconasia_post_meta( array( 'show_reconasia_original' => false ) );

	the_title( '<h3 class="post-block__title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' );

	the_excerpt();

	reconasia_authors();
	?>

</article><!-- .post -->
