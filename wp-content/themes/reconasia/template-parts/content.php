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
      reconasia_display_footnotes();
			get_template_part( 'template-parts/featured-image-caption' );
    ?>
	</div><!-- .post-inner -->

	<?php if ( is_single() ) { ?>
	<footer class="single__footer">
		<?php
			// get_template_part( 'template-parts/post-related-content' );
			echo do_shortcode( '[jprel]' );
			if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); }
		?>
	</footer>
	<?php } ?>

</article><!-- .post -->
