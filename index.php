<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blackpearl
 *
 * All the model photos on the website are a courtesy of the photographer Angelika Kitsuk, free to contact at kitsukandco@mail.ru
 */

get_header(); ?>

<?php $options=get_option( 'ek_options_settings' ); ?>
  <!-- Calling the custom color option to change the background color in the content area on the Home page-->
    <style>
        div#content.site-content {
	       background-color: <?php echo $options['ek_color_field']; ?>
        }
    </style>
  <!-- Home page will display the color assigned to the value $options -->


	<?php $options=get_option( 'ek_options_settings' ); ?>
		<!-- Calling the custom font option to change the font on the Home page-->
			<style>
				.site-title {
					font-family: <?php echo $options['ek_font_field']; ?>
					}
			</style>
   <!-- Website title will have the font assigned to the value $options -->


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">


		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
