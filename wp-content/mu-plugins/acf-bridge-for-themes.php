<?php
/**
 * Plugin Name: ACF Bridge for F+T Theme
 * Description: Registers v6 blocks in F+T Client theme.
 * Version: 1.1.0
 * Author: First+Third
 * Author URI: https://firstandthird.com
 * Requires at least: 6.0.0
 * Requires PHP: 7
 */

namespace FirstAndThird\FT_Blocks;

class FT_Blocks_Manager {
  static $theme_path = '';
  static $theme_category = 'custom-blocks';
  static $theme_name = 'Custom Blocks';

  static function init() {
    self::$theme_path = get_stylesheet_directory();

    add_filter('block_categories_all', ['FirstAndThird\FT_Blocks\FT_Blocks_Manager', 'register_block_category'], 10, 2);
    add_action('init', ['FirstAndThird\FT_Blocks\FT_Blocks_Manager', 'register_blocks']);
  }

  static function log($message) {
    if (!WP_DEBUG) {
      return;
    }

    //phpcs:disable WordPress.PHP.DevelopmentFunctions.error_log_print_r,WordPress.PHP.DevelopmentFunctions.error_log_error_log --  This is only run in development
    if (is_array($message) || is_object($message)) {
      error_log(print_r($message, true));
      return;
    }

    error_log($message);
    //phpcs:enable
  }

  static function register_block_category($categories) {
    return array_merge(
      $categories,
      [
        [
          'slug' => self::$theme_category,
          'title' => self::$theme_name
        ]
      ]
    );
  }

  static function register_blocks() {
    if (!function_exists('acf_register_block_type')) {
      self::log('ACF not available. F+T Blocks Manager requires ACF to be enabled.');
      return;
    }

    // load v6 theme blocks
    if (is_dir(self::$theme_path . '/blocks')) {
      foreach (new \DirectoryIterator(self::$theme_path . '/blocks') as $file) {
        if ($file->isDir()) {
          register_block_type(self::$theme_path . '/blocks/' . $file->getFilename());
        }
      }
    }
  }
}

FT_Blocks_Manager::init();
