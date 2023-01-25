<?php
$img_url = get_the_post_thumbnail_url();
$classes = 'container mb-8 mx-auto';

if (!empty($img_url)) {
  $classes .= ' flex flex-wrap gap-4 lg:flex-nowrap';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
  <?php if (!empty($img_url)): ?>
  <a class="min-w-[250px] w-full" href="<?= esc_url(get_permalink()); ?>">
    <img class="w-full h-auto max-h-[20vh] object-cover" src="<?= esc_url(get_the_post_thumbnail_url()) ?>" />
  </a>
  <?php endif; ?>
  <div>
    <header class="entry-header mb-4">
      <?php the_title(sprintf('<h2 class="entry-title text-2xl md:text-3xl font-extrabold leading-tight mb-1"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
      <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished" class="text-sm text-gray-700"><?php echo get_the_date(); ?></time>
      <div class="entry-meta">
        <?php
        $categories = get_the_category();
        foreach ($categories as $category) {
          if (!is_wp_error(get_term_link($category))) {
            ?>
            <a class="text-blue-500 text-sm" href="<?= esc_url(get_term_link($category)); ?>"><?= esc_html($category->name); ?></a><span>,</span> <?php // phpcs:disable WordPressVIPMinimum.Functions.CheckReturnValue.DirectFunctionCall
          }
        } ?>
      </div>
    </header>
    <div class="entry-summary mb-4">
      <?php the_excerpt(); ?>
    </div>
  </div>
</article>
