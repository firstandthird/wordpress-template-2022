<?php get_header(); ?>

<div class="container mx-auto my-8">
  <?php if (is_archive()): ?>
    <h1 class="entry-title text-2xl lg:text-5xl font-extrabold leading-tight mb-8 max-w-max"><?= wp_kses_post(get_the_archive_title()); ?></h1>
  <?php endif; ?>
  <?php if (have_posts()) : ?>
    <?php
    while (have_posts()) :
      the_post();
    ?>

      <?php get_template_part('template-parts/content', get_post_format()); ?>

    <?php endwhile; ?>

  <?php endif; ?>

</div>

<?php
get_footer();
