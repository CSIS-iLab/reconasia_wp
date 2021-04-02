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

	<header class="header">
		<div class="header__nav">
			<label class="header__toggle" for="toggle">&#9776;</label>
			<a href="<?php echo get_home_url(); ?>" class="header__logo" title="Go home"><?php include( get_template_directory() . '/assets/static/csisra-logo.svg'); ?></a>
			<input type="checkbox" id="toggle"/>
			<div class="header__menu">
				<a href="#">Topics</a>
				<a href="#">Maps & Data</a>
				<a href="#">About</a>
				<!-- site-header -->
			</div>
			<!-- <a class="header__search-icon"><?php echo reconasia_get_svg( 'search' ); ?></a> -->
		</div>
	</header>	
