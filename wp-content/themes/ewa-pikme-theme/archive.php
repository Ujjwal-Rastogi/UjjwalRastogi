<?php
/**
 * The template for displaying archive pages
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
			<?php if ( have_posts() ) : ?>
				
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>

			<?php endif; ?>

			<?php if ( function_exists('yoast_breadcrumb') ) 
			{yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
		</div>
	</div> <!-- end of .container -->
</div> <!-- end of .mend-breadcumbs -->
	
<div class="container archive-container">
	<div class="grid">

		<div id="primary" class="content-area col-sm-8">
			<main id="main" class="site-main">

			<?php if ( have_posts() ) : ?>

				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_type() );

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
