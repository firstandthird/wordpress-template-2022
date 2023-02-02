<?php
/**
 * F+T Gallery Block
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
$class_name = 'ft-gallery-block ft-blocks';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}

$images = get_field('images');

?>

<section
  <?= esc_attr($anchor); ?>
  class="<?= esc_attr($class_name); ?>"
>
<?php if( $images ): ?>
  <?php
  foreach( $images as $image ):
    echo wp_get_attachment_image($image['ID'], 'full');
  endforeach;
  ?>
<?php endif; ?>
</section>
