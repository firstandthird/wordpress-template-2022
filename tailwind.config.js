const forms = require("@tailwindcss/forms");
const lineClamp = require("@tailwindcss/line-clamp");
const theme = require("./wp-content/themes/base-theme/theme.json");
const tailpress = require("@jeffreyvr/tailwindcss-tailpress");

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./wp-content/themes/**/*.php",
    "./src/css/*.css",
    "./src/js/*.js",
    "./safelist.txt",
  ],
  theme: {
    container: {
      padding: {
        DEFAULT: "1rem",
        sm: "2rem",
        lg: "0rem",
      },
    },
    extend: {
      colors: tailpress.colorMapper(
        tailpress.theme("settings.color.palette", theme)
      ),
      fontSize: tailpress.fontSizeMapper(
        tailpress.theme("settings.typography.fontSizes", theme)
      ),
    },
    screens: {
      xs: "480px",
      sm: "600px",
      md: "782px",
      lg: tailpress.theme("settings.layout.contentSize", theme),
      xl: tailpress.theme("settings.layout.wideSize", theme),
      "2xl": "1440px",
    },
  },
  plugins: [tailpress.tailwind, forms, lineClamp],
};
