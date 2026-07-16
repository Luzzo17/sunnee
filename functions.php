<?php

function sunnee_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ) );

    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 100,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    register_nav_menus( array(
        'primary' => __( 'Menu Principale', 'sunnee' )
    ) );
}
add_action( 'after_setup_theme', 'sunnee_setup' );

function sunnee_enqueue_assets() {
    wp_enqueue_style(
        'sunnee-style',
        get_template_directory_uri() . '/assets/css/style.css',
        array(),
        filemtime( get_template_directory() . '/assets/css/style.css' )
    );

    wp_enqueue_style(
        'sunnee-responsive',
        get_template_directory_uri() . '/assets/css/responsive.css',
        array( 'sunnee-style' ),
        filemtime( get_template_directory() . '/assets/css/responsive.css' )
    );

    wp_enqueue_script(
        'sunnee-script',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        filemtime( get_template_directory() . '/assets/js/main.js' ),
        true
    );
}
add_action( 'wp_enqueue_scripts', 'sunnee_enqueue_assets' );

function sunnee_sanitize_textarea( $value ) {
    return sanitize_textarea_field( $value );
}

function sunnee_add_text_control( $wp_customize, $id, $label, $section, $default = '', $type = 'text', $sanitize_callback = 'sanitize_text_field' ) {
    $wp_customize->add_setting( $id, array(
        'default'           => $default,
        'sanitize_callback' => $sanitize_callback,
    ) );

    $wp_customize->add_control( $id, array(
        'label'   => $label,
        'section' => $section,
        'type'    => $type,
    ) );
}

function sunnee_add_image_control( $wp_customize, $id, $label, $section, $default = '' ) {
    $wp_customize->add_setting( $id, array(
        'default'           => $default,
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            $id,
            array(
                'label'    => $label,
                'section'  => $section,
                'settings' => $id,
            )
        )
    );
}

function sunnee_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'sunnee_hero_section', array(
        'title'    => __( 'Hero', 'sunnee' ),
        'priority' => 20,
    ) );

    sunnee_add_image_control( $wp_customize, 'hero_image', __( 'Immagine hero', 'sunnee' ), 'sunnee_hero_section', get_theme_file_uri( 'assets/images/hero.jpg' ) );
    sunnee_add_text_control( $wp_customize, 'hero_title', __( 'Titolo hero', 'sunnee' ), 'sunnee_hero_section', 'Born from the Sea Built for Adventure', 'textarea', 'sunnee_sanitize_textarea' );

    $wp_customize->add_section( 'sunnee_home_intro_section', array(
        'title'    => __( 'Homepage - Chi siamo', 'sunnee' ),
        'priority' => 30,
    ) );

    sunnee_add_text_control( $wp_customize, 'home_intro_title', __( 'Titolo sezione', 'sunnee' ), 'sunnee_home_intro_section', 'CHI SIAMO' );
    sunnee_add_text_control( $wp_customize, 'home_intro_text', __( 'Testo sezione', 'sunnee' ), 'sunnee_home_intro_section', 'Sunnee nasce dall amore per il mare e dalla volonta di trasformare la plastica marina in costumi sostenibili, pensati per ridurre l impatto ambientale senza rinunciare a comfort, stile e performance.', 'textarea', 'sunnee_sanitize_textarea' );
    sunnee_add_text_control( $wp_customize, 'home_intro_button_text', __( 'Testo link', 'sunnee' ), 'sunnee_home_intro_section', 'scopri di più...' );
    sunnee_add_text_control( $wp_customize, 'home_intro_button_url', __( 'URL link', 'sunnee' ), 'sunnee_home_intro_section', '#', 'url', 'esc_url_raw' );

    $wp_customize->add_section( 'sunnee_separator_section', array(
        'title'    => __( 'Separatore', 'sunnee' ),
        'priority' => 40,
    ) );

    sunnee_add_image_control( $wp_customize, 'separator_image', __( 'Immagine separatore', 'sunnee' ), 'sunnee_separator_section', get_theme_file_uri( 'assets/images/separator.jpg' ) );

    $wp_customize->add_section( 'sunnee_collections_section', array(
        'title'    => __( 'Collezioni', 'sunnee' ),
        'priority' => 50,
    ) );

    sunnee_add_text_control( $wp_customize, 'collections_title', __( 'Titolo sezione collezioni', 'sunnee' ), 'sunnee_collections_section', 'LE NOSTRE COLLEZIONI' );
    sunnee_add_text_control( $wp_customize, 'collections_text', __( 'Testo sezione collezioni', 'sunnee' ), 'sunnee_collections_section', 'Le collezioni Sunnee includono modelli per uomo e donna, dal comfort quotidiano alle performance sportive in acqua.', 'textarea', 'sunnee_sanitize_textarea' );
    sunnee_add_text_control( $wp_customize, 'collections_button', __( 'Testo link collezioni', 'sunnee' ), 'sunnee_collections_section', 'scopri di più...' );
    sunnee_add_text_control( $wp_customize, 'collections_url', __( 'URL link collezioni', 'sunnee' ), 'sunnee_collections_section', '#', 'url', 'esc_url_raw' );

    $collections = array(
        1 => array( 'Relax', 'assets/images/relax_collection.jpg' ),
        2 => array( 'Active', 'assets/images/active_collection.jpg' ),
        3 => array( 'Extreme', 'assets/images/extreme_collection.jpg' ),
        4 => array( 'Kids (Coming Soon)', 'assets/images/kids_collection.jpg' ),
    );

    foreach ( $collections as $number => $collection ) {
        sunnee_add_text_control( $wp_customize, "collection_{$number}_title", sprintf( __( 'Titolo collezione %d', 'sunnee' ), $number ), 'sunnee_collections_section', $collection[0] );
        sunnee_add_image_control( $wp_customize, "collection_{$number}_image", sprintf( __( 'Immagine collezione %d', 'sunnee' ), $number ), 'sunnee_collections_section', get_theme_file_uri( $collection[1] ) );
    }

    $wp_customize->add_section( 'sunnee_page_sections', array(
        'title'    => __( 'Pagine - Sezioni', 'sunnee' ),
        'priority' => 60,
    ) );

    sunnee_add_text_control( $wp_customize, 'story_title', __( 'Titolo storia', 'sunnee' ), 'sunnee_page_sections', 'STORIA' );
    sunnee_add_text_control( $wp_customize, 'story_text', __( 'Testo storia', 'sunnee' ), 'sunnee_page_sections', 'Nel 2018 la fondatrice ha lanciato Sunnee con l obiettivo di creare un brand che riflettesse i suoi valori di sportiva e amante del mare. Oggi Sunnee e un team strutturato nel settore del beachwear sostenibile.', 'textarea', 'sunnee_sanitize_textarea' );
    sunnee_add_image_control( $wp_customize, 'story_image', __( 'Immagine storia', 'sunnee' ), 'sunnee_page_sections', get_theme_file_uri( 'assets/images/story.jpg' ) );

    sunnee_add_text_control( $wp_customize, 'vision_title', __( 'Titolo vision', 'sunnee' ), 'sunnee_page_sections', 'VISION' );
    sunnee_add_text_control( $wp_customize, 'vision_text', __( 'Testo vision', 'sunnee' ), 'sunnee_page_sections', 'Innovare il settore del beachwear sostenibile utilizzando esclusivamente filati ricavati da plastica riciclata.', 'textarea', 'sunnee_sanitize_textarea' );
    sunnee_add_image_control( $wp_customize, 'vision_image', __( 'Immagine vision', 'sunnee' ), 'sunnee_page_sections', get_theme_file_uri( 'assets/images/vision.jpg' ) );

    sunnee_add_text_control( $wp_customize, 'mission_title', __( 'Titolo missione', 'sunnee' ), 'sunnee_page_sections', 'MISSION E VALORI' );
    sunnee_add_text_control( $wp_customize, 'mission_text', __( 'Testo missione', 'sunnee' ), 'sunnee_page_sections', 'Costruire una filiera produttiva etica e rigenerativa, garantendo la sostenibilita in ogni fase della realizzazione dei costumi.', 'textarea', 'sunnee_sanitize_textarea' );

    $wp_customize->add_section( 'sunnee_contacts_section', array(
        'title'    => __( 'Contatti', 'sunnee' ),
        'priority' => 70,
    ) );

    sunnee_add_text_control( $wp_customize, 'contact_title', __( 'Titolo form contatti', 'sunnee' ), 'sunnee_contacts_section', 'Non esitare a contattarci!' );
    sunnee_add_text_control( $wp_customize, 'contact_email', __( 'Email di contatto', 'sunnee' ), 'sunnee_contacts_section', 'info@sunnee.it', 'email', 'sanitize_email' );
    sunnee_add_text_control( $wp_customize, 'contact_phone', __( 'Telefono', 'sunnee' ), 'sunnee_contacts_section', '+39 02 1234 5678' );
    sunnee_add_text_control( $wp_customize, 'contact_instagram', __( 'Instagram URL', 'sunnee' ), 'sunnee_contacts_section', 'https://www.instagram.com', 'url', 'esc_url_raw' );
    sunnee_add_text_control( $wp_customize, 'contact_tiktok', __( 'TikTok URL', 'sunnee' ), 'sunnee_contacts_section', 'https://www.tiktok.com', 'url', 'esc_url_raw' );
    sunnee_add_text_control( $wp_customize, 'contact_x', __( 'X URL', 'sunnee' ), 'sunnee_contacts_section', 'https://www.twitter.com', 'url', 'esc_url_raw' );

    $wp_customize->add_section( 'footer_logo_section', array(
        'title'    => __( 'Logo Footer', 'sunnee' ),
        'priority' => 80,
    ) );

    sunnee_add_image_control( $wp_customize, 'footer_logo', __( 'Carica il logo del footer', 'sunnee' ), 'footer_logo_section' );
}
add_action( 'customize_register', 'sunnee_customize_register' );
