# WordPress Project Template 2022

Welcome!

This template contains all you need to start the next great First+Third project. Click **Use this template** and start hacking away!

## What's included

- A base theme forked from [TailPress](https://tailpress.io/), providing frictionless [Tailwind CSS](https://tailwindcss.com/) support for scripts, styles, and templates.
- Support for modern CSS and JS development syntax with [PostCSS](https://postcss.org/) and [ESBuild](https://esbuild.github.io/).
- A no-nonsense, CLI-exclusive setup and build process.
- [Docker](https://www.docker.com/) integration to keep local dependencies tight-knit.
- Default configs for [ESLint](https://eslint.org/), [Prettier](https://prettier.io/), and [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer).

Once this template is turned into a new repository, there are a few things you'll need to do:

## Steps

- Replace **Client Name** in the below documentation.
- In `/wp-content/themes/client-theme`:
  - Change the folder name to the client's name or an appropriate, project-specific title.
  - Replace mentions of `client_theme` and `client-theme` in the `functions.php` file.
  - Update the `Theme Name` and `Text Domain` in `style.css`.
- On `package.json`:
  - Update the package `name` to be the client's theme slug.
  - Search `https://github.com/firstandthird/wordpress-template-2022` and replace it with the new repo's URL.

Happy coding!

---

> **REMOVE THE ABOVE INFORMATION AND THIS DIVIDER BEFORE DEPLOYMENT!**

---

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

```bash
$ npm install
$ npm run initialize --acf-key={Paste ACF Pro license key}
$ docker compose up -d
```

Several things are handled during this step:

- `.env` is created based on the example file.
- All NPM and Composer packages are installed and updated.
- ACF Pro is validated and installed.
- Base theme styles and scripts are compiled.

### Set up the WordPress admin

1. Access the Docker instance by going to [localhost](http://localhost/). If you do not see the website, check the **Ports** column in Docker desktop or list running containers in your CLI to find the correct port to use (e.g. 80, 3000, 8888).

2. Follow the WordPress installation steps, log into your account, and change to the Client Theme.

3. Create a page and call it "Home".

4. Go to [Reading Options](http://localhost/wp-admin/options-reading.php), set **Your homepage displays** to **A static page**, and select your new Home page.
