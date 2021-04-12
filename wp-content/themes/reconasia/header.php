<?php
/**
 * Header file for the Reconnecting Asia WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CSIS iLab
 * @subpackage @package ReconAsia
 * @since 1.0.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>
		<?php reconasia_get_svg_icons(); ?>

	<header class="header" role="banner">
		<div class="container header__inner">
		<a href="<?php echo get_home_url(); ?>" class="header__logo" title="Go home"><?php include( get_template_directory() . '/assets/static/reconasia-logo.svg'); ?></a>
		<div class="spacer"></div>

		<?php get_template_part( 'template-parts/site-nav' );?>

		<div class="search">
      <form method="get" id="searchform" action="/">
				<div class="input-group">
      		<label class="screen-reader-text" for="navSearchInput">Search for:</label>
      		<input type="text" class="form-control" name="s" id="navSearchInput" placeholder="Search" />
      		<label for="navSearchInput" id="navSearchLabel">
						<button id="search-submit" class="header__search-submit" type='submit' aria-label="Submit search"><span class="screen-reader-text">Submit search</span><?php echo reconasia_get_svg( 'search' ); ?></button>
					</label>
					<button id="search-close" class="header__search-close" type='reset' aria-label='Close Search Form'><span class="screen-reader-text">Close search form</span><?php echo reconasia_get_svg( 'close' ); ?></button>
      	</div>
			</form>
			<label for="navSearchInput">
				<button id="search-trigger" class="header__search-trigger">
					<span class="screen-reader-text">Open search</span><?php echo reconasia_get_svg( 'search' ); ?>
				</button>
			</label>
		</div>
</div>
	</header>
