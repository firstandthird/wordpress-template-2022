<?php

/**
 * Theme setup.
 */
function base_theme_setup() {
  add_theme_support('title-tag');

  register_nav_menus(
    array(
        'primary' => __('Primary Menu', 'ft_base_theme'),
    )
  );

  add_theme_support(
    'html5',
    array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    )
  );

  add_theme_support('custom-logo');
  add_theme_support('post-thumbnails');

  add_theme_support('align-wide');
  add_theme_support('wp-block-styles');

  add_theme_support('editor-styles');
}

add_action('after_setup_theme', 'base_theme_setup');

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function base_theme_asset( $path ) {
  if ( wp_get_environment_type() === 'production' ) {
    return get_stylesheet_directory_uri() . '/' . $path;
  }

  return add_query_arg('time', time(), get_stylesheet_directory_uri() . '/' . $path);
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function base_theme_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
  if ( isset($args->li_class) ) {
    $classes[] = $args->li_class;
  }

  if ( isset($args->{"li_class_$depth"}) ) {
    $classes[] = $args->{"li_class_$depth"};
  }

  return $classes;
}

add_filter('nav_menu_css_class', 'base_theme_nav_menu_add_li_class', 10, 4);

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function base_theme_nav_menu_add_submenu_class( $classes, $args, $depth ) {
  if ( isset($args->submenu_class) ) {
    $classes[] = $args->submenu_class;
  }

  if ( isset($args->{"submenu_class_$depth"}) ) {
    $classes[] = $args->{"submenu_class_$depth"};
  }

  return $classes;
}

add_filter('nav_menu_submenu_css_class', 'base_theme_nav_menu_add_submenu_class', 10, 3);
