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
           If this is the case, then congrats, the data has been imported correctly
         
            - **!!!** If you don't see any data, but the website doesn't give any data, it could be that the auto-increment is based on previous data that lived in the database. This isn't that bad, but if you want to fix this, make sure you use a clean database. **!!!**
    
# File Structure
## Project specific
### `app/Http/Controllers/Utilities`
#### `Format.php`
`Format.php` is a separate PHP file that contains code in order to format data output from the DB to multiple array, in order to make sure that code readability can be maintained.
#### `Query.php`
`Query.php` is a separate PHP file that contains code for interacting with the DB. The DB facade of Laravel, which results in more control over the queries, does bring a bunch of code with it and because of this, it can make it much more difficult to read the code.
This separate file contains calls to the DB that can be called with a method. It will return a collection of the data it received.
#### `Validation.php`
`Validation.php` contains code that is related to check if incoming data is valid. This is where the rules for validation can be found.
