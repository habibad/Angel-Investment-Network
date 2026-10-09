<?php
/**
 * Custom Route & URL Rewrite Management
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register query vars for custom routes
 */
function angel_register_query_vars( $vars ) {
    $vars[] = 'angel_opportunity';
    $vars[] = 'angel_investor';
    $vars[] = 'angel_virtual_legal_page';
    return $vars;
}
add_filter( 'query_vars', 'angel_register_query_vars' );

/**
 * Register rewrite rules for marketplace & legal routes
 */
function angel_add_rewrite_rules() {
    add_rewrite_rule( '^opportunity/([^/]+)/?$', 'index.php?angel_opportunity=$matches[1]', 'top' );
    add_rewrite_rule( '^investor/([^/]+)/?$', 'index.php?angel_investor=$matches[1]', 'top' );
    add_rewrite_rule( '^opportunities/?$', 'index.php?pagename=invest', 'top' );
    add_rewrite_rule( '^blog/([^/]+)/?$', 'index.php?name=$matches[1]', 'top' );
    add_rewrite_rule( '^insights/?$', 'index.php?pagename=blog', 'top' );

    // Legal & Core Page Rewrites
    add_rewrite_rule( '^privacy-policy/?$', 'index.php?pagename=privacy-policy', 'top' );
    add_rewrite_rule( '^terms-and-conditions/?$', 'index.php?pagename=terms-and-conditions', 'top' );
    add_rewrite_rule( '^terms-of-service/?$', 'index.php?pagename=terms-and-conditions', 'top' );
    add_rewrite_rule( '^risk-disclosure/?$', 'index.php?pagename=risk-disclosure', 'top' );
    add_rewrite_rule( '^about-us/?$', 'index.php?pagename=about-us', 'top' );
    add_rewrite_rule( '^faq/?$', 'index.php?pagename=faq', 'top' );
    add_rewrite_rule( '^faqs/?$', 'index.php?pagename=faq', 'top' );
}
add_action( 'init', 'angel_add_rewrite_rules' );

/**
 * Intercept template hierarchy to load dedicated templates and prevent 404s
 */
function angel_template_router( $template ) {
    global $wp_query;

    $opp_slug = get_query_var( 'angel_opportunity' );
    if ( ! empty( $opp_slug ) ) {
        $custom_template = locate_template( [ 'single-opportunity.php' ] );
        if ( ! empty( $custom_template ) ) {
            return $custom_template;
        }
    }

    $inv_id = get_query_var( 'angel_investor' );
    $cin_page = get_query_var( 'cin_auth_page' );
    $portal_slugs = [ 'profile', 'dashboard', 'saved-opportunities', 'enquiries', 'connections', 'messages' ];
    if ( ! empty( $inv_id ) && ! in_array( $inv_id, $portal_slugs, true ) && empty( $cin_page ) ) {
        // Also ensure request path is not an investor portal route
        $check_path = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
        $site_sub   = trim( parse_url( home_url(), PHP_URL_PATH ), '/' );
        if ( ! empty( $site_sub ) && 0 === strpos( $check_path, $site_sub ) ) {
            $check_path = trim( substr( $check_path, strlen( $site_sub ) ), '/' );
        }
        if ( 0 !== strpos( $check_path, 'investor/' ) && 0 !== strpos( $check_path, 'dashboard/investor' ) ) {
            $custom_template = locate_template( [ 'single-investor.php' ] );
            if ( ! empty( $custom_template ) ) {
                return $custom_template;
            }
        }
    }

    // Determine current request path
    $request_uri = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
    $path = trim( parse_url( $request_uri, PHP_URL_PATH ), '/' );
    // Strip subfolder if WP is installed in subfolder
    $site_path = trim( parse_url( home_url(), PHP_URL_PATH ), '/' );
    if ( ! empty( $site_path ) && 0 === strpos( $path, $site_path ) ) {
        $path = trim( substr( $path, strlen( $site_path ) ), '/' );
    }

    // 1. Privacy Policy Router & 404 Fallback
    if ( 'privacy-policy' === $path || is_page( 'privacy-policy' ) ) {
        if ( is_404() ) {
            $wp_query->is_404 = false;
            $wp_query->is_page = true;
            status_header( 200 );
        }
        $tpl = locate_template( [ 'page-privacy-policy.php', 'page.php' ] );
        if ( ! empty( $tpl ) ) {
            return $tpl;
        }
    }

    // 2. Terms of Service / Terms and Conditions Router & 404 Fallback
    if ( 'terms-and-conditions' === $path || 'terms-of-service' === $path || is_page( 'terms-and-conditions' ) || is_page( 'terms-of-service' ) ) {
        if ( is_404() ) {
            $wp_query->is_404 = false;
            $wp_query->is_page = true;
            status_header( 200 );
        }
        $tpl = locate_template( [ 'page-terms-of-service.php', 'page-terms-and-conditions.php', 'page.php' ] );
        if ( ! empty( $tpl ) ) {
            return $tpl;
        }
    }

    // 3. Risk Disclosure Router & 404 Fallback
    if ( 'risk-disclosure' === $path || is_page( 'risk-disclosure' ) ) {
        if ( is_404() ) {
            $wp_query->is_404 = false;
            $wp_query->is_page = true;
            status_header( 200 );
        }
        $tpl = locate_template( [ 'page-risk-disclosure.php', 'page.php' ] );
        if ( ! empty( $tpl ) ) {
            return $tpl;
        }
    }

    // 4. About Us Router & Template mapping
    if ( 'about-us' === $path || 'about' === $path || is_page( 'about-us' ) || is_page( 'about' ) ) {
        if ( is_404() ) {
            $wp_query->is_404 = false;
            $wp_query->is_page = true;
            status_header( 200 );
        }
        $tpl = locate_template( [ 'page-about-us.php', 'page-about.php', 'page.php' ] );
        if ( ! empty( $tpl ) ) {
            return $tpl;
        }
    }

    // 5. Frequently Asked Questions (FAQ) Router & Template mapping
    if ( 'faq' === $path || 'faqs' === $path || is_page( 'faq' ) || is_page( 'faqs' ) ) {
        if ( is_404() ) {
            $wp_query->is_404 = false;
            $wp_query->is_page = true;
            status_header( 200 );
        }
        $tpl = locate_template( [ 'page-faq.php', 'page.php' ] );
        if ( ! empty( $tpl ) ) {
            return $tpl;
        }
    }

    return $template;
}
add_filter( 'template_include', 'angel_template_router', 99 );
