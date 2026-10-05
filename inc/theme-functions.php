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

/**
 * Returns structured General FAQs for Cuba Investment Network
 */
function angel_get_faqs() {
    return [
        [
            'q' => __( 'What is Cuba Investment Network?', 'angel-network' ),
            'a' => __( 'Cuba Investment Network is an online platform that connects Cuban business owners seeking capital, expertise, or strategic partnerships with investors interested in exploring opportunities related to Cuba’s private sector. The platform facilitates introductions but does not act as an investment adviser, broker, or party to any transaction.', 'angel-network' ),
        ],
        [
            'q' => __( 'Who can join the network?', 'angel-network' ),
            'a' => __( 'The network is open to Cuban business owners with legitimate operating businesses or well-developed projects, as well as individual investors, angel investors, family offices, companies, and strategic partners interested in evaluating Cuba-related opportunities. Registration may be subject to an initial profile review.', 'angel-network' ),
        ],
        [
            'q' => __( 'How does the platform work?', 'angel-network' ),
            'a' => __( 'Business owners submit information about their company, operations, capital requirements, and growth plans. After an initial review, eligible opportunities may be published on the platform. Interested investors can review the available information and request a direct introduction to the business owner.', 'angel-network' ),
        ],
        [
            'q' => __( 'Is it free to use the Cuba Investment Network?', 'angel-network' ),
            'a' => __( 'Registration and participation are free during the platform’s launch phase. If paid services are introduced in the future, the applicable prices and conditions will be clearly communicated before a user chooses to purchase them. Cuba Investment Network does not currently charge commissions or success fees on investments completed between users.', 'angel-network' ),
        ],
        [
            'q' => __( 'Does Cuba Investment Network verify or recommend investment opportunities?', 'angel-network' ),
            'a' => __( 'The platform may conduct an initial review of submitted information before publishing a listing. However, this review is not a financial audit, legal verification, valuation, endorsement, or recommendation. Investors must conduct their own independent financial, legal, tax, sanctions, operational, and commercial due diligence before making any commitment.', 'angel-network' ),
        ],
        [
            'q' => __( 'What happens after an investor and business owner connect?', 'angel-network' ),
            'a' => __( 'The parties communicate directly and independently decide whether to continue discussions. Any negotiations, due diligence, professional advice, agreements, transfer of funds, and investment terms take place outside the platform and remain the responsibility of the investor and business owner. Cuba Investment Network does not hold investment funds or guarantee that a connection will result in financing.', 'angel-network' ),
        ],
    ];
}
