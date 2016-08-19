<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blackpearl
 *
 * All the model photos on the website are a courtesy of the photographer Angelika Kitsuk, free to contact at kitsukandco@mail.ru
 */

get_header(); ?> <!-- Calling the sidebar to appear on pages. -->
<div class="sidebar">
<?php if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
</div>


<?php $options=get_option( 'ek_options_settings' ); ?>
  <!-- Calling the custom color option to change the background color in the content area on pages-->
    <style>
        div#content.site-content {
	       background-color: <?php echo $options['ek_color_field']; ?>
        }
    </style>
  <!-- Pages will display the color assigned to the value $options -->


<?php $options=get_option( 'ek_options_settings' ); ?>
	<!-- Calling the custom font option to change the font of the Website title on pages-->
		<style>
			.site-title {
				font-family: <?php echo $options['ek_font_field']; ?>
			}
		</style>
	<!-- Website title will have the font assigned to the value $options -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
