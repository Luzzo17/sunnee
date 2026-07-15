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