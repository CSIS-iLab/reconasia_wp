<?php
/**
 * Reconnecting Asia Custom Shortcodes
 *
 * @package CSIS iLab
 * @subpackage @package ReconAsia
 * @since 1.0.0
 */

function reconasia_shortcode_share_button( $atts, $content = null ) {

	// If there is an anchor link, direct the user's here instead of the top of the page.
	$atts = shortcode_atts(
		array(
				'anchor' => null,
				'image' => null,
		), $atts, 'share' );

	$anchor = null;

	if ( $atts['anchor'] != '' ) {
		$anchor = '#' . $atts['anchor'];
	}

	// If there is an image associated with this block, share it.
	$img = null;

	if ( $atts['image'] ) {
		$image_data = json_decode( html_entity_decode($atts['image'] ), true);
		$img = ' ' . $image_data['url'];
	}

	$shareArgs = array(
		'linkname' => get_the_title() . $img,
		'linkurl' => get_permalink() . $anchor
	);

	$output = '<div class="csis-block__share">';

	ob_start();
	if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) {
    ADDTOANY_SHARE_SAVE_KIT( $shareArgs );
	}
	$output .= ob_get_contents();
	ob_end_clean();

	$output .= '
		<button class="csis-block__share-btn btn btn--circle" aria-expanded="false" aria-label="Share on social media">' . reconasia_get_svg( 'share' ) . reconasia_get_svg( 'close' ) . '</button>
	</div>';

	return $output;
}

add_shortcode( 'share', 'reconasia_shortcode_share_button' );
