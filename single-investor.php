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

wp_safe_redirect( home_url( '/invest/#eligibility' ), 301 );
exit;
