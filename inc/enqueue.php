<?php
/**
 * Enqueue scripts and styles
 *
 * @package AngelNetwork
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

    // Enqueue Editorial Serif (Playfair Display) + Modern Sans (Plus Jakarta Sans & Inter)
    wp_enqueue_style(
        'angel-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap',
        [],
        null
    );

    // Enqueue Compiled Tailwind CSS
    wp_enqueue_style(
        'angel-tailwind',
        get_template_directory_uri() . '/assets/css/tailwind.css',
        [],
        $theme_version
    );

    // Enqueue Theme Style.css
    wp_enqueue_style(
        'angel-style',
        get_stylesheet_uri(),
        [ 'angel-tailwind' ],
        $theme_version
    );

    // Enqueue Navigation Script
    wp_enqueue_script(
        'angel-navigation',
        get_template_directory_uri() . '/assets/js/navigation.js',
        [],
        $theme_version,
        true
    );

    // Enqueue Modal Controller Script
    wp_enqueue_script(
        'angel-modal',
        get_template_directory_uri() . '/assets/js/modal.js',
        [],
        $theme_version,
        true
    );

    // Enqueue Filter Engine Script
    wp_enqueue_script(
        'angel-filter-engine',
        get_template_directory_uri() . '/assets/js/filter-engine.js',
        [],
        $theme_version,
        true
    );

    // Main App Script
    wp_enqueue_script(
        'angel-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [ 'angel-navigation', 'angel-modal', 'angel-filter-engine' ],
        $theme_version,
        true
    );

    // Pass dynamic configuration to front-end JavaScript
    wp_localize_script( 'angel-main', 'angelNetworkConfig', [
        'ajaxUrl'       => admin_url( 'admin-ajax.php' ),
        'restUrl'       => esc_url_raw( rest_url( 'angel/v1' ) ),
        'nonce'         => wp_create_nonce( 'angel_public_nonce' ),
        'currency'      => 'CAD',
        'currencySymbol'=> 'CA$',
        'i18n'          => [
            'all'           => esc_html__( 'All Sectors', 'angel-network' ),
            'noDealsFound'  => esc_html__( 'No investment opportunities match the selected criteria.', 'angel-network' ),
        ]
    ] );
}
add_action( 'wp_enqueue_scripts', 'angel_scripts' );
