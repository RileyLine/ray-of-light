<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ray_of_Light
 */

?>

	<footer id="colophon" class="site-footer">
		<h1>Stay In Touch!</h1>
		<div class="social-holder">
			<div class="social-media-entry">
				<i class="fab fa-etsy"></i>
				<!-- <p>Etsy</p> -->
				<a class="social-media-link" target="_BLANK" href="<?php echo get_theme_mod('rol_etsy_url') ?>"> <?php echo get_theme_mod('rol_etsy_title') ?></a>
			</div>
			<div class="social-media-entry">
				<i class="fab fa-facebook"></i>
				<a class="social-media-link" target="_BLANK" href="<?php echo get_theme_mod('rol_facebook_url') ?>"> <?php echo get_theme_mod('rol_facebook_title') ?></a>
			</div>
			<div class="social-media-entry">
				<i class="fab fa-instagram"></i>
				<a class="social-media-link" target="_BLANK" href="<?php echo get_theme_mod('rol_insta_url') ?>"> <?php echo get_theme_mod('rol_insta_title') ?></a>
			</div>
		</div>
		<section class="bottom-footer">
			<p>Ray of Light Glasswork &copy;, All Rights Reserved, 2022</p>
		</section>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
