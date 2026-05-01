<?php
// Safety first
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// 1. Theme Setup
if ( ! function_exists( 'forexcrypto_setup' ) ) {
    function forexcrypto_setup() {
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        
        // Register menus
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'forexcryptolab' ),
        ) );
    }
}
add_action( 'after_setup_theme', 'forexcrypto_setup' );

// 2. Enqueue Scripts & Styles
if ( ! function_exists( 'forexcrypto_scripts' ) ) {
    function forexcrypto_scripts() {
        wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@600;700;800&display=swap', array(), null );
        // Versi manual untuk force cache bust
        wp_enqueue_style( 'forexcrypto-style', get_stylesheet_uri(), array(), '2.0.5' );
    }
}
add_action( 'wp_enqueue_scripts', 'forexcrypto_scripts' );

// 3. Flush Rewrite Rules (Auto-post & Permalinks)
if ( ! function_exists( 'forexcrypto_flush_rewrites' ) ) {
    function forexcrypto_flush_rewrites() {
        // Only flush on activation
        flush_rewrite_rules();
    }
}
add_action( 'after_switch_theme', 'forexcrypto_flush_rewrites' );

// 4. Remove First Image from Content
if ( ! function_exists( 'forexcrypto_remove_first_image' ) ) {
    function forexcrypto_remove_first_image( $content ) {
        // Hanya proses di halaman baca artikel (single)
        if ( is_single() && in_the_loop() && is_main_query() ) {
            // Gunakan regex untuk menghapus tag <img> pertama yang ditemukan
            $content = preg_replace( '/<img[^>]+>/i', '', $content, 1 );
        }
        return $content;
    }
}
add_filter( 'the_content', 'forexcrypto_remove_first_image', 10 );

// 5. Customizer API for Dynamic Front Page
if ( ! function_exists( 'forexcrypto_customize_register' ) ) {
    function forexcrypto_customize_register( $wp_customize ) {
        
        // Hero Section
        $wp_customize->add_section( 'hero_section', array(
            'title'    => __( 'Hero Section', 'forexcryptolab' ),
            'priority' => 30,
        ) );

        // Hero Title
        $wp_customize->add_setting( 'hero_title', array(
            'default'           => 'Transform Your Trading Journey Today',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'hero_title', array(
            'label'   => __( 'Hero Title', 'forexcryptolab' ),
            'section' => 'hero_section',
            'type'    => 'text',
        ) );

        // Hero Subtitle
        $wp_customize->add_setting( 'hero_subtitle', array(
            'default'           => 'Unlock the secrets of profitable trading with expert insights, proven strategies, and real-time market intelligence',
            'sanitize_callback' => 'sanitize_textarea_field',
        ) );
        $wp_customize->add_control( 'hero_subtitle', array(
            'label'   => __( 'Hero Subtitle', 'forexcryptolab' ),
            'section' => 'hero_section',
            'type'    => 'textarea',
        ) );

        // Hero Button Text
        $wp_customize->add_setting( 'hero_button_text', array(
            'default'           => 'Start Learning Now - It\'s Free!',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'hero_button_text', array(
            'label'   => __( 'Button Text', 'forexcryptolab' ),
            'section' => 'hero_section',
            'type'    => 'text',
        ) );
        
        // Hero Button URL
        $wp_customize->add_setting( 'hero_button_url', array(
            'default'           => '#blog',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( 'hero_button_url', array(
            'label'   => __( 'Button URL', 'forexcryptolab' ),
            'section' => 'hero_section',
            'type'    => 'url',
        ) );

    }
}
add_action( 'customize_register', 'forexcrypto_customize_register' );
