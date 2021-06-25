<?php
/**
 * Template part for displaying results in search pages
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
				<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php
							ewa_pikme_theme_posted_on();
							ewa_pikme_theme_posted_by();
							ewa_pikme_theme_categories();
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

				<?php
					echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark" class="blog__link">' . esc_html__( 'Read More', 'ewa-pikme-theme' ) . '</a>';
				?>

			</header><!-- .entry-header -->
			<footer class="entry-footer">
				<?php ewa_pikme_theme_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div>
	</div>


	


	
</article><!-- #post-<?php the_ID(); ?> -->
