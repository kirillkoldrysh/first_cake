# CakePHP Application Skeleton

[![Build Status](https://img.shields.io/travis/cakephp/app/master.svg?style=flat-square)](https://travis-ci.org/cakephp/app)
[![Total Downloads](https://img.shields.io/packagist/dt/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)

A skeleton for creating applications with [CakePHP](https://cakephp.org) 3.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

1. Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Go to project folder.
3. Run `php composer.phar install` or `composer install`.

You can either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.

## Update

Since this skeleton is a starting point for your application and various files
would have been modified as per your needs, there isn't a way to provide
automated upgrades, so you have to do any updates manually.

## Configuration

Read and edit `config/app.php` and setup the `'Datasources'` 
Copy `'config/app.custom.php'` to `'config/app.php'` for custom configuration for this app.

### Database

`CREATE DATABASE first_cake;`

`USE first_cake`

`CREATE TABLE users (`
    `id INT AUTO_INCREMENT PRIMARY KEY,`
    `email VARCHAR(255) NOT NULL,`
    `password VARCHAR(255) NOT NULL,`
    `created DATETIME,`
    `modified DATETIME`
`);`

`CREATE TABLE articles (`
    `id INT AUTO_INCREMENT PRIMARY KEY,`
    `user_id INT NOT NULL,`
    `title VARCHAR(255) NOT NULL,`
    `slug VARCHAR(191) NOT NULL,`
    `body TEXT,`
    `published BOOLEAN DEFAULT FALSE,`
    `created DATETIME,`
    `modified DATETIME,`
    `UNIQUE KEY (slug),`
    `FOREIGN KEY user_key (user_id) REFERENCES users(id)`
`) CHARSET=utf8mb4;`

`CREATE TABLE tags (`
    `id INT AUTO_INCREMENT PRIMARY KEY,`
    `title VARCHAR(191),`
    `created DATETIME,`
   ` modified DATETIME,`
    `UNIQUE KEY (title)`
`) CHARSET=utf8mb4;`

`CREATE TABLE articles_tags (`
    `article_id INT NOT NULL,`
    `tag_id INT NOT NULL,`
    `PRIMARY KEY (article_id, tag_id),`
    `FOREIGN KEY tag_key(tag_id) REFERENCES tags(id),`
    `FOREIGN KEY article_key(article_id) REFERENCES articles(id)`
`);`

`INSERT INTO users (email, password, created, modified)`
`VALUES`
`('cakephp@example.com', 'secret', NOW(), NOW());`

`INSERT INTO articles (user_id, title, slug, body, published, created, modified)`
`VALUES`
`(1, 'First Post', 'first-post', 'This is the first post.', 1, now(), now());`

## Layout

The app skeleton uses a subset of [Foundation](http://foundation.zurb.com/) (v5) CSS
framework by default. You can, however, replace it with any other library or
custom styles.

## Errors
### intl extension

In XAMPP, intl extension is included but you have to uncomment extension=php_intl.dll
in php.ini and restart the server through the XAMPP Control Panel.

