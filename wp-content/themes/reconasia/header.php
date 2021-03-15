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
	<style>
	@import 'assets/_scss/layout/_header.scss';
	</style>
	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>
		<?php reconasia_get_svg_icons(); ?>

		<div class="container">

			<header id="site-header" class="header" role="banner">

				<a href="<?php echo get_home_url(); ?>" class="header__logo" title="Go home"><?php include( get_template_directory() . '/assets/static/csisra-logo.svg'); ?></a>

				<div class="topnav" id="myTopnav">
				<a href="#news">Topics</a>
				<a href="#contact">Maps & Data</a>
				<a href="#about">About</a>
				<a href="#about"><?php echo reconasia_get_svg( 'search' ); ?></a>
				<a href="javascript:void(0);" class="icon" onclick="myFunction()">
					Hamburger
				</a>
				</div>

			</header><!-- #site-header -->

			<script>
			function myFunction() {
				var x = document.getElementById("myLinks");
				if (x.style.display === "block") {
					x.style.display = "none";
				} else {
					x.style.display = "block";
				}
			}
			</script>
