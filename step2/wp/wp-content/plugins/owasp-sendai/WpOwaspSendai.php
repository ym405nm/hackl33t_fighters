<?php
/*
Plugin Name: OWASP SENDAI CHECKER
Plugin URI: https://github.com/ym405nm/
Description: OWASP SENDAI 検証用
Author: yoshinori matsumoto
Version: 0.1
Author URI: https://twitter.com/ym405nm
*/
add_filter('rest_pre_dispatch', 'get_rest_api', 10, 3);
function get_rest_api($result, $wp_rest_server, $request)
{
    $namespaces = $request->get_route();
    if (strpos($namespaces, 'wp/v2/posts/') === 1) {
        $request_body = $request->get_body();
        $request_arr = json_decode($request_body);
        if(!array_key_exists('title', $request_arr) || !array_key_exists('content', $request_arr)){
            return $request;
        }
        $blog_version  = get_bloginfo('version');
        $vuln_versions = array(
            "4.7",
            "4.7.1"
        );
        if (in_array($blog_version, $vuln_versions)) {
            $title = 'FLAG GET';
            $post  = array(
                'post_content' => '{sendai:curry_ha_nomimono!}',
                'post_name'    => 'wp-sorry',
                'post_title'   => $title,
                'post_status'  => 'publish'
            );
            wp_insert_post($post);
        }
        return $result;
    }
}