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
    'theme_js', $script_path, $script_asset['dependencies'], $script_asset['version'], true
  );
}
add_action( 'wp_enqueue_scripts', 'load_theme_scripts' );

function render_tailwind() {
  echo '<h1 class="bg-red-800 text-white font-bold mb-6 p-4">If this box is styled, Tailwind has loaded and you may remove this from your functions.php file.</h1>';
}
add_action( 'wp_head', 'render_tailwind' );
