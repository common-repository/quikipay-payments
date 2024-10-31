<?php

register_activation_hook( __FILE__, 'qpwc_quikipay_plugin_activation' );

function qpwc_quikipay_plugin_activation() {
    if ( ! get_option( 'quikipay_flush_rewrite_rules_flag' ) ) {
        add_option( 'quikipay_flush_rewrite_rules_flag', true );
    }
}


add_action( 'init', 'qpwc_quikipay_flush_rewrite_rules_check', 20 );
/**
 * Flush rewrite rules if the previously added flag exists,
 * and then remove the flag.
 */
function qpwc_quikipay_flush_rewrite_rules_check() {
    if ( get_option( 'quikipay_flush_rewrite_rules_flag' ) ) {
        flush_rewrite_rules();
        delete_option( 'quikipay_flush_rewrite_rules_flag' );
    }
}