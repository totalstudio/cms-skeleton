# TotalStudio CMS Website Skeleton

A skeleton for creating web applications with [CakePHP](https://cakephp.org) 5.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

1. clone the project skeleton (if you read this you already did it):)
2. If you want to develop packages too copy `composer.local.example.json` to `composer.local.json` and create a dev folder next to your rpject. it will symlink the packages from there.
3. Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
4. Run `composer install`.
5. rename the app_local.example.php to app_local.php
6. start the cake server `bin/cake server -p 8765`
7. visit `http://localhost:8765/install` to see the welcome page.


## Update

Since this skeleton is a starting point for your application and various files
would have been modified as per your needs, there isn't a way to provide
automated upgrades, so you have to do any updates manually.

## Configuration

Read and edit the environment specific `config/app_local.php` and set up the
`'Datasources'` and any other configuration relevant for your application.
Other environment agnostic settings can be changed in `config/app.php`.

## Layout

The app skeleton uses [Milligram](https://milligram.io/) (v1.3) minimalist CSS
framework by default. You can, however, replace it with any other library or
custom styles.
