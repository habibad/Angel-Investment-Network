<?php
/**
 * Theme Setup & Feature Support
 *
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'angel_theme_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function angel_theme_setup() {
        // Make theme available for translation.
        load_theme_textdomain( 'angel-network', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        // Let WordPress manage the document title.
        add_theme_support( 'title-tag' );

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 1200, 630, true );

        // Additional Image Sizes for Deal Cards & Profiles
        add_image_size( 'opportunity-card', 640, 420, true );
        add_image_size( 'investor-avatar', 240, 240, true );
        add_image_size( 'brand-logo', 200, 80, false );

        // Register Navigation Menus
        register_nav_menus( [
            'primary_menu'           => esc_html__( 'Primary Navigation', 'angel-network' ),
            'footer_invest'          => esc_html__( 'Footer Invest Menu', 'angel-network' ),
            'footer_fundraise'       => esc_html__( 'Footer Fundraise Menu', 'angel-network' ),
            'footer_company'         => esc_html__( 'Footer Company Menu', 'angel-network' ),
            'footer_legal'           => esc_html__( 'Footer Legal Menu', 'angel-network' ),
        ] );

        // Switch default core markup for search form, comment form, etc. to output valid HTML5.
        add_theme_support( 'html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ] );

        // Add support for core custom logo.
        add_theme_support( 'custom-logo', [
            'height'      => 60,
            'width'       => 220,
            'flex-width'  => true,
            'flex-height' => true,
        ] );

        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );
    }
endif;
add_action( 'after_setup_theme', 'angel_theme_setup' );
