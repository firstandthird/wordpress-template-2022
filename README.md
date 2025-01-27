# WordPress Project Template 2022

Welcome!

This template contains all you need to start the next great First+Third project. Click **Use this template** and start hacking away!

## What's included
- Support for modern CSS and JS development syntax with [PostCSS](https://postcss.org/) and [ESBuild](https://esbuild.github.io/).
- A no-nonsense, CLI-exclusive setup and build process.
- [Docker](https://www.docker.com/) integration to keep local dependencies tight-knit.
- Default configs for [ESLint](https://eslint.org/), [Prettier](https://prettier.io/), and [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer).

Once this template is turned into a new repository, there are a few things you'll need to do:

## Steps

- Replace **Client Name** in the below documentation.
- In `/wp-content/themes/ft-client-theme`:
  - Change the folder name to the client's name or an appropriate, project-specific title.
  - Replace mentions of `ft_client_theme` and `ft-client-theme` in the `functions.php` file.
  - Update the `Theme Name` and `Text Domain` in `style.css`.
- In `tailwind.config.js`:
  - Change the `clientTheme` constant to the folder's new URI.
- On `package.json`:
  - Update the package `name` to be the client's theme slug.
  - Search `https://github.com/firstandthird/wordpress-template-2022` and replace it with the new repo's URL.
  - Replace mentions of `ft_client_theme` and `ft-client-theme`

Happy coding!

> **Warning**
> Remove the above information and this notice before deployment!

# Client Name

WordPress theme for **Client Name**.

## Requirements

There are a few requirements to develop a new theme or contribute back to the project:

- [Git](https://git-scm.com/) for version control.
- [Node 18+](https://nodejs.org).
- [NPM](https://www.npmjs.com/) for managing JS dependencies.
- [Composer](https://getcomposer.org/) for managing PHP and WordPress packages.
- [Docker](https://www.docker.com/) to create a local development environment.

## Quick Start

### Install all dependencies and launch the instance

    bash
    $ npm install
    $ npm run initialize
    $ npm run start

> **Note**
> During the `initialize` step, you will be asked for ACF credentials. Use the license key for the `username` and the website URL for the `password`.
> If you don't know the final production URL for the project, use https://firstandthird.com/ as the password.


Several things are handled during this step:

- `.env` is created based on the example file.
- All NPM and Composer packages are installed and updated.
- ACF Pro is validated and installed.
- Base theme styles and scripts are compiled.

### Set up the WordPress admin

1. Access the Docker instance by going to [localhost:8080](http://localhost:8080). If you do not see the website, check the **Ports** column in Docker desktop or list running containers in your CLI to find the correct port to use (e.g. 80, 3000, 8888).

2. Follow the WordPress installation steps, log into your account, and change to the F+T Client Theme.

3. Create a page and call it "Home".

4. Go to [Reading Options](http://localhost/wp-admin/options-reading.php), set **Your homepage displays** to **A static page**, and select your new Home page.

## Anatomy

The template includes a base theme, an empty child theme, and a `src` folder for CSS, JS, and assets.

### Child Theme

The child theme template includes only the core files and imports.

> **Warning**
> Only edit the base theme if absolutely necessary!

### JS and CSS

#### app.css, app.js

The front-end CSS and JS loaded across the website. These are the entry points for the compiler and where any extra resources should be imported.

#### custom.css

The global CSS stylesheet; supports Tailwind syntax like `@layer` and `@screen`. This should be used sparingly as we prefer inline Tailwind classes to global styles, but it's recommended for setting `@layer base` styles such as fonts, font sizes, container spacing, and etcetera.

#### editor-style.css

The back-end CSS used to enable Tailwind styles in the Gutenberg builder. [This Codex page for `add_editor_style()`](https://developer.wordpress.org/reference/functions/add_editor_style/) explains how styles target parts of the TinyMCE and Gutenberg editors.

## Adding & Managing Blocks

All blocks are stored in the `/blocks` folder of the client theme. Make a new folder to store your template files and name it after the block.

This theme uses [the ACF 6.0 method of block templating](https://advancedcustomfields.com/resources/blocks/#getting-started).

### Adding Blocks Made in ACF 5.X.X

The theme is designed to be backwards-compatible with ACF's `acf_register_block_type()` function, but we highly recommend you [refactor your v5 blocks to v6](https://advancedcustomfields.com/resources/how-to-upgrade-a-legacy-block-to-block-json-with-acf-6/).
