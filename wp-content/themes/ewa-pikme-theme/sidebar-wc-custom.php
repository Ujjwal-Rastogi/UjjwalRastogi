<?php
/**
 * The sidebar containing the woocommerce widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ewa-pikme-theme
 */

if ( ! is_active_sidebar( 'sidebar-wc-custom' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area col-sm-4">
	<?php dynamic_sidebar('sidebar-wc-custom'); ?>
</aside><!-- #secondary -->