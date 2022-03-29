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

<!-- Custom social media holder using theme mods to display unique URL + link heading -->
	<footer id="colophon" class="site-footer">
		<h1>Stay In Touch!</h1>
		<div class="social-holder">
			<div class="social-media-entry">
				<i class="fab fa-etsy"></i>
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

		<div class="excerpt-container">
			<h3 class="excerpt-containerTitle">Upcoming Workshops</h3>

		<?php

		// Arguments array for the custom query
		$event_args = array(
			'post_type'      => array('rol_event'),
			'post_status'    => 'publish',
			'posts_per_page' => 3
		);

		// Creating a new query
		$event_query = new WP_Query( $event_args );

		if ( $event_query->have_posts() ) {
			while ( $event_query->have_posts() ) {
				$event_query->the_post();

				?>
				<!-- Simple HTML structure to contain our excerpt info -->
				<div class="excerpt-holder"> 
					<div class="excerpt-textHolder">
						<?php 
						?>
						<a href="<?php the_permalink(); ?>"><?php the_title( '<h3>', '</h3>' ); ?></a>
						<?php
						the_excerpt();
						?>
					</div>
					<div class="excerpt-imageHolder">
						<?php the_post_thumbnail(); ?>
					</div>
				</div> 
				
				<?php
			}

			wp_reset_postdata();
		}

		?>
		</div>

		<section class="bottom-footer">
			<p>Ray of Light Glasswork &copy;, All Rights Reserved, 2022</p>
		</section>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
