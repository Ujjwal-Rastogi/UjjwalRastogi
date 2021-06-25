<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ewa-pikme-theme
 */

get_header();
?>

<?php if ( ! is_front_page() ) : ?>
<div class="mend-breadcumbs">
	<div class="container">
		<div class="mend-breadcumbs__inner">
			<h1 class="page-title"><?php esc_html_e( 'Our Blog', 'ewa-pikme-theme' ); ?></h1>

			<?php if ( function_exists('yoast_breadcrumb') ) 
			{yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
		</div>
	</div> <!-- end of .container -->
</div> <!-- end of .mend-breadcumbs -->
<?php endif; ?>

<div class="container blog-container">
	<div class="grid">

		<div id="primary" class="content-area col-sm-8">
			<main id="main" class="site-main">

			<?php
			if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) :
					?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
					<?php
				endif;

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
