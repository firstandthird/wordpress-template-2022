
</main>

<?php do_action('base_theme_content_end'); ?>

</div>

<?php do_action('base_theme_content_after'); ?>

<footer id="colophon" class="site-footer bg-gray-50 py-12" role="contentinfo">
    <?php do_action('base_theme_footer'); ?>

    <div class="container mx-auto text-center text-gray-500">
        &copy; <?php echo esc_html(date_i18n('Y')); ?> - <?php echo esc_html(get_bloginfo('name')); ?>
    </div>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
