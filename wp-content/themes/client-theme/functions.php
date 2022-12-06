<?php
add_action( 'wp_enqueue_scripts', 'client_theme_scripts_styles' );
function client_theme_scripts_styles() {
  $parenthandle = 'tailpress';
  $theme        = wp_get_theme();
  wp_enqueue_style(
    $parenthandle,
    get_template_directory_uri() . '/css/app.css',
    array(),
    $theme->parent()->get( 'Version' )
  );
  wp_enqueue_style(
    'client-theme',
    get_stylesheet_directory_uri() . '/css/app.css',
    array( $parenthandle ),
    $theme->get( 'Version' )
  );
  wp_enqueue_script(
    $parenthandle,
    get_template_directory_uri() . '/js/app.js',
    array(),
    $theme->parent()->get( 'Version' ),
    true
  );
  wp_enqueue_script(
    'client-theme',
    get_stylesheet_directory_uri() . '/js/app.js',
    array(),
    $theme->get( 'Version' ),
    true
  );
  add_editor_style( 'css/editor-style.css' );
}

add_action( 'wp_enqueue_scripts', 'client_theme_fonts' );
function client_theme_fonts() {
  $theme = wp_get_theme();
  wp_enqueue_style(
    'font-catamaran',
    'https://fonts.googleapis.com/css2?family=Catamaran:wght@400;700&display=swap',
    array(),
    '0.1.0'
  );
  wp_enqueue_style(
    'font-outfit',
    'https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap',
    array(),
    '0.1.0'
  );
}
