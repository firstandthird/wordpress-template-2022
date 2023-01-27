<?php get_header(); ?>

<div class="mx-auto my-8">

  <?php if ( have_posts() ) : ?>
    <?php
    while ( have_posts() ) :
      the_post();
      ?>

      <div class="entry-content">
      <?php the_content(); ?>
      </div>

      <?php endwhile; ?>

  <?php endif; ?>

</div>

<?php
get_footer();
