<?php
/**
 * Security, Hardening & Defensive Headers
 *
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Add security headers to HTTP response
 */
function angel_add_security_headers() {
    if ( ! is_admin() ) {
        header( 'X-Content-Type-Options: nosniff' );
        header( 'X-Frame-Options: SAMEORIGIN' );
        header( 'X-XSS-Protection: 1; mode=block' );
        header( 'Referrer-Policy: strict-origin-when-cross-origin' );
    }
}
add_action( 'send_headers', 'angel_add_security_headers' );

/**
 * Remove generator and unnecessary discovery headers from <head>
 */
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );

/**
 * Prevent user enumeration via ?author=N scanning
 */
function angel_block_user_enumeration() {
    if ( ! is_admin() && isset( $_REQUEST['author'] ) && ! empty( $_REQUEST['author'] ) ) {
        wp_safe_redirect( home_url(), 301 );
        exit;
    }
}
add_action( 'init', 'angel_block_user_enumeration' );
