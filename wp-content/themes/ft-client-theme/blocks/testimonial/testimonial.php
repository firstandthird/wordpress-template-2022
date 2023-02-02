<?php
/**
 * F+T Testimonial Block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

// Support custom "anchor" values.
$anchor = '';
if ( ! empty($block['anchor']) ) {
  $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'ft-testimonial-block ft-blocks mb-4';
if ( ! empty($block['className']) ) {
  $class_name .= ' ' . $block['className'];
}
if ( ! empty($block['align']) ) {
  $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$text        = get_field('testimonial') ?: 'Your testimonial here...';
$author      = get_field('author') ?: 'Author name';
$author_role = get_field('role') ?: 'Author role';

?>
<div <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
    <blockquote class="m-0 p-6 border-solid border-0 border-l-4 border-l-blue-900 bg-blue-200">
        <span class="block mb-2 text-xl leading-tight"><?php echo esc_html($text); ?></span>
        <span class="block text-sm leading-normal"><?php echo esc_html($author); ?></span>
        <span class="block text-sm leading-normal"><?php echo esc_html($author_role); ?></span>
    </blockquote>
</div>
