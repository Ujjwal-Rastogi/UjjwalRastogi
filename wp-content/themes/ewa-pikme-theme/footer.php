<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ewa-pikme-theme
 */

?>

	</div><!-- #content -->
	
	<footer id="site-footer" class="site-footer">

		<div class="container"> <!-- .container -->
			<div class="grid align-center"> <!-- .grid -->
				<div class="col-xs-6">
					<!-- IMPORTANT: YOU ARE NOT ALLOWED TO REMOVE 'ESSENTIAL WEB APPS' CREDIT FORM THE FOOTER. IT IS IS AGAINST OUR COPYRIGHT POLICY -->
					<p class="copyright">
						<?php
							if($copyright_text = pikmewp_option('footer-copyright')) :
								echo do_shortcode(wp_kses($copyright_text, mend_allowed_tags()));
								esc_html_e(' Theme by ', 'ewa-pikme-theme'); 
								print '<a href="https://essentialwebapps.com/" target="_blank" >Essential Web Apps</a>';					
							else : 
								esc_html_e('Copyright &copy;', 'ewa-pikme-theme');
								print ' ' . date('Y') . ' ';
								print bloginfo( 'name' ) . '.';
								esc_html_e(' Theme by ', 'ewa-pikme-theme'); 
								print '<a href="https://essentialwebapps.com/" target="_blank" >Essential Web Apps</a>';						
							endif;
						?>
					</p>
				</div>
				<div class="col-xs-6">
					<div class="footer-icon">
						<?php
							if($footer_facebook = pikmewp_option('footer-facebook')){
						?>
								<a href="<?php echo esc_url($footer_facebook);?>"><i class="fab fa-facebook-f"></i></a>
						<?php
							}
						?>

						<?php
							if($footer_twitter = pikmewp_option('footer-twitter')){
						?>
								<a href="<?php echo esc_url($footer_twitter);?>"><i class="fab fa-twitter"></i></a>
						<?php
							}
						?>

						<?php
							if($footer_instagram = pikmewp_option('footer-instagram')){
						?>
								<a href="<?php echo esc_url($footer_instagram);?>"><i class="fab fa-instagram"></i></a>
						<?php
							}
						?>

						<?php
							if($footer_linkedin = pikmewp_option('footer-linkedin')){
						?>
								<a href="<?php echo esc_url($footer_linkedin);?>"><i class="fab fa-linkedin-in"></i></a>
						<?php
							}
						?>
					</div>
				</div>
			</div>						
		</div><!-- .container -->					
	</footer><!-- #site-footer -->
</div><!-- #page -->


<!-- Return to Top -->
<a href="javascript:" id="return-to-top"><span class="icon-up-open-big"></span></a>

<?php wp_footer(); ?>

</body>
</html>
