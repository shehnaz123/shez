<?php

function my_theme_enqueue_styles() {

    $parent_style = 'parent-style'; // This is 'twentyseventeen-style' for the Twenty Seventeen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// Slick slider styles
function slick_slider_styles() {
    wp_enqueue_style( 'slick-slider-styles', get_stylesheet_directory_uri() . '/slick/slick.min.css' ); 
    wp_enqueue_style( 'slick-slider-theme-styles', get_stylesheet_directory_uri() . '/slick/slick-theme.min.css' );  
}
add_action( 'wp_enqueue_scripts', 'slick_slider_styles');

// Slick slider js
function slick_slider_js() {
    wp_enqueue_script('slick-slider-js', get_stylesheet_directory_uri() . '/slick/slick.min.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'slick_slider_js');