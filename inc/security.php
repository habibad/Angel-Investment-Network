<?php
/**
 * Security, Hardening & Defensive Headers
 *
 * @package InvestmentNetwork
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

/**
 * Add SEO robots tag: noindex demo opportunity pages, search, and 404 (PDF Page 33 & 38)
 */
function angel_seo_robots() {
    if ( is_search() || is_404() || get_query_var( 'angel_opportunity' ) || get_query_var( 'angel_investor' ) ) {
        echo '<meta name="robots" content="noindex, nofollow" />' . "\n";
    } else {
        echo '<meta name="robots" content="index, follow" />' . "\n";
    }
}
add_action( 'wp_head', 'angel_seo_robots', 1 );

/**
 * Add canonical and basic social metadata (PDF Page 38)
 */
function angel_seo_meta_tags() {
    if ( is_singular() ) {
        $canonical = get_permalink();
    } elseif ( is_home() || is_front_page() ) {
        $canonical = home_url( '/' );
    } else {
        $canonical = home_url( add_query_arg( [], $GLOBALS['wp']->request ?? '' ) );
    }

    if ( ! empty( $canonical ) ) {
        echo '<link rel="canonical" href="' . esc_url( $canonical ) . '" />' . "\n";
    }

    $site_name = 'Investment Network Cuba';
    $title     = wp_get_document_title();
    $desc      = 'A platform connecting investors with Cuban business owners seeking capital, expertise, and international partnerships.';

    echo '<meta property="og:site_name" content="' . esc_attr( $site_name ) . '" />' . "\n";
    echo '<meta property="og:title" content="' . esc_attr( $title ) . '" />' . "\n";
    echo '<meta property="og:description" content="' . esc_attr( $desc ) . '" />' . "\n";
    echo '<meta property="og:type" content="website" />' . "\n";
    if ( ! empty( $canonical ) ) {
        echo '<meta property="og:url" content="' . esc_url( $canonical ) . '" />' . "\n";
    }
}
add_action( 'wp_head', 'angel_seo_meta_tags', 2 );
