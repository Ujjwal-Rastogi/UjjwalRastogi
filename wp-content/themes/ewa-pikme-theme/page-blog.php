<?php
/**
 * Template Name: Blog Template
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ewa-pikme-theme
 */

get_header();
?>

<div class="mend-breadcumbs">
	<div class="container">
		<div class="mend-breadcumbs__inner">
			<?php
				while( have_posts() ) :
					the_post();
					the_title( '<h1 class="page-title">', '</h1>' );
				endwhile; // End of the loop.
			?>

			<?php if ( function_exists('yoast_breadcrumb') ) 
			{yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
		</div>
	</div> <!-- end of .container -->
</div> <!-- end of .mend-breadcumbs -->

<?php query_posts('post_type=post&post_status=publish&posts_per_page=10&paged=' . get_query_var('paged')); ?>
<div class="container blog-container">
	<div class="grid">

		<div id="primary" class="content-area col-sm-8">
			<main id="main" class="site-main">

			<?php
                if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'blog' );

				endwhile;

				ewa_pikme_theme_numeric_posts_nav();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>

	</div><!-- .grid -->
</div><!-- .container -->

<?php
get_footer();