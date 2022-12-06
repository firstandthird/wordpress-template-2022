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
    get_stylesheet_uri(),
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
}
