<?php

add_filter( 'network_admin_url', 'mico_change_network_url', 999, 2);

function mico_change_network_url($url, $scheme) {
    return network_site_url('wp/wp-admin/network/', $scheme);
}

?>