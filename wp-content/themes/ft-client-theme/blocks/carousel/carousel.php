<?php
/**
 * F+T Carousel Block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query *          loop, or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

// Support custom "anchor" values.
$anchor = '';
if ( ! empty($block['anchor']) ) {
  $anchor = esc_attr($block['anchor']);
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'ft-carousel-block ft-blocks mb-4 h-[50vh]';
if ( ! empty($block['className']) ) {
  $class_name .= ' ' . $block['className'];
}
if ( ! empty($block['align']) ) {
  $class_name .= ' align' . $block['align'];
}

?>

<div
 <?= esc_attr($anchor); ?>
 class="<?= esc_attr($class_name); ?>"
>
  <?php if( have_rows('carousel_item') ): ?>
    <?php while( have_rows('carousel_item') ): the_row(); ?>
    <div class="relative h-full w-auto
      <?php if (get_row_layout() !== 'full-size_image') echo esc_attr(' aspect-[0.618]'); ?>">
      <?php if( get_row_layout() === 'image_and_text' ):
        $image       = get_sub_field('image');
        $block_title = get_sub_field('title');
        $content     = get_sub_field('content');
        ?>
        <?php echo wp_get_attachment_image($image['ID'], 'large'); ?>
        <div class="p-4">
        <h3 class="mb-2 font-bold"><?= esc_html($block_title) ?></h3>
        <p><?= esc_html($content) ?></p>
        </div>
      <?php elseif( get_row_layout() === 'text_w_image_bg' ):
        $image       = get_sub_field('image');
        $block_title = get_sub_field('title');
        $content     = get_sub_field('content');
        ?>
        <?php echo wp_get_attachment_image(
          $image['ID'], 'large', false, [
          'class' => 'absolute z-0 h-full w-full object-cover'
           ]
        ); ?>
        <div class="relative z-10 flex h-full w-full flex-col justify-between p-8 bg-black bg-opacity-70 text-white">
          <h3><?= esc_html($block_title) ?></h3>
          <p><?= esc_html($content) ?></p>
        </div>
      <?php elseif( get_row_layout() == 'full-size_image' ):
        $image = get_sub_field('image');
        ?>
        <?php echo wp_get_attachment_image(
          $image['ID'], 'large', false, [
          'class' => 'h-full w-auto'
           ]
        ); ?>
      <?php endif; ?>
    </div>
    <?php endwhile; ?>
  <?php endif; ?>
</div>
