<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blackpearl
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'blackpearl' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'blackpearl' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'blackpearl' ), 'blackpearl', '<a href="http://underscores.me/" rel="designer">Ekaterina Kiseleva</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php $options=get_option( 'ek_options_settings' ); ?>
    <!-- Custom style from options page -->
    <style>
        div.site-info {
	       background-color: <?php echo $options['ek_color_field']; ?>
        }
    </style>

<?php wp_footer(); ?>

</body>
</html>
