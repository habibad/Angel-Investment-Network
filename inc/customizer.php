<?php
/**
 * Theme Customizer Settings
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function angel_customize_register( $wp_customize ) {
    // Platform Branding & Contact Section
    $wp_customize->add_section( 'angel_platform_options', [
        'title'       => esc_html__( 'Platform Options & Contact', 'angel-network' ),
        'priority'    => 30,
        'description' => esc_html__( 'Manage contact details, regional tag, and regulatory notice displayed in the header and footer.', 'angel-network' ),
    ] );

    // Support Email
    $wp_customize->add_setting( 'angel_support_email', [
        'default'           => 'syndicate@angelinvestmentnetwork.local',
        'sanitize_callback' => 'sanitize_email',
    ] );
    $wp_customize->add_control( 'angel_support_email', [
        'label'    => esc_html__( 'Support Email', 'angel-network' ),
        'section'  => 'angel_platform_options',
        'type'     => 'email',
    ] );

    // Regional Label (e.g. Canada, North America)
    $wp_customize->add_setting( 'angel_region_label', [
        'default'           => 'Canada',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'angel_region_label', [
        'label'    => esc_html__( 'Regional Syndicate Territory', 'angel-network' ),
        'section'  => 'angel_platform_options',
        'type'     => 'text',
    ] );

    // Phone / Hotline
    $wp_customize->add_setting( 'angel_phone_number', [
        'default'           => '+1 (800) 555-ANGEL',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'angel_phone_number', [
        'label'    => esc_html__( 'Support Phone / Hotline', 'angel-network' ),
        'section'  => 'angel_platform_options',
        'type'     => 'text',
    ] );
}
add_action( 'customize_register', 'angel_customize_register' );
