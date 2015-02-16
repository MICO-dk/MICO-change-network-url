<?php
/*
Plugin Name: MICO change network URL
Description: Changes the network admin url, which allows installing Wordpress in a separate directory while using Mutisite.
Version: 1.0
Author: Malthe Milthers
Author URI: http://www.mico.dk
*/

add_filter( 'network_site_url', 'mico_change_network_url', 9, 3);

function mico_change_network_url($url, $path, $scheme) {
    
	if ( ! is_multisite() )
		return site_url($path, $scheme);

	$current_site = get_current_site();

	if ( 'relative' == $scheme )
		$url = $current_site->path;
	else
		$url = set_url_scheme( 'http://' . $current_site->domain . '/wp' . $current_site->path, $scheme );

	if ( $path && is_string( $path ) )
		$url .= ltrim( $path, '/' );


    return $url;
}
