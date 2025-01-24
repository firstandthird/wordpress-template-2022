<?php
/**
 * F+T Features Block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query *          loop, or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

$section_title     = get_field('section_title');
$featured_items    = get_field('featured_items');
$number_of_columns = get_field('number_of_columns');

// Support custom "anchor" values.
$anchor = '';
if ( ! empty($block['anchor']) ) {
  $anchor = esc_attr($block['anchor']);
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'ft-features-block ft-blocks mb-4';
if ( ! empty($block['className']) ) {
  $class_name .= ' ' . $block['className'];
}

if ( ! empty($block['align']) ) {
  $class_name .= ' align' . $block['align'];
}

?>
<style>
  .ft-features-block > div {
    --no-of-columns: <?= esc_attr($number_of_columns); ?>;
  }
</style>
<section
 <?= esc_attr($anchor); ?>
 class="<?= esc_attr($class_name); ?>"
>
  <?php if (!empty($section_title)): ?>
  <h3><?= esc_html($section_title) ?></h3>
  <?php endif; ?>
  <?php if( have_rows('featured_items') ): ?>
    <div>
    <?php while( have_rows('featured_items') ): the_row(); ?>
      <div class="flex justify-between items-start gap-4">
      <?php
      $image       = get_sub_field('image_or_icon');
      $block_title = get_sub_field('title');
      $content     = get_sub_field('featured_content');
      $cta         = get_sub_field('cta');
      ?>

      <?php if (!empty($image)) {
        echo wp_get_attachment_image(
          $image, 'large', false, [
            'class' => 'w-[10%]'
          ]
        );
      } ?>
      <?php if (!empty($block_title) or !empty($content)): ?>
        <div>
        <?php if (!empty($block_title)): ?>
        <h4 class="mb-2 font-bold"><?= esc_html($block_title) ?></h4>
        <?php endif;
        if (!empty($content)): ?>
        <p class="mb-0!"><?= esc_html($content) ?></p>
        <?php endif;
        if (!empty($cta)): ?>
        <a href=<?= esc_url($cta['url']) ?> class="inline-block bg-black mt-2 px-4 py-2 text-white"><?= esc_html($cta['title']) ?></a>
        <?php endif; ?>
        </div>
        <?php endif; ?>
      </div>
    <?php endwhile; ?>
    </div>
  <?php endif; ?>
</section>
