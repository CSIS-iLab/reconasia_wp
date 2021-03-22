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
		$thumbnail =  has_post_thumbnail();
	?>
	<!-- 
		TODO:
		- This div should only be added if there's a thumbnail, so it doesn't create space
		if there isn't an image. Wordpress has a function for this.
		- Will you please make the thumbnail a link to the post and have the hover effect be applied to the title when you hover over the image?
	-->
	<div class="post-block-right">
		<?php
			// if ( !is_front_page() ){
				// echo get_the_post_thumbnail( get_the_ID(), 'large' );		
			// }
			if ( $thumbnail ){
				echo '<a href="' . esc_url( get_permalink() ) .'">';
					echo get_the_post_thumbnail();
				'</a>';
			}
		?>	
	</div>

	<div class="post-block-left">
		<?php
			the_title( '<h3 class="post-block__title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' );			
			the_excerpt();			
			reconasia_authors();
			reconasia_posted_on();
			reconasia_display_categories();
		?>
	</div>
</article><!-- .post -->
