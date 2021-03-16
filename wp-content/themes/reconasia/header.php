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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<?php wp_head(); ?>
		<script>
				const hamburger = document.getElementById('hamburger');
				const navUL = document.getElementById('nav-ul');

				hamburger.addEventListener('click'), () => {
					console.log("hello")
					navUl.classList.toggle('show');
				}
			</script>
	</head>
	<style>
	@import 'assets/_scss/layout/_header.scss';
	</style>
	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>
		<?php reconasia_get_svg_icons(); ?>

		<header id="site-header" class="header" role="banner">

				<nav>
					<a href="<?php echo get_home_url(); ?>" class="header__logo" title="Go home"><?php include( get_template_directory() . '/assets/static/csisra-logo.svg'); ?></a>
					<button class="hamburger" id="hamburger">
						<i class="fa fa-bars"></i>
					</button>
					<ul class="nav-ul" id="nav-ul">
						<li><a href="#">Topics</a></li>
						<li><a href="#">Maps & Data</a></li>
						<li><a href="#">About</a></li>
					</ul>
					<a href=""><?php echo reconasia_get_svg( 'search' ); ?></a>
				</nav>
			</header><!-- #site-header -->
		<div class="container">
