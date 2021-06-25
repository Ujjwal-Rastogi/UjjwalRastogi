<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ewa-pikme-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header class="site-header">
		<div class="container">
			<div class="grid">
				<div class="col-md-12 site-header__display">
					<div class="site-header__logo">
					<?php 
							// get the default logo fromt theme folder
							$header_logo_default = get_template_directory_uri() . '/assets/images/logo.png';


							// get the logo from theme option
							if(pikmewp_option('header-logo') != '') :

							$header_logo_option = pikmewp_option('header-logo', false);
                                if (is_array($header_logo_option)) {
                                    $header_logo_option_url = $header_logo_option['url'];
                                } else {
                                    $header_logo_option_url = $header_logo_option;
								}

							endif; 

							// assign the logo from either theme folder or theme option
							$header_logo = $header_logo_option_url ? $header_logo_option_url : $header_logo_default;

							// get site title
							$site_title = get_bloginfo( 'name' );
							// get site description
							$site_description = get_bloginfo( 'description' );
							// logo alternate text
							$logo_alternate_text = $site_title . ' ' . $site_description;


							// get the logo from either customizer or from theme folder or theme option
							if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
							 		the_custom_logo();
							} else { ?>
									<a href="<?php echo site_url(); ?>">
										<img class="site-header__logo" src="<?php echo esc_url($header_logo); ?>" alt="<?php echo $logo_alternate_text; ?>">
									</a>
							<?php } ?>
					</div>
					<div class="site-header__menu">
						<a href="#navopen" class="site-header__hamburger-icon nav-close" ><span class="screen-reader-text"><?php esc_html__( 'Open Navbar', 'ewa-pikme-theme') ?></span></a>	
						<div class="site-header__nav-container mobile-hide">
							<div class="site-header__nav-inner">	
								<nav class="site-header__nav">
									<?php
									wp_nav_menu( array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
									'container' 	  => '',
									) );
									?>
								</nav>
							</div><!-- end of .site-header__nav-inner -->
						</div><!-- end of .site-header__nav-container  -->
					</div>
				</div>
			</div>
		</div>
	</header>
	<div id="content" class="site-content">