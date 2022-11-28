const Forms = require("@tailwindcss/forms");

module.exports = {
  corePlugins: {
    /*
     * Preflight injects this file https://github.com/tailwindlabs/tailwindcss/blob/master/src/css/preflight.css which
     * would normally be fine but Gutenberg has issues with styles to raw buttons and anchors, and they need to be
     * prefixed with :where(:not(.components-button)) and where(:not(.components-external-link)) respectively so the
     * styles don't end up leaking out of the editor.
     *
     * See src/css/reset.css which should be a verbatim copy of Tailwind's
     * but with those :where applied.
     */
    preflight: false,
  },
  content: [
    "./wp-content/themes/client-theme-folder/**/*.{php,css,js,ts}",
    "./src/**/*.{php,css,js,ts}",
  ],
  safelist: [
    /* Prevent editor-specific styles from being purged */
    "editor-post-title__block",
    "editor-post-title__input",
    "entry-content",
    "entry-title",
    "block-editor-block-list__layout",
  ],
  theme: {},
  plugins: [Forms],
};
