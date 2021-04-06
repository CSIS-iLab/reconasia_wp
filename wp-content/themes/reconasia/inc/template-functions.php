<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package CSIS iLab
 * @subpackage @package ReconAsia
 * @since 1.0.0
 */

/**
 * Classes
 */
/**
 * Add No-JS Class.
 * If we're missing JavaScript support, the HTML element will have a no-js class.
 */
function reconasia_no_js_class() {

	?>
	<script>document.documentElement.className = document.documentElement.className.replace( 'no-js', 'js' );</script>
	<?php

}

add_action( 'wp_head', 'reconasia_no_js_class' );

/**
 * Add conditional body classes.
 *
 * @param array $classes Classes added to the body tag.
 *
 * @return array $classes Classes added to the body tag.
 */
function reconasia_body_classes( $classes ) {

	global $post;
	$post_type = isset( $post ) ? $post->post_type : false;

	// Check whether we're singular.
	if ( is_singular() ) {
		$classes[] = 'singular';
	}

	// Check for post thumbnail.
	if ( is_singular() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	} elseif ( is_singular() ) {
		$classes[] = 'missing-post-thumbnail';
	}

	// Check whether we're in the customizer preview.
	if ( is_customize_preview() ) {
		$classes[] = 'customizer-preview';
	}

	// Check if posts have single pagination.
	if ( is_single() && ( get_next_post() || get_previous_post() ) ) {
		$classes[] = 'has-single-pagination';
	} else {
		$classes[] = 'has-no-pagination';
	}

	// Slim page template class names (class = name - file suffix).
	if ( is_page_template() ) {
		$classes[] = basename( get_page_template_slug(), '.php' );
	}

	return $classes;

}

add_filter( 'body_class', 'reconasia_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function reconasia_pingback_header()
{
    if (is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url(get_bloginfo('pingback_url')), '">';
    }
}
add_action('wp_head', 'reconasia_pingback_header');

/**
 * Archives
 */
/**
 * Filters the archive title and styles the word before the first colon.
 *
 * @param string $title Current archive title.
 *
 * @return string $title Current archive title.
 */
function reconasia_get_the_archive_title( $title ) {

	$regex = apply_filters(
		'reconasia_get_the_archive_title_regex',
		array(
			'pattern'     => '/(\A[^\:]+\:)/',
			'replacement' => '<span class="color-accent">$1</span>',
		)
	);

	if ( empty( $regex ) ) {

		return $title;

	}

	return preg_replace( $regex['pattern'], $regex['replacement'], $title );

}

add_filter( 'get_the_archive_title', 'reconasia_get_the_archive_title' );

/**
 * Get unique ID.
 *
 * This is a PHP implementation of Underscore's uniqueId method. A static variable
 * contains an integer that is incremented with each call. This number is returned
 * with the optional prefix. As such the returned value is not universally unique,
 * but it is unique across the life of the PHP process.
 *
 * @see wp_unique_id() Themes requiring WordPress 5.0.3 and greater should use this instead.
 *
 * @staticvar int $id_counter
 *
 * @param string $prefix Prefix for the returned ID.
 * @return string Unique ID.
 */
function reconasia_unique_id( $prefix = '' ) {
	static $id_counter = 0;
	if ( function_exists( 'wp_unique_id' ) ) {
		return wp_unique_id( $prefix );
	}
	return $prefix . (string) ++$id_counter;
}

/**
 * Fixes empty <p> and <br> tags showing before and after shortcodes in the
 * output content.
 */
function reconasia_the_content_shortcode_fix($content) {
    $array = array(
        '<p>['    => '[',
        ']</p>'   => ']',
        ']<br />' => ']',
        ']<br>'   => ']'
    );
    return strtr($content, $array);
}
add_filter('the_content', 'reconasia_the_content_shortcode_fix');

/**
 * Use relative URLs for images
 */
function reconasia_switch_to_relative_url($html, $id, $caption, $title, $align, $url, $size, $alt)
{
    $imageurl = wp_get_attachment_image_src($id, $size);
    $relativeurl = wp_make_link_relative($imageurl[0]);
    $html = str_replace($imageurl[0],$relativeurl,$html);

    return $html;
}
add_filter('image_send_to_editor','reconasia_switch_to_relative_url',10,8);


/**
 * Make links pushed to Algolia relative.
 *
 * @param array   $shared_attributes Attributes to push.
 * @param WP_Post $post Post object.
 * @return array Updated Attributes array.
 */
function reconasia_algolia_shared_attributes( array $shared_attributes, WP_Post $post ) {

    $shared_attributes['permalink'] = wp_make_link_relative( get_post_permalink( $post ) );
    if ( has_post_thumbnail( $post ) ) {
        $shared_attributes['images']['thumbnail']['url'] = wp_make_link_relative( get_the_post_thumbnail_url( $post ) );
    }
    return $shared_attributes;
}
add_filter( 'algolia_post_shared_attributes', 'reconasia_algolia_shared_attributes', 10, 2 );
add_filter( 'algolia_searchable_post_shared_attributes', 'reconasia_algolia_shared_attributes', 10, 2 );


/**
 * Only use Photon for images belonging to our site.
 *
 * @see https://wordpress.org/support/?p=8513006
 *
 * @param bool         $skip      Should Photon ignore that image.
 * @param string       $image_url Image URL.
 * @param array|string $args      Array of Photon arguments.
 * @param string|null  $scheme    Image scheme. Default to null.
 */
function jetpack_photon_only_allow_local( $skip, $image_url, $args, $scheme ) {
    // Get the site URL, without any protocol.
    $site_url = preg_replace( '~^(?:f|ht)tps?://~i', '', get_site_url() );

    /**
     * If the image URL is from our site,
     * return default value (false, unless another function overwrites).
     * Otherwise, do not use Photon with it.
     */
    if ( strpos( $image_url, $site_url ) ) {
        return $skip;
    } else {
        return true;
    }
}
add_filter( 'jetpack_photon_skip_for_url', 'jetpack_photon_only_allow_local', 9, 4 );


/**
 * Remove comments from media attachements, specifically the comments on the JetPack Carousel Slides
 * @param  string $open    Content
 * @param  ID $post_id Post ID
 * @return string          Content
 */
function filter_media_comment_status( $open, $post_id ) {
    $post = get_post( $post_id );
    if( $post->post_type == 'attachment' ) {
        return false;
    }
    return $open;
}
add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );

/**
 * Overwrite default more tag with styling and screen reader markup.
 *
 * @param string $html The default output HTML for the more tag.
 *
 * @return string $html
 */
function reconasia_read_more_tag( $html ) {
	return preg_replace( '/<a(.*)>(.*)<\/a>/iU', sprintf( '<div class="read-more-button-wrap"><a$1><span class="faux-button">$2</span> <span class="screen-reader-text">"%1$s"</span></a></div>', get_the_title( get_the_ID() ) ), $html );
}

add_filter( 'the_content_more_link', 'reconasia_read_more_tag' );

/** Modify Excerpt */
function new_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


/**
 * Add search link to the main menu.
 * @param  string $items Menu items content.
 * @param  array $args  Menu.
 * @return string        Modified menu.
 */
function reconasia_add_search_box( $items, $args ) {
    if($args->theme_location == 'primary') {
        $search = '<li class="search">';
        $search .= '<form method="get" id="searchform" action="/"><div class="input-group">';
        $search .= '<label class="screen-reader-text" for="navSearchInput">Search for:</label>';
        $search .= '<input type="text" class="form-control" name="s" id="navSearchInput" placeholder="Search" />';
        $search .= '<label for="navSearchInput" id="navSearchLabel"><i class="fa fa-search" aria-hidden="true"></i></label>';
        $search .= '</div></form>';
        $search .= '</li>';
        return $items.$search;
    }
    return $items;
}
add_filter( 'wp_nav_menu_items','reconasia_add_search_box', 10, 2 );

/**
 * Alter the titles of the archives for categories & tags.
 * @param  string $title Archive title
 * @return string        Modified archive title.
 */
function reconasia_archive_titles( $title ) {
    if( is_category() ) {
        $title = single_cat_title( '<span class="entry-header__title-label">Topic</span> ', false );
    } elseif( is_tag() ) {
        $title = single_tag_title( '<span class="entry-header__title-label">Tag</span> ', false );
    } elseif( is_author() ) {
        $title = '<span class="entry-header__title-label">Author</span> ' . get_the_author();
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'reconasia_archive_titles' );

/**
*
* Recreate the default filters on the_content so we can pull formated content with get_post_meta
*/
add_filter( 'meta_content', 'wptexturize' );
add_filter( 'meta_content', 'convert_smilies' );
add_filter( 'meta_content', 'convert_chars' );
add_filter( 'meta_content', 'wpautop' );
add_filter( 'meta_content', 'shortcode_unautop' );
add_filter( 'meta_content', 'prepend_attachment' );
add_filter( 'meta_content', 'do_shortcode' );
add_filter( 'term_description', 'do_shortcode' );



function reconasia_undo_footnote_reset() {
    if ( in_array( get_post_type(), array( 'actors', 'systems', 'post', 'defsys', 'missile' ) ) && is_single() ) {
        global $easyFootnotes;
        remove_filter( 'the_content', array($easyFootnotes, 'easy_footnote_reset'), 999 );
    }
}
add_action( 'template_redirect', 'reconasia_undo_footnote_reset' );

if ( class_exists( 'easyFootnotes' ) ) {
    /**
     * Removes the easy footnotes from the content so we can display them separately elsewhere.
     * @param  string $content The post content.
     * @return string          The modified post content.
     */
    function reconasia_remove_easy_footnotes($content) {
        $content = preg_replace('#<ol[^>]*class="easy-footnotes-wrapper"[^>]*>.*?</ol>#is', '', $content);
        return $content;
    }
    add_filter('the_content', 'reconasia_remove_easy_footnotes', 20);
}

/**
 * Update Recon Asia archive to exclude any of the related/featured posts from showing up in the main loop.
 *
 * @param  array $query Query object.
 */

function reconasia_exclude_related__posts_from_archive( $query ) {

	if ( $query->is_main_query() && ! is_admin() && is_archive() ) {
		$featured_post = get_field( 'featured_post', $term );

		if ( $featured_post ) {
				$excluded_post_ids = array();

				foreach ($featured_post as $post) {
					$excluded_post_ids[] = $post;
				}

			$query->set( 'post__not_in', $excluded_post_ids);
		}

	}
}
add_action( 'pre_get_posts', 'reconasia_exclude_related__posts_from_archive' );
