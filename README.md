# TEMPORARY README: Wordpress Project Template

This document is **MISSING INFORMATION** and is a verbatim copy from `firstandthird/wordpress-project-template` for now.

---

Welcome!

This aims to be a quick and easy setup for a new theme for a client. The intention is to just click on the "Use this template" button and start hacking away.

## What's included

- Docker to setup MySQL, phpMyAdmin and Wordpress so you can get the project up and running by just doing `npm run compose`.
- [Tailwind](https://tailwindcss.com/) to handle the frontend files.
- [ESLint](https://eslint.org/) and [Stylelint](https://stylelint.io/) configs.
- GitHub action to run ESLint and Stylelint on pull request.
- `.env-example` filled with sensible defaults to get this up and running.
- `.gitignore` and `.editorconfig` ready.
- Composer filled with common packages and our parent theme.
- CSS and JS ready to be used on Wordpress admin so Tailwind will look fine within Gutenberg and [Domodules](https://github.com/firstandthird/domodule) are re-instantiated with ACF Blocks.

Once the template is turned into a new repository there are a few things you'll need to do:

## Steps

- Change "Client Name" to something sensible.
- On `package.json`:
  - Search `https://github.com/firstandthird/wordpress-project-template` and replace with new repo's URL.
  - Update project name to be the client's
- Rename `wp-content/themes/client-theme-folder` to the client's and then search and replace `client-theme-folder` throughout the project. It should be present in:
  - `tailwind.config.js`
  - `webpack.config.js`
  - `functions.php`
  - `.env-example`
- Update `Client Name` within the theme's folder on the `style.css` file to be something sensible.
- Remove the _echo_ statement on line 9 in `functions.php` once you've confirmed that Tailwind CSS is compiling correctly.

Happy coding!

**IMPORTANT: Remove divider and preceding content after cloning.**

---

# Client Name

Wordpress theme for **Client Name**.

## Requirements

There's a few requirements in order to develop a new theme or contribute back to the project:

- [Git](https://git-scm.com/) for version control.
- [Composer](https://getcomposer.org/) for managing PHP dependencies.
- [Node 14+](https://nodejs.org).
- [NPM](https://www.npmjs.com/) or [Yarn](https://yarnpkg.com/en/) (your choice) for managing JS dependencies.

## Quick Start

**IMPORTANT:** You must create a `.env` file that follows what's shown on `.env-example`. Note that while there are some sensible defaults, `ACF_PRO_KEY` must be provided to add support for custom Gutenberg blocks.

```bash
$ composer install
$ composer update
$ npm install
$ npm update
$ npm run dev
$ npm run compose
```

If you want to develop and watch the assets, open another terminal and run `npm run dev` instead, so it keeps watching and refreshing files.

After Docker has finished installing, the website will be available on the `80` port.

Access `localhost` and it'll prompt to install Wordpress. Once it's installed you'll need to log in and activate the theme, so you can develop. You should use whatever your setting is for the variable within `SITE_URL`

http://localhost/wp-admin/themes.php

Then create a page. Call it "Home".

http://localhost/wp-admin/post-new.php?post_type=page

Then go to http://localhost/wp-admin/options-reading.php

And set "Your homepage displays" to "A static page" and select your recently created page.

---

## Advanced

### DB Access

phpMyAdmin is available on port `8181` and you can use the credentials set up with `DB_USER` and `DB_PASSWORD` from your `.env` file.

### Deploy Actions

If you've added your repo to our wordpress hoster on mettuce, you can set Github to auto-deploy and auto-
update staging instances when you PR. Create a DEPLOY_TOKEN in the Secrets set to the deploy token for
mettuce.com, then add the following scripts to the root directory (be sure to set SLUGNAME to the correct
name for your hosted server):

_.github/workflows/deploy-dev.yml_:

```yml
name: Deploy Dev Site

on:
  workflow_dispatch:
  pull_request:
    types: [opened, synchronize, reopened]

jobs:
  deploy:
    runs-on: ubuntu-latest
    timeout-minutes: 2
    steps:
      - name: Hit Webhook
        id: webhook
        run: |
          echo "::set-output name=releaseurl::$(curl -s 'https://wp.mettuce.com/deploy.php?token=${{ secrets.DEPLOY_TOKEN }}&site=<<SLUGNAME>>&branch=${{ github.head_ref }}&ref=${{ github.ref }}')"
      - name: Comment
        uses: mb2dev/github-action-comment-pull-request@1.0.0
        if: steps.webhook.outputs.releaseurl != '' && github.head_ref != ''
        with:
          message: "${{ steps.webhook.outputs.releaseurl }}"
          GITHUB_TOKEN: ${{ secrets.GITHUB_TOKEN }}
      - name: Refresh
        if: steps.webhook.outputs.releaseurl != '' && github.head_ref != ''
        run: |
          curl -s '${{ steps.webhook.outputs.releaseurl }}?refresh=1'
```

_.github/workflows/destroy-dev.yml_:

```yml
name: Destroy Dev Site

on:
  pull_request:
    types: [closed]
    branches-ignore:
      - "staging"

jobs:
  deploy:
    runs-on: ubuntu-latest
    timeout-minutes: 1
    steps:
      - name: Hit Webhook
        id: webhook
        run: |
          echo "::set-output name=releaseurl::$(curl -s 'https://wp.mettuce.com/destroy.php?token=${{ secrets.DEPLOY_TOKEN }}&site=<<SLUGNAME>>&branch=${{ github.head_ref }}')"
```
