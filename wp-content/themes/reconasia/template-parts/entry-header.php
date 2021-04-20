<?php
/**
 * Displays the post header
 *
 * @package CSIS iLab
 * @subpackage @package ReconAsia
 * @since 1.0.0
 */

$is_archive = is_archive();
$is_page = is_page();
$has_thumbnail = has_post_thumbnail();
$post_type = get_post_type();
$is_404 = is_404();
$is_search = is_search();
$is_home = is_home();

$template = get_page_template_slug( get_the_ID() );
$isNoImageTemplate = false;

if ( $template === 'templates/template-no-image.php' ){
	$isNoImageTemplate = true;
}

?>

<header class="entry-header">

	<?php

		if ( $is_archive ) {

			the_archive_title( '<h1 class="entry-header__title">', '</h1>' );

			the_archive_description('<div class="entry-header__desc">', '</div>');

		} elseif ( $is_home ) {
			$title = get_queried_object()->post_title;
		?>
			<h1 class="entry-header__title"><?php echo wp_kses_post( $title ); ?></h1>
		<?php
		} elseif ( $is_search ) {

			$archive_title = sprintf(
			'%1$s %2$s',
			'<span class="entry-header__title-label">' . __( 'Search results for', 'reconasia' ) . '</span>',
			'&lsquo;' . get_search_query() . '&rsquo;'
		);

		?>

		<h1 class="entry-header__title"><?php echo wp_kses_post( $archive_title ); ?></h1>

		<?php

		} elseif ( $is_404 ) { ?>

			<h1 class="entry-header__title"><?php _e( '404', 'reconasia' ); ?></h1>

		<?php } elseif ( $is_page ) {
			the_title( '<h1 class="entry-header__title">', '</h1>' );

			reconasia_page_desc();
		}

		elseif ( is_single() ) {
			echo '<div class="entry-header__header-content">';
				the_title( '<h1 class="entry-header__title">', '</h1>' );
				reconasia_page_desc();
				reconasia_authors();
				reconasia_posted_on();
			echo '</div>';
			if ( !$isNoImageTemplate ) {
				get_template_part( 'template-parts/featured-image' );
			}

		}
	?>

</header><!-- .entry-header -->
