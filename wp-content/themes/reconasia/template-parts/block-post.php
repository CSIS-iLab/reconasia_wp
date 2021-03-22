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
	<!-- 
		TODO:
		- This div should only be added if there's a thumbnail, so it doesn't create space
		if there isn't an image. Wordpress has a function for this.
		- Will you please make the thumbnail a link to the post and have the hover effect be applied to the title when you hover over the image?
	-->
	
		<?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php the_permalink(); ?>" class="post-block__img" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail( 'large' ); ?>
			</a>
		<?php endif; ?>

	<?php
		the_title( '<h3 class="post-block__title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' );
		the_excerpt();			
		reconasia_authors();
		reconasia_posted_on('M j, Y');
		reconasia_display_categories();
	?>
</article><!-- .post -->
