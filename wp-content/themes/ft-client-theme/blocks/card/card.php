<?php
/**
 * F+T Card Block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

// Support custom "anchor" values.
$anchor = '';
if ( ! empty($block['anchor']) ) {
  $anchor = esc_attr($block['anchor']);
}

// Create class attribute allowing for custom "className"
$class_name = 'ft-card-block ft-blocks mx-auto mb-4 max-w-xs! shadow-md';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}

$image   = get_field('image');
$heading = get_field('heading');
$content = get_field('content');
$button  = get_field('button');

?>

<section
  <?= esc_attr($anchor); ?>
  class="<?= esc_attr($class_name); ?>"
>
  <?php if (!empty($image)): ?>
  <img src=<?= esc_url($image['url']) ?> alt=<?= esc_attr($image['alt']) ?> class="aspect-[0.66] w-full h-auto object-cover" />
  <?php endif; ?>
  <div class="p-8">
    <?php if (!empty($heading)): ?>
    <h3 class="mb-[0.25em] mt-0 text-xl font-extrabold"><?= esc_html($heading); ?></h3>
    <?php endif; ?>
    <?php if (!empty($content)): ?>
    <p class="mb-[1em]"><?= esc_html($content); ?></p>
    <?php endif; ?>
    <?php if (!empty($button)): ?>
    <a href=<?= esc_url($button['url']) ?> class="inline-block bg-black px-4 py-2 text-white"><?= esc_html($button['title']) ?></a>
    <?php endif; ?>
  </div>
</section>
