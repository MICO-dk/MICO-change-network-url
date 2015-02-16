<?php
/*
Plugin Name: MICO change network URL
Description: Changes the network admin url, which allows installing Wordpress in a separate directory while using Mutisite.
Version: 1.0
Author: Malthe Milthers
Author URI: http://www.mico.dk
*/

add_filter( 'network_admin_url', 'mico_change_network_url', 999, 2);

function mico_change_network_url($url, $scheme) {
    return network_site_url('wp/wp-admin/network/', $scheme);
}

?>