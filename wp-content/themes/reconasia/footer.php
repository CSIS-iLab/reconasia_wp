<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CSIS iLab
 * @subpackage @package ReconAsia
 * @since 1.0.0
 */

?>
	<style>
	@import 'assets/_scss/layout/_footer.scss';
	</style>
			<footer id="site-footer" class="footer" role="contentinfo">
				<a href="https://www.csis.org" class="footer__logo"><?php include( get_template_directory() . '/assets/static/csis-logo.svg'); ?></a>

				<?php dynamic_sidebar( 'sidebar-1' ); ?>
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
				<?php dynamic_sidebar( 'sidebar-3' ); ?>

				<div class="footer__contact">
					<address class="footer__address">
						1616 Rhode Island Ave NW<br />
						Washington, DC 20036
					</address>

					<p class="footer__phone">(202) 887-0200</p>

					<!-- Social share icons -->
				</div>


				<p class="footer__copyright">Copyright &copy;
					<?php
					echo date_i18n(
						/* translators: Copyright date format, see https://secure.php.net/date */
						_x( 'Y', 'copyright date format', 'reconasia' )
					);
					?>
					Center for Strategic and International Studies.<br />All rights reserved. <a href="https://www.csis.org/privacy-policy">Privacy Policy</a>
				</p><!-- .footer-copyright -->

			</footer><!-- #site-footer -->

		</div><!-- .container -->

		<?php wp_footer(); ?>

	</body>
</html>
