<?php
function load_theme_scripts() {
  $script_path       = './wp-content/themes/client-theme-folder/dist/bundle.js';
  $script_asset_path = './wp-content/themes/client-theme-folder/dist/bundle.asset.php';
  $script_asset      = file_exists( $script_asset_path )
  ? require $script_asset_path
  : array(
      'dependencies' => array(),
      'version'      => filemtime( $script_path ),
  );
  wp_enqueue_script(
    'ft_theme_js', $script_path, $script_asset['dependencies'], $script_asset['version'], true
  );
}

add_action( 'wp_enqueue_scripts', 'load_theme_scripts' );
