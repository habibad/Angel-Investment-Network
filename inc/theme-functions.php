<?php
/**
 * Theme Helper & Formatting Functions
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Format currency amounts with proper currency symbol (neutral, not hardcoded to CA$)
 */
function angel_format_currency( $amount, $currency = 'USD', $short = false ) {
    $currency = strtoupper( trim( $currency ) );
    
    switch ( $currency ) {
        case 'EUR':
            $symbol = '€';
            break;
        case 'CAD':
            $symbol = 'CA$';
            break;
        case 'CUP':
            $symbol = 'CUP $';
            break;
        case 'USD':
        default:
            $symbol = '$';
            break;
    }
    
    if ( $short && $amount >= 1000000 ) {
        return $symbol . round( $amount / 1000000, 1 ) . 'M ' . $currency;
    } elseif ( $short && $amount >= 1000 ) {
        return $symbol . round( $amount / 1000, 0 ) . 'K ' . $currency;
    }
    
    return $symbol . number_format( (float) $amount, 0, '.', ',' ) . ' ' . $currency;
}

/**
 * Calculate funding completion percentage
 */
function angel_calc_percentage( $raised, $target ) {
    if ( empty( $target ) || $target <= 0 ) {
        return 0;
    }
    $pct = round( ( $raised / $target ) * 100 );
    return min( 100, max( 0, $pct ) );
}

/**
 * Return CSS badge class for a venture stage
 */
function angel_get_stage_badge_class( $stage ) {
    $normalized = strtolower( trim( $stage ) );
    
    if ( strpos( $normalized, 'pre-seed' ) !== false ) {
        return 'badge-primary';
    } elseif ( strpos( $normalized, 'seed' ) !== false ) {
        return 'badge-accent';
    } elseif ( strpos( $normalized, 'series a' ) !== false || strpos( $normalized, 'growth' ) !== false ) {
        return 'badge-gold';
    }
    
    return 'badge-slate';
}

/**
 * Estimate article reading time in minutes
 */
function angel_estimate_reading_time( $content ) {
    $word_count = str_word_count( strip_tags( $content ) );
    $minutes = ceil( $word_count / 200 );
    return max( 1, $minutes );
}
