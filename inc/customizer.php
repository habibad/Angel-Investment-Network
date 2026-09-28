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

    // Support Email (Omit display until official domain mailbox is active)
    $wp_customize->add_setting( 'angel_support_email', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ] );
    $wp_customize->add_control( 'angel_support_email', [
        'label'       => esc_html__( 'Support Email', 'angel-network' ),
        'section'     => 'angel_platform_options',
        'type'        => 'email',
        'description' => esc_html__( 'Leave empty until an official monitored domain mailbox is configured.', 'angel-network' ),
    ] );

    // Regional Label (e.g. Cuba)
    $wp_customize->add_setting( 'angel_region_label', [
        'default'           => 'Cuba',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'angel_region_label', [
        'label'    => esc_html__( 'Regional Territory', 'angel-network' ),
        'section'  => 'angel_platform_options',
        'type'     => 'text',
    ] );

    // Phone / Hotline
    $wp_customize->add_setting( 'angel_phone_number', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'angel_phone_number', [
        'label'       => esc_html__( 'Support Phone / Hotline', 'angel-network' ),
        'section'     => 'angel_platform_options',
        'type'        => 'text',
        'description' => esc_html__( 'Leave empty if no dedicated telephone hotline is operational.', 'angel-network' ),
    ] );
}
add_action( 'customize_register', 'angel_customize_register' );
