<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
					if ( is_singular() ) :
						the_title( '<h1 class="page-title">', '</h1>' );
					endif;
				endwhile; // End of the loop.
			?>

			<?php if ( function_exists('yoast_breadcrumb') ) 
			{yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
		</div>
	</div> <!-- end of .container -->
</div> <!-- end of .mend-breadcumbs -->


<div class="container post-container">
	<div class="grid">
		<div id="primary" class="content-area col-sm-8">
			<main id="main" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'single' );

				the_post_navigation();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>

	</div><!-- .grid -->
</div><!-- .container -->

<?php
get_footer();
