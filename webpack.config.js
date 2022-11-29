"use strict";
const path = require("path");

const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const DependencyExtractionWebpackPlugin = require("@wordpress/dependency-extraction-webpack-plugin");
const RemoveEmptyScriptsPlugin = require("webpack-remove-empty-scripts");

module.exports = {
  mode: "production",
  entry: { bundle: ["./src/index.ts", "./src/index.css"] },
  output: {
    filename: "[name].js",
    path: path.resolve(
      __dirname,
      "./wp-content/themes/client-theme-folder/dist"
    ),
  },
  module: {
    rules: [
      {
        test: /\.css$/,
        use: ["style-loader", "css-loader", "postcss-loader"],
      },
      {
        test: /\.([cm]?ts|tsx)$/,
        loader: "ts-loader",
        exclude: /node_modules|vendor/,
      },
      {
        test: /\.(png|svg|jpg|jpeg|gif)$/i,
        type: "asset/resource",
      },
    ],
  },
  resolve: {
    extensions: [".ts", ".tsx", ".js"],
    extensionAlias: {
      ".js": [".js", ".ts"],
      ".cjs": [".cjs", ".cts"],
      ".mjs": [".mjs", ".mts"],
    },
  },
  plugins: [
    new CleanWebpackPlugin(),
    new DependencyExtractionWebpackPlugin({
      injectPolyfill: false,
    }),
    new RemoveEmptyScriptsPlugin(),
  ],
  watchOptions: {
    ignored: [
      "**/client-theme-folder/dist/**/*.*",
      "**/node_modules",
      "**/vendors",
    ],
  },
};
