<?php

/**
 * F+T Header Block
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
$class_name = 'ft-header-block ft-blocks mb-4';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}

$text          = get_field('text') ?: 'Some Header';
$subtitle      = get_field('subtitle') ?: null;
$heading_level = get_field('heading_level') ?: 'h2';
$header_link   = get_field('header_link') ?: null;
?>

<section
  <?= esc_attr($anchor); ?>
  class="<?= esc_attr($class_name); ?>"
>
  <?php if (!empty($header_link)): ?>
  <a href="<?= esc_url($header_link); ?>">
  <?php endif; ?>
    <<?= esc_attr($heading_level); ?> class="ft-header__title">
      <?= esc_html($text); ?>
      <?php if (!!isset($subtitle)): ?>
      <span class="sr-only"><?= esc_html($subtitle); ?></span>
      <?php endif; ?>
    </<?= esc_attr($heading_level); ?>>
  <?php if (!empty($header_link)): ?>
  </a>
  <?php endif; ?>

  <?php if (!empty($subtitle)) : ?>
  <p class="ft-header__subtitle display-flex flex-space-between-center margin-top-sm" aria-hidden="true">
    <span class="margin-xaxis-xs font-small text-stretched text-uppercase font-secondary">
    <?= esc_html($subtitle); ?>
    </span>
  </p>
  <?php endif; ?>
</section>
