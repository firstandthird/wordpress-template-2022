const { config } = require('@swc/core/spack')

module.exports = config({
  entry: {
    web: __dirname + "/wp-content/themes/ft-theme/src/js/index.js",
  },
  output: {
    path: __dirname + "/wp-content/themes/ft-theme/dist",
		name: "bundle.js"
  },
});