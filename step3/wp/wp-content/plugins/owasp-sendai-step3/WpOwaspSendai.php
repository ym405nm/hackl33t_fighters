<?php
/*
Plugin Name: OWASP SENDAI CHECKER
Plugin URI: https://github.com/ym405nm/
Description: OWASP SENDAI 検証用
Author: yoshinori matsumoto
Version: 0.1
Author URI: https://twitter.com/ym405nm
*/

function owasp_sendai_menu_page() {
    add_menu_page(
        'ファイルアップローダー',
        'ファイルアップローダー',
        'manage_options',
        __FILE__,
        'os',
        '', # image
        99
    );
}
function os(){
    echo file_get_contents(WP_PLUGIN_DIR . '/owasp-sendai-step3/template.html');
}
add_action( 'admin_menu', 'owasp_sendai_menu_page' );