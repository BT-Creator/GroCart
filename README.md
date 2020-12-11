![Header](resources/markdown/header.png)
# Introduction
Welcome to the **Grocart** Repository, powered by **[Laravel](https://laravel.com/)**, the PHP framework for Web Artisans.

Grocart is a remote shopping service that allows you to keep track of the groceries you need and order them with ease, thanks to our list system.
## Before we dive in...
This repo contains the consumer side of the application. If a link links to the *Under Construction* page, this means that the page was out-of-scope for this project.

## Setup instruction
Assuming you have a working Laravel server, and you know how to clone Laravel projects to that machine:
1. Clone this project to your machine
2. Fill the `.env` file with the needed database credentials. When in development, these were the credentials
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=grocart
    DB_USERNAME=grocartUser
    DB_PASSWORD=gr0Ware_House
    ```
   With the `grocartUser` having all right except `GRANT OPTION` on the database grocart.
3. The authentication of the application is based on Laravel's [Jetstream](https://jetstream.laravel.com/1.x/introduction.html), so the database can be constructed in 2 ways:
    - If you chose to use `dbFill.sql`, you'll need to run the migrations before importing the data. 
        1. Make a database with a name of your choosing and make a user with the needed rights.
        2. Fill the `.env` file in with the relevant data.
        3. In the root folder, run `php artisan migrate` in order to prepare the database for autentication.
        4. Before importing the data, load the website and make a user, but **do not go to the homepage of the user**.
        5. After this, execute `dbFill.sql` in your DB IDE of choice.
        6. Proceed to the homepage, where you should see the following:
        ![Successful data import](resources/markdown/data-import-user.png)
           If this is the case, then congrats, the data has been imported correctly.
            - **!!!** If you don't see any data, but the website doesn't give any data, it could be that the auto-increment is based on previous data that lived in the database. This isn't that bad, but if you want to fix this, make sure you use a clean database. **!!!**
    
4. In `public/assets/js/config` you'll find a singular file called `config.js`. In this file, please change the base URL to the URL you've configured, followed by `/api`
    
    *For illustration purposes, if your server URL is `https://webtech.local` you'll need to change the link in `public/assets/js/config` to `htpps://webtech.local/api`*
# File Structure
## Project specific
### `app/Http/Controllers/Utilities`
#### format.php
`format.php` is a separate PHP file that contains code in order to format data output from the DB to multiple array, in order to make sure that code readability can be maintained.
#### dml.php
`dml.php` contains code that will retrieve data from a database. None of the queries here can manipulate the database in any way.
#### dql.php
`dql.php` contains code that manipulates the database in any way *(`insert`, `update`, etc...)*.
#### validation.php
`validation.php` contains code that is related to check if incoming data is valid. This is where the rules for validation can be found.
### `app/Models`
This directory contains models that can be used in conjunction with Laravel Eloquent system. My personal preference when interacting with the DB is using the DB facade, because you have more control when forming a query.
### `public/assets`
Public contains all CSS, JS and images that can be served to the end-user.
#### CSS
All CSS has be complied using SASS. For more info about the SASS files, go tho the [SASS section](#sass).
#### JS
The JS files have been modularized in order to take advantage of the import & export functionality. The modules can be found in the directory `modules`
##### config
This directory contains a single file for configuration purposes. In order to make sure that the Data visualization works, you'll need to change the base URL to the URL you have configured. This has been mentioned in [the setup guide](#setup-instruction).
### `resources`
#### markdown
Contains the images used in this markdown file
#### sass
The directory SASS is where all SCSS files live. These were auto-compiled to `public/assets/css` using SASS's `watch` function
##### consumer
The consumer directory contains all files that have been complied to be used for the consumer-side of the web app.
##### modules
The directory `modules` contains some elements that used through every CSS file, like the typography, general styling rules, etc...
##### themes
Per section of the website, theme files have been provided. This style some common elements that appear in the website. It also contains a universal.scss file that is used as a baseline CSS file for building new sections of the website.
### views
Contains the `.blade.php` templates that have been used in this project.

# Accessibility
Special care has been taken in order to make the website as accessible as possible.

|Page|Lighthouse results|AXE Testing|W3C Validator|
|---|---|---|---|
|`/` (Index Page)| ![Lighthouse results](resources/markdown/lh-index.png)|No remarks|Valid|
|`/consumers/{id}/lists` (Lists page)| ![Lighthouse results](resources/markdown/lh-list.png)|No remarks*|Valid|
|`/consumer/{id}/history` (History page) | ![Lighthouse results](resources/markdown/lh-history.png)|No remarks*|Valid|
|`/cosumer/{id}/profile` (Profile page) | ![Lighthouse results](resources/markdown/lh-profile.png)|No remarks*|Valid|
|`/consumer/{id}/list/{list}` (List Edit page) | ![Lighthouse results](resources/markdown/lh-edit.png)|2 moderate remarks*|Valid|

 <span>*</span>*AXE will sometimes indicate that it thinks it sees a potential issue, but that it's unable to verify this. These issues are accounted for.*
# Used libraries, services & snippets
For this project, multiple external tools have been used:
- [Chart.js](https://www.chartjs.org/), a visualization tool.
- [OpenLayers](https://openlayers.org/), an open source map provider.
- [Fontawesome](https://fontawesome.com/), a icon provider.
- [Emilkowalski's CSS effects snippets](https://emilkowalski.github.io/css-effects-snippets/), a repository for common CSS animation snippets.
