<?php

function sunnee_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array (
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
));

function mytheme_customize_register( $wp_customize ) {

    $wp_customize->add_section( 'mytheme_contacts_section', array(
        'title' => __( 'Contatti', 'mytheme' ),
        'priority' => 30,
    ));

    $wp_customize->add_setting( 'contact_email', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control( 'contact_email', array(
        'label' => __( 'Email di contatto', 'mytheme' ),
        'section' => 'mytheme_contacts_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting( 'contact_phone', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'contact_phone', array(
        'label' => __( 'Telefono', 'mytheme' ),
        'section' => 'mytheme_contacts_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting( 'contact_instagram', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'contact_instagram', array(
        'label' => __( 'Instagram URL', 'mytheme' ),
        'section' => 'mytheme_contacts_section',
        'type' => 'url',
    ));

    $wp_customize->add_setting( 'contact_tiktok', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'contact_tiktok', array(
        'label' => __( 'TikTok URL', 'mytheme' ),
        'section' => 'mytheme_contacts_section',
        'type' => 'url',
    ));

    $wp_customize->add_setting( 'contact_x', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'contact_x', array(
        'label' => __( 'X (Twitter) URL', 'mytheme' ),
        'section' => 'mytheme_contacts_section',
        'type' => 'url',
    ));
}
add_action( 'customize_register', 'mytheme_customize_register' );

    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 100,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    register_nav_menus( array(
        'primary' => __('Menu Principale', 'sunnee')
    ));

register_nav_menus( array(
    'primary' => __('Menu Principale', 'sunnee' )
));

}

add_action( 'after_setup_theme', 'sunnee_setup' );

function sunnee_enqueue_assets() {
    wp_enqueue_style( 'sunnee-style',
    get_template_directory_uri() . '/assets/css/style.css', array(), wp_get_theme()->get('Version') );


wp_enqueue_script( 'sunnee-script',
    get_template_directory_uri() . '/assets/js/main.js', array(), wp_get_theme()->get('Version'), true );
}
add_action( 'wp_enqueue_scripts', 'sunnee_enqueue_assets' );

function sunnee_customize_register( $wp_customize ) {

    $wp_customize->add_section( 'footer_logo_section', array(
        'title'       => __( 'Logo Footer', 'sunnee' ),
        'priority'    => 30,
    ));

    $wp_customize->add_setting( 'footer_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'footer_logo',
            array(
                'label'    => __( 'Carica il logo del footer', 'sunnee' ),
                'section'  => 'footer_logo_section',
                'settings' => 'footer_logo'
            )
        )
    );
}
add_action( 'customize_register', 'sunnee_customize_register' );