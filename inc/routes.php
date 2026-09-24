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
    return $vars;
}
add_filter( 'query_vars', 'angel_register_query_vars' );

/**
 * Register rewrite rules for marketplace routes
 */
function angel_add_rewrite_rules() {
    add_rewrite_rule( '^opportunity/([^/]+)/?$', 'index.php?angel_opportunity=$matches[1]', 'top' );
    add_rewrite_rule( '^investor/([^/]+)/?$', 'index.php?angel_investor=$matches[1]', 'top' );
    add_rewrite_rule( '^opportunities/?$', 'index.php?pagename=invest', 'top' );
}
add_action( 'init', 'angel_add_rewrite_rules' );

/**
 * Intercept template hierarchy to load dedicated templates
 */
function angel_template_router( $template ) {
    $opp_slug = get_query_var( 'angel_opportunity' );
    if ( ! empty( $opp_slug ) ) {
        $custom_template = locate_template( [ 'single-opportunity.php' ] );
        if ( ! empty( $custom_template ) ) {
            return $custom_template;
        }
    }

    $inv_id = get_query_var( 'angel_investor' );
    if ( ! empty( $inv_id ) ) {
        $custom_template = locate_template( [ 'single-investor.php' ] );
        if ( ! empty( $custom_template ) ) {
            return $custom_template;
        }
    }

    return $template;
}
add_filter( 'template_include', 'angel_template_router', 99 );
