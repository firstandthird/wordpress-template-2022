const forms = require('@tailwindcss/forms');
const lineClamp = require('@tailwindcss/line-clamp');
const tailpress = require('@jeffreyvr/tailwindcss-tailpress');
const clientTheme = require('./wp-content/themes/ft-client-theme/theme.json');

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './wp-content/themes/**/*.php',
    './src/css/*.css',
    './src/js/*.js',
    './safelist.txt',
  ],
  theme: {
    container: {
      padding: {
        DEFAULT: '1rem',
        md: '2rem',
        lg: '0rem',
      },
    },
    fontFamily: {
      sans: ['Catamaran', 'Helvetica', 'Arial', 'sans-serif'],
      heading: ['Outfit', 'Helvetica', 'Arial', 'sans-serif'],
    },
    extend: {
      colors: tailpress.colorMapper(
        tailpress.theme('settings.color.palette', clientTheme)
      ),
      fontSize: tailpress.fontSizeMapper(
        tailpress.theme('settings.typography.fontSizes', clientTheme)
      ),
    },
    screens: {
      xs: '320px',
      sm: '640px',
      md: '768px',
      lg: tailpress.theme('settings.layout.contentSize', clientTheme),
      xl: tailpress.theme('settings.layout.wideSize', clientTheme),
      '2xl': '1536px',
    },
  },
  plugins: [tailpress.tailwind, forms, lineClamp],
};
