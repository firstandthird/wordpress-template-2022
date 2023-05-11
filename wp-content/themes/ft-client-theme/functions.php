<?php
include get_theme_file_uri('inc/acf5_blocks.php');

add_action('wp_enqueue_scripts', '_ft_client_theme_scripts_styles');
function _ft_client_theme_scripts_styles() {
  $theme = wp_get_theme();
  wp_enqueue_style(
    'ft-client-theme',
    get_stylesheet_directory_uri() . '/css/app.css',
    array(),
    $theme->get('Version')
  );
  wp_enqueue_script(
    'ft-client-theme',
    get_stylesheet_directory_uri() . '/js/app.js',
    array(),
    $theme->get('Version'),
    true
  );
}

add_action(
  'admin_init', function () {
    add_editor_style('/css/editor-style.css');
  }
);

add_action('wp_enqueue_scripts', '_ft_client_theme_fonts');
add_action('admin_init', '_ft_client_theme_fonts');
function _ft_client_theme_fonts() {
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
