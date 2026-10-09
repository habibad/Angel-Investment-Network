<?php
/**
 * Single Investor Profile Handler
 * Fictional investor profiles (Christina S., Hugo A., Kaushal P.) removed per PDF Pages 28–30.
 * Redirects to the Investor Eligibility section.
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$inv_id = get_query_var( 'angel_investor' );
$cin_page = get_query_var( 'cin_auth_page' );
$req_path = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
$site_sub = trim( parse_url( home_url(), PHP_URL_PATH ), '/' );
if ( ! empty( $site_sub ) && 0 === strpos( $req_path, $site_sub ) ) {
    $req_path = trim( substr( $req_path, strlen( $site_sub ) ), '/' );
}

$portal_slugs = [ 'profile', 'dashboard', 'saved-opportunities', 'enquiries', 'connections', 'messages' ];
if ( in_array( $inv_id, $portal_slugs, true ) || ! empty( $cin_page ) || 0 === strpos( $req_path, 'investor/' ) || 0 === strpos( $req_path, 'dashboard/investor' ) ) {
    return;
}

wp_safe_redirect( home_url( '/invest/#eligibility' ), 301 );
exit;
