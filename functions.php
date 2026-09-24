<?php
/**
 * Investment Network - Theme Functions and Definitions
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define Theme Constants
define( 'ANGEL_THEME_VERSION', '1.0.0' );
define( 'ANGEL_THEME_DIR', get_template_directory() );
define( 'ANGEL_THEME_URI', get_template_directory_uri() );

// Core Setup & Enqueue
require_once ANGEL_THEME_DIR . '/inc/setup.php';
require_once ANGEL_THEME_DIR . '/inc/enqueue.php';
require_once ANGEL_THEME_DIR . '/inc/security.php';

// Helper & Template Functions
require_once ANGEL_THEME_DIR . '/inc/theme-functions.php';
require_once ANGEL_THEME_DIR . '/inc/template-functions.php';
require_once ANGEL_THEME_DIR . '/inc/customizer.php';

// Demo Data Layer (Phase 1 Data Repository)
require_once ANGEL_THEME_DIR . '/inc/demo-data.php';

// Custom Route Handlers
require_once ANGEL_THEME_DIR . '/inc/routes.php';
