<?php
/**
 * Plugin Name: ACF Bridge for WP Themes
 * Description: Automatically scan your theme for ACF blocks and enqueue them.
 * Version: 1.0.0
 * Author: First+Third
 * Author URI: https://firstandthird.com
 * Requires at least: 5.9.0
 * Requires PHP: 7
 */

namespace FirstAndThird\Dandy;

class ACF_Bridge {
  static $theme_path     = '';
  static $theme_options  = [];
  static $theme_category = 'custom-blocks';
  static $theme_name     = 'Custom Blocks';

  static function init() {
    self::$theme_path = get_stylesheet_directory();

    if (file_exists(self::$theme_path . '/blocks.json')) {
      $theme_config = file_get_contents(self::$theme_path . '/blocks.json');

      self::$theme_options = json_decode($theme_config, true);
    }

    add_filter('block_categories_all', ['FirstAndThird\Dandy\ACF_Bridge', 'register_block_category'], 10, 2);
    add_action('init', ['FirstAndThird\Dandy\ACF_Bridge', 'register_blocks']);
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
      self::log('ACF not available. ACF Bridge requires ACF to be enabled.');
      return;
    }

    // load theme blocks
    if (!empty(self::$theme_options['blocks'])) {
      foreach (self::$theme_options['blocks'] as $block_name => $block) {
        acf_register_block_type(
          [
          'name' => $block_name,
          'title' => $block['title'],
          'description' => $block['description'] ?? '',
          'icon' => $block['icon'] ?? 'dashicons-editor-help',
          'keywords' => is_array($block['keywords']) ? array_merge(['dandy'], $block['keywords']) : ['dandy'],
          'supports' => array_merge(
            [
            'align' => false,
            'align_text' => false,
            'align_content' => false,
            'mode' => true,
            'multiple' => true
            ], $block['supports'] ?? []
          ),
          'example' => $block['example'] ?? [],
          'category' => $block['category'] ?? self::$theme_category,
          'render_template' => self::$theme_path . '/blocks/' . $block_name . '/block.php'
          ]
        );
      }
    }
  }
}

ACF_Bridge::init();
