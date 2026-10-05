<?php
/**
 * Enqueue scripts and styles
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Preconnect to Google Fonts for performance optimization
 */
function angel_preconnect_fonts( $urls, $relation_type ) {
    if ( 'preconnect' === $relation_type ) {
        $urls[] = [
            'href'        => 'https://fonts.googleapis.com',
            'crossorigin' => false,
        ];
        $urls[] = [
            'href'        => 'https://fonts.gstatic.com',
            'crossorigin' => 'anonymous',
        ];
    }
    return $urls;
}
add_filter( 'wp_resource_hints', 'angel_preconnect_fonts', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function angel_scripts() {
    $theme_version = wp_get_theme()->get( 'Version' );
    $is_https      = is_ssl() || ( ! empty( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && 'https' === strtolower( sanitize_text_field( wp_unslash( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) ) ) );
    $scheme        = $is_https ? 'https' : null;

    // Enqueue Google Fonts (Plus Jakarta Sans & Inter)
    wp_enqueue_style(
        'angel-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap',
        [],
        null
    );

    $theme_dir = get_template_directory();

    // Dynamic filemtime versioning to prevent browser/CDN caching issues on live updates
    $tailwind_path = $theme_dir . '/assets/css/tailwind.css';
    $tailwind_ver  = file_exists( $tailwind_path ) ? filemtime( $tailwind_path ) : $theme_version;

    $style_path    = get_stylesheet_directory() . '/style.css';
    $style_ver     = file_exists( $style_path ) ? filemtime( $style_path ) : $theme_version;

    $nav_path      = $theme_dir . '/assets/js/navigation.js';
    $nav_ver       = file_exists( $nav_path ) ? filemtime( $nav_path ) : $theme_version;

    $modal_path    = $theme_dir . '/assets/js/modal.js';
    $modal_ver     = file_exists( $modal_path ) ? filemtime( $modal_path ) : $theme_version;

    $filter_path   = $theme_dir . '/assets/js/filter-engine.js';
    $filter_ver    = file_exists( $filter_path ) ? filemtime( $filter_path ) : $theme_version;

    $main_path     = $theme_dir . '/assets/js/main.js';
    $main_ver      = file_exists( $main_path ) ? filemtime( $main_path ) : $theme_version;

    // Enqueue Compiled Tailwind CSS
    wp_enqueue_style(
        'angel-tailwind',
        set_url_scheme( get_template_directory_uri() . '/assets/css/tailwind.css', $scheme ),
        [],
        $tailwind_ver
    );

    // Enqueue Theme Style.css
    wp_enqueue_style(
        'angel-style',
        set_url_scheme( get_stylesheet_uri(), $scheme ),
        [ 'angel-tailwind' ],
        $style_ver
    );

    // Enqueue Navigation Script
    wp_enqueue_script(
        'angel-navigation',
        set_url_scheme( get_template_directory_uri() . '/assets/js/navigation.js', $scheme ),
        [],
        $nav_ver,
        true
    );

    // Enqueue Modal Controller Script
    wp_enqueue_script(
        'angel-modal',
        set_url_scheme( get_template_directory_uri() . '/assets/js/modal.js', $scheme ),
        [],
        $modal_ver,
        true
    );

    // Enqueue Filter Engine Script (for Opportunity filtering)
    wp_enqueue_script(
        'angel-filter-engine',
        set_url_scheme( get_template_directory_uri() . '/assets/js/filter-engine.js', $scheme ),
        [],
        $filter_ver,
        true
    );

    // Main App Script
    wp_enqueue_script(
        'angel-main',
        set_url_scheme( get_template_directory_uri() . '/assets/js/main.js', $scheme ),
        [ 'angel-navigation', 'angel-modal', 'angel-filter-engine' ],
        $main_ver,
        true
    );

    // Pass dynamic configuration to front-end JavaScript
    wp_localize_script( 'angel-main', 'angelNetworkConfig', [
        'ajaxUrl'       => admin_url( 'admin-ajax.php' ),
        'restUrl'       => esc_url_raw( rest_url( 'angel/v1' ) ),
        'nonce'         => wp_create_nonce( 'angel_public_nonce' ),
        'homeUrl'       => esc_url_raw( home_url( '/' ) ),
        'currency'      => 'USD',
        'currencySymbol'=> '$',
        'i18n'          => [
            'all'           => esc_html__( 'All Sectors', 'angel-network' ),
            'noDealsFound'  => esc_html__( 'No investment opportunities match the selected criteria.', 'angel-network' ),
            'investorTitle' => esc_html__( 'Connect as an Investor', 'angel-network' ),
            'founderTitle'  => esc_html__( 'Apply as a Business Owner', 'angel-network' ),
        ]
    ] );
}
add_action( 'wp_enqueue_scripts', 'angel_scripts' );
