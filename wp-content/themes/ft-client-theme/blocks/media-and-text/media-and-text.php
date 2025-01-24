<?php
/**
 * F+T Media & Text Block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query *          loop, or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

$block_title = get_field('title');
$superheader = get_field('superheader');
$cta         = get_field('cta');
$image       = get_field('image');
$block_copy  = get_field('copy');

// Support custom "anchor" values.
$anchor = '';
if ( ! empty($block['anchor']) ) {
  $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'ft-media-text-block ft-blocks mb-4';
if ( ! empty($block['className']) ) {
  $class_name .= ' ' . $block['className'];
}
if ( ! empty($block['align']) ) {
  $class_name .= ' align' . $block['align'];
}

$is_media_left = strpos($class_name, 'is-style-media-left') !== false;
?>

 <section
   <?= esc_attr($anchor); ?>
   class="<?= esc_attr($class_name); ?>"
 >
   <div
     class="flex flex-col-reverse gap-5 xl:gap-8 lg:flex-row"
   >
     <div class="xl:w-1/2 lg:w-3/5 lg:flex lg:items-center">
       <div class="mx-auto lg:w-full">
         <?php if ( ! empty($superheader) ): ?>
           <p class="uppercase font-bold tracking-wider mb-1.5"><?= wp_kses_post($superheader); ?></p>
         <?php endif; ?>
         <?php if ( ! empty($block_title) ): ?>
           <h2 class="mb-1.5"><?= wp_kses_post($block_title); ?></h2>
         <?php endif; ?>
         <div><?= wp_kses_post($block_copy); ?></div>
         <?php if ( ! empty($cta['text']) && ! empty($cta['url']) ) : ?>
          <div class="mt-8">
            <a href="<?= esc_url($cta['url']['url']) ?>" class="bg-black text-white px-5 py-2"><?= esc_html($cta['text']); ?></a>
          </div>
        <?php endif; ?>
       </div>
     </div>
     <div class="mb-5 xl:w-1/2 lg:mb-0 lg:w-2/5 lg:flex lg:items-center<?php if ( $is_media_left ): ?> lg:-order-1<?php endif; ?>">
       <?php if ( ! empty($image) ): ?>
       <div class="media-text-image">
          <?= wp_get_attachment_image(
            $image, 'large', false, array(
            'class' => 'aspect-3/2 object-cover object-center w-full h-auto'
            )
          ); ?>
       </div>
       <?php endif; ?>
     </div>
   </div>
 </section>
