<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ewa-pikme-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div class="grid align-center mb-25">
		<div class="col-xs-12 col-sm-5">
			<?php ewa_pikme_theme_post_thumbnail(); ?>
		</div><!-- .col-xs-12 .col-sm-4 -->

		<div class="col-xs-12 col-sm-7">

			<header class="entry-header">
				<?php

				if ( 'post' === get_post_type() ) :
					?>
					<div class="entry-meta">
						<?php
						ewa_pikme_theme_posted_on();
						ewa_pikme_theme_posted_by();
						ewa_pikme_theme_categories();
						?>
					</div><!-- .entry-meta -->
				<?php endif;

				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

				?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php

				if ( ! is_archive() ) :
					/* If it is an archive page this is hidden */
					the_excerpt( sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'ewa-pikme-theme' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					) );
					
				endif;


				echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark" class="blog__link">' . esc_html__( 'Read More', 'ewa-pikme-theme' ) . '</a>';


				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ewa-pikme-theme' ),
					'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->


		    <footer class="entry-footer">
				<?php 
				ewa_pikme_theme_entry_footer(); 
				?>
			</footer><!-- .entry-footer -->

		</div><!-- .col-xs-12 .col-sm-8 -->
	</div><!-- .grid -->


</article><!-- #post-<?php the_ID(); ?> -->
