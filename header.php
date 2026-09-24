<?php
/**
 * Header Template
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'bg-white text-slate-800 font-sans antialiased selection:bg-accent selection:text-white flex flex-col min-h-screen' ); ?>>
<?php wp_body_open(); ?>

<!-- Skip to Main Content link for Accessibility -->
<a href="#primary-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-50 focus:px-4 focus:py-2 focus:bg-primary focus:text-white focus:rounded-lg focus:shadow-lg focus:outline-none">
    <?php esc_html_e( 'Skip to main content', 'angel-network' ); ?>
</a>

<!-- Sticky Global Header -->
<header id="site-header" class="sticky top-0 z-40 w-full bg-white border-b border-slate-200 transition-all duration-200">
    <div class="container mx-auto">
        <?php get_template_part( 'template-parts/header/navigation' ); ?>
    </div>
</header>

<main id="primary-content" class="flex-1">
