<?php
$img_url = get_the_post_thumbnail_url();
$classes = 'container max-w-screen-lg mb-12 mx-auto';

if (!empty($img_url)) {
  $classes .= ' flex flex-wrap gap-4 lg:flex-nowrap';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
  <?php if (!empty($img_url)): ?>
  <div class="min-w-[250px] w-full">
    <img class="w-full h-auto max-h-[20vh] object-cover" src="<?= esc_url(get_the_post_thumbnail_url()) ?>" />
  </div>
  <?php endif; ?>
  <div>
    <header class="entry-header mb-4">
        <?php the_title(sprintf('<h2 class="entry-title text-2xl md:text-3xl font-extrabold leading-tight mb-1"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
        <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished" class="text-sm text-gray-700"><?php echo get_the_date(); ?></time>
    </header>
    <div class="entry-summary">
      <?php the_excerpt(); ?>
    </div>
  </div>
</article>
