<?php
/**
 * The template for displaying ReconAsia Originals posts in Issues.
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
	<header class="post-block__header">
		<?php
		reconasia_post_meta( array(
			'show_issue' => false,
			'show_date' => false,
			'show_reconasia_original' => true ) );

		the_title( '<h2 class="post-block__title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
		?>
	</header>

	<?php
		the_excerpt();
  	reconasia_authors();

		echo '<figure class="post-block__img">
			<a href="' . esc_url ( get_permalink() ) . '">' . get_the_post_thumbnail() . '</a>
		</figure>';
	?>

</article><!-- .post -->
