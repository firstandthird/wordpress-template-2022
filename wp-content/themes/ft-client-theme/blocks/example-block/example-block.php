<?php

/**
 * F+T Example Block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$anchor = '';
if ( ! empty($block['anchor']) ) {
  $anchor = esc_attr($block['anchor']);
}

// Create class attribute allowing for custom "className"
$class_name = 'ft-example-block ft-blocks';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section
  <?= esc_attr($anchor); ?>
  class="<?= esc_attr($class_name); ?>"
>
<!-- Add content here -->
</section>
