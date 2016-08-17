<?php
/**
 * Template Name: Portfolio
 *
 * @package blackpearl
 */
 get_header(); ?>
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
 <h2>Latest PhotoShoots</h2>
 <?php
			$args = array('showposts' => 4, 'category_name' => 'images');
				$my_query = new WP_Query($args);
				?>
				<?php
				if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
				?>
				<div class="homecustompost">
				<?php
				if ( has_post_thumbnail()){ the_post_thumbnail(); }
					?>
				</div>
				<?php endwhile; endif; wp_reset_query(); ?>
<?php
get_sidebar();
get_footer();
