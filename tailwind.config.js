const forms = require('@tailwindcss/forms');
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
      colors: {
        primary: '#0EA5E9',
        secondary: '#14B8A6',
        dark: '#1F2937',
        light: '#F9FAFB'
      },
      fontSize: {
        'small': '0.875rem',
        'regular': '1rem',
        'large': '1.125rem',
        'xl': '1.25rem',
        '2xl': '1.5rem',
        '3xl': '1.875rem',
        // Add other font sizes from theme.json as needed
      },
    },
    screens: {
      xs: '320px',
      sm: '640px',
      md: '768px',
      lg: '1024px', // Replace with contentSize from theme.json if different
      xl: '1280px', // From wideSize in theme.json
      '2xl': '1536px',
    },
  },
  plugins: [forms],
};
