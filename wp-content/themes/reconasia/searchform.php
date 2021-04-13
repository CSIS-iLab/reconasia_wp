<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CSIS iLab
 * @subpackage @package ReconAsia
 * @since 1.0.0
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label if
 * one was passed to get_search_form() in the args array.
 */
$unique_id = reconasia_unique_id( 'search-form-' );

$aria_label = ! empty( $args['label'] ) ? 'aria-label="' . esc_attr( $args['label'] ) . '"' : '';
?>
<form role="search" <?php echo $aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $unique_id ); ?>">
		<span class="screen-reader-text"><?php _e( 'Search for:', 'reconasia' ); // phpcs:ignore: WordPress.Security.EscapeOutput.UnsafePrintingFunction -- core trusts translations ?></span>
		<input type="search" id="<?php echo esc_attr( $unique_id ); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'reconasia' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<label for="searchInput">
    <button id="search-trigger" class="search-trigger">
      <span class="screen-reader-text">Open search</span><?php echo reconasia_get_svg( 'search' ); ?>
    </button>
  </label>
	<button id="search-close" class="search-close" type='reset' aria-label='Close Search Form'><span class="screen-reader-text">Close search form</span><?php echo reconasia_get_svg( 'close' ); ?>
	</button>
</form>
