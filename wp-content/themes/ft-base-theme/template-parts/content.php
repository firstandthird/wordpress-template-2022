<article id="post-<?php the_ID(); ?>" <?php post_class('container mb-12 mx-auto'); ?>>

    <header class="entry-header mb-4">
        <?php the_title(sprintf('<h2 class="entry-title text-2xl md:text-3xl font-extrabold leading-tight mb-1"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
        <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished" class="text-sm text-gray-700"><?php echo get_the_date(); ?></time>
        <div class="entry-meta">
          <?php
          $categories = get_the_category();
          foreach ($categories as $category) { ?>
          <a class="text-blue-500 text-sm" href="<?= esc_url($category->url); ?>"><?= esc_html($category->name); ?></a><span>,</span>
          <?php } ?>
        </div>
    </header>

    <?php if ( is_search() || is_archive() ) : ?>

        <div class="entry-summary">
      <?php the_excerpt(); ?>
        </div>

    <?php else : ?>

        <div class="entry-content">
      <?php

      the_content(
        sprintf(
                    /* translators: %s: Name of current post */
          __('Continue reading %s', 'ft_base_theme'),
          the_title('<span class="screen-reader-text">"', '"</span>', false)
        )
      );

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

    <?php endif; ?>

</article>
