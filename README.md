# WordPress Project Template 2022

Welcome!

This aims to be a quick and easy setup for a new client theme. The intention is to click the "Use this template" button and start hacking away.

## What's included

- Docker for MySQL and WordPress so you can get the project up and running with `npm run compose`.
- [Tailwind](https://tailwindcss.com/) to handle the front-end files.
- [ESLint](https://eslint.org/) and [Prettier](https://stylelint.io/) configs.
- GitHub action to run TypeScript compilation (`tsc`) on a pull request.
- `.env-example` filled with sensible defaults.
- `.gitignore` ready.
- Composer filled with standard packages.
- CSS and TS are ready to be used on WordPress admin so that Tailwind will look fine within Gutenberg
- [DOModules](https://github.com/firstandthird/domodule) and [DOMAssist](https://github.com/firstandthird/domassist) to aid with JS actions.

Once the template is turned into a new repository, there are a few things you'll need to do:

## Steps

- Change "Client Name" to something sensible.
- On `package.json`:
  - Search `https://github.com/firstandthird/wordpress-template-2022` and replace it with the new repo's URL.
  - Update the project name to be the client's theme.
- Rename `wp-content/themes/client-theme-folder` to the client's and then search and replace `client-theme-folder` throughout the project. It should be present in:
  - `tailwind.config.js`
  - `tsconfig.json`
  - `webpack.config.js`
  - `functions.php`
- Update `Client Name` within the theme's folder on the `style.css` file to be something sensible.

Happy coding!

**IMPORTANT: Remove the divider and preceding content after cloning.**

---

# Client Name

WordPress theme for **Client Name**.

## Requirements

There are a few requirements to develop a new theme or contribute back to the project:

- [Git](https://git-scm.com/) for version control.
- [Composer](https://getcomposer.org/) for managing PHP dependencies.
- [Node 18+](https://nodejs.org).
- [NPM](https://www.npmjs.com/) for managing JS dependencies.

## Quick Start

**IMPORTANT:** You must create a `.env` file that follows what's shown on `.env-example`.

```bash
$ composer install
$ composer update
$ npm install
$ npm update
$ npm run compose
$ npm run dev
```

If you want to develop and watch the assets, open another terminal and run `npm run dev` instead so it keeps watching and refreshing files.

After installing Docker, the website will be available on port `80`.

Access `localhost`, and it'll prompt you to install WordPress. Once installed, you'll need to log in and activate the theme. Use your setting for the variable within `SITE_URL`.

http://localhost/wp-admin/themes.php

Create a page and call it "Home".

http://localhost/wp-admin/post-new.php?post_type=page

Then go to http://localhost/wp-admin/options-reading.php, set **Your homepage displays** to **A static page**, and select your Home page.
