<?php

/**
 * F+T Modal Block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query *          loop, or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

$block_title = get_field('title');
$content     = get_field('content');

// Support custom "anchor" values.
$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = esc_attr($block['anchor']);
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'ft-modal-block ft-blocks';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
if (! empty($block['align'])) {
  $class_name .= ' align' . $block['align'];
}

?>

<div
  <?= esc_attr($anchor); ?>
  class="<?= esc_attr($class_name); ?> p-4 rounded-sm bg-white shadow-md">
  <h2><?= esc_html($block_title) ?></h2>
  <?= wp_kses_post($content) ?>
</div>