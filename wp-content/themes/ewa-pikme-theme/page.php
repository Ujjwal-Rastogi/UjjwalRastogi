<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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

<div class="container page-container">
	<div class="grid">

		<div id="primary" class="content-area col-sm-8">
			<main id="main" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

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
			// if woocommerce is activated and if it is Cart or Checkout page then loads different sidebar.
			if ( class_exists( 'WooCommerce' ) ) {
				if ( is_cart() || is_checkout() ) {
					get_sidebar('wc-custom'); 
				} else {
					get_sidebar();
				}
			} else {
				get_sidebar();
			}
		?>

	</div><!-- .grid -->
</div><!-- .container -->

<?php
get_footer();
