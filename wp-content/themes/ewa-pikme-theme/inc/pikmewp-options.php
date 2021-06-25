<?php
/**
 * @package ewa-pikme-theme
 */
 
if ( ! function_exists('pikmewp_option') ) {
	function pikmewp_option($id, $fallback = false, $param = false ) {
		global $pikmewp_options;
		if ( $fallback == false ) $fallback = '';
		$output = ( isset($pikmewp_options[$id]) && $pikmewp_options[$id] !== '' ) ? $pikmewp_options[$id] : $fallback;
		if ( !empty($pikmewp_options[$id]) && $param ) {
			$output = $pikmewp_options[$id][$param];
		}
		return $output;
	}
}
