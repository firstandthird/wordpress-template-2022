<?php
$img_url = get_the_post_thumbnail_url(null, 'full');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('container mx-auto'); ?>>
    <?php if ($img_url): ?>
    <div>
      <img class="w-full h-auto max-h-[50vh] object-cover mb-4" src="<?= esc_url($img_url) ?>" />
    </div>
    <?php endif; ?>
    <header class="entry-header mb-4">
        <?php the_title(sprintf('<h1 class="entry-title text-2xl lg:text-5xl font-extrabold leading-tight mb-1"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h1>'); ?>
        <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished" class="text-sm text-gray-700"><?php echo get_the_date(); ?></time>
    </header>

    <div class="entry-content">
        <?php the_content(); ?>

        <?php
        wp_link_pages(
          array(
              'before'      => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'ft_base_theme') . '</span>',
              'after'       => '</div>',
              'link_before' => '<span>',
              'link_after'  => '</span>',
              'pagelink'    => '<span class="screen-reader-text">' . __('Page', 'ft_base_theme') . ' </span>%',
              'separator'   => '<span class="screen-reader-text">, </span>',
          )
        );
        ?>
    </div>

</article>
