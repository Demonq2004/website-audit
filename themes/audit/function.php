<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function audit_setup() {
    add_theme_support( 'title-tag' );

    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

    register_nav_menus( array(
        'primary' => __( 'Menu Główne', 'audit' ),
        'footer'  => __( 'Menu w Stopce', 'audit' )
    ) );
}
add_action( 'after_setup_theme', 'audit_setup' );

function audit_scripts() {
    wp_enqueue_style( 'audit-style', get_stylesheet_uri(), array(), '1.0.0' );

    wp_enqueue_style( 'audit-main-css', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0' );

    wp_enqueue_script( 'audit-main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'audit_scripts' );