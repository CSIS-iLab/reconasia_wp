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
		<nav class="header__nav">
			<label class="header__toggle" for="toggle">&#9776;</label>
			<a href="<?php echo get_home_url(); ?>" class="header__logo" title="Go home"><?php include( get_template_directory() . '/assets/static/csisra-logo.svg'); ?></a>
			<a class="header__search-icon-mobile"><?php echo reconasia_get_svg( 'search' ); ?></a>
			<input type="checkbox" id="toggle"/>
			<ul class="header__menu">
				<li class="menu-item-has-children">
					<a>Topics</a>
					<ul class="sub-menu">
						<li><a href="">Topic 1</a></li>
					</ul>
				</li>
				</li><a href="#">Maps & Data</a></li>
				</li><a href="#">About</a></li>
			</ul>
			<a class="header__search-icon"><?php echo reconasia_get_svg( 'search' ); ?></a>
		</nav>
	</header>
